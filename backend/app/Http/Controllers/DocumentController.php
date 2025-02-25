<?php

namespace App\Http\Controllers;

use App\Models\DocumentMetadata;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentController extends Controller
{
    private $elasticSearch;

    public function __construct()
    {
        $this->elasticSearch = ClientBuilder::create()
            ->setHosts([env('ELASTICSEARCH_SCHEME', 'http') . '://' . env('ELASTICSEARCH_HOST', 'elasticsearch') . ':' . env('ELASTICSEARCH_PORT', '9200')])
            ->build();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'query' => 'required|string|min:3'
            ]);

            $searchQuery = $request->query('query');

            $searchParams = [
                'index' => 'documents',
                'body' => [
                    'query' => [
                        'multi_match' => [
                            'query' => $searchQuery,
                            'fields' => ['title', 'content'],
                            'fuzziness' => 'AUTO'
                        ]
                    ]
                ]
            ];

            try {
                $result = $this->elasticSearch->search($searchParams);
                return response()->json([
                    'documents' => $result['hits']['hits'],
                    'query' => $searchQuery
                ]);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return response()->json(['message' => 'An error occurred while searching documents'], 500);
            }
        }

        return view('documents.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'nullable|string',
            'date' => 'nullable|date',
            'type' => 'required|string',
            'content' => 'required|string',
        ]);

        $document = DocumentMetadata::create($request->all());

        // Verifica se o índice "documents" existe
        $indexParams = ['index' => 'documents'];
        if (!$this->elasticSearch->indices()->exists($indexParams)) {
            $this->elasticSearch->indices()->create([
                'index' => 'documents',
                'body'  => [
                    'settings' => [
                        'number_of_shards' => 1,
                        'number_of_replicas' => 0
                    ],
                    'mappings' => [
                        'properties' => [
                            'title' => ['type' => 'text'],
                            'author' => ['type' => 'keyword'],
                            'date' => ['type' => 'date'],
                            'type' => ['type' => 'keyword'],
                            'content' => ['type' => 'text']
                        ]
                    ]
                ]
            ]);
        }

        $this->elasticSearch->index([
            'index' => 'documents',
            'id' => $document->id,
            'body' => [
                'title' => $document->title,
                'author' => $document->author,
                'date' => $document->date,
                'type' => $document->type,
                'content' => $document->content
            ]
        ]);

        return response()->json(['message' => 'Document created successfully', 'document' => $document]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|min:3'
        ]);

        $searchQuery = $request->query('query');

        $searchParams = [
            'index' => 'documents',
            'body' => [
                'query' => [
                    'match' => [
                        'content' => $searchQuery
                    ]
                ]
            ]
        ];

        $result = $this->elasticSearch->search($searchParams);

        return response()->json([
            'documents' => $result['hits']['hits'],
            'query' => $searchQuery
        ]);
    }
}
