<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold tracking-tight text-zinc-300">Documentos</h1>
    </x-slot>

    {{-- <form id="uploadForm">
        <input type="text" name="title" placeholder="Título" required><br>
        <input type="text" name="author" placeholder="Autor"><br>
        <input type="date" name="date"><br>
        <select name="type">
            <option value="pdf">PDF</option>
            <option value="word">Word</option>
            <option value="image">Imagem</option>
        </select><br>
        <textarea name="content" placeholder="Conteúdo" required></textarea><br>
        <button type="button" onclick="uploadDocument()">Enviar</button>
    </form> --}}

    <div class="mt-4 w-full flex flex-col justify-center gap-4">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl mb-2">Buscar Documentos</h2>
            <a href="{{ route('documents.create') }}" class="w-48 flex justify-center items-center text-zinc-100 shadow bg-sky-800 rounded-md h-10 hover:bg-sky-800/80">Novo documento</a>
        </div>
        <input type="text" id="searchQuery" placeholder="Digite sua busca">
        <button class="w-48 text-zinc-100 shadow bg-sky-500 rounded-md h-10 hover:bg-sky-500/80" onclick="searchDocument()">Buscar</button>
    </div>

    <div id="results"></div>

    
</x-app-layout>