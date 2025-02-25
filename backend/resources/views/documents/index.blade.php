<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold tracking-tight text-zinc-300">Documentos</h1>
    </x-slot>

    <div class="mt-4 w-full flex flex-col justify-center gap-4">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl mb-2">Buscar Documentos</h2>
            <a href="{{ route('documents.create') }}" class="w-48 flex justify-center items-center text-zinc-100 shadow bg-sky-800 rounded-md h-10 hover:bg-sky-800/80">Novo documento</a>
        </div>
        <input type="text" id="searchQuery" placeholder="Digite sua busca" class="p-2 border rounded-md w-full">

        <div class="flex justify-start gap-4">
            <button class="w-48 text-zinc-100 shadow bg-sky-500 rounded-md h-10 hover:bg-sky-500/80" onclick="searchDocument()">Buscar</button>
            <button class="w-48 text-zinc-100 shadow bg-gray-500 rounded-md h-10 hover:bg-gray-500/80" onclick="clearSearch()">Limpar</button>
        </div>
    </div>

    <div id="results" class="mt-4 space-y-2"></div>

    <script>
        async function searchDocument() {
            const query = document.getElementById('searchQuery').value;

            if (query.length < 3) {
                alert('Digite pelo menos 3 caracteres');
                return;
            }

            const response = await fetch(`{{ route('documents.index') }}?query=${query}`, {
                headers: { "X-Requested-With": "XMLHttpRequest" }
            });

            const data = await response.json();
            let resultsDiv = document.getElementById("results");
            resultsDiv.innerHTML = "";

            if (data.documents.length === 0) {
                resultsDiv.innerHTML = "<p class='text-gray-400'>Nenhum documento encontrado</p>";
            } else {
                data.documents.forEach(doc => {
                    let docElement = `<div class="p-4 bg-gray-800 text-white rounded shadow-md">
                        <h3 class="text-lg font-bold">${doc._source.title}</h3>
                        <p>${doc._source.content.substring(0, 200)}...</p>
                    </div>`;
                    resultsDiv.innerHTML += docElement;
                })
            }
        }

        function clearSearch() {
            document.getElementById('searchQuery').value = "";
            document.getElementById('results').innerHTML = "";
        }
    </script>
</x-app-layout>