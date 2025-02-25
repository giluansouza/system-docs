<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold tracking-tight text-zinc-300">Documentos</h1>
    </x-slot>

    <x-alert />

    <form action="{{ route('documents.store') }}" id="uploadForm" method="POST" class="mt-4 mb-4 w-full flex flex-col justify-center gap-4">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="title">Assunto</label>
            <input type="text" id="title" name="title" placeholder="Título" required class="p-2 border rounded-md">
        </div>
        <div class="flex flex-col gap-2">
            <label for="author">Autor</label>
            <input type="text" id="author" name="author" placeholder="Autor" class="p-2 border rounded-md">
        </div>
        <div class="flex flex-col gap-2">
            <label for="date">Data</label>
            <input type="date" id="date" name="date" class="p-2 border rounded-md">
        </div>
        <div class="flex flex-col gap-2">
            <label for="type">Tipo</label>
            <select name="type" class="p-2 border rounded-md">
                <option value="word">Word</option>
                <option value="pdf">PDF</option>
                {{-- <option value="image">Imagem</option> --}}
            </select>
        </div>
        <div class="flex flex-col gap-2">
            <label for="content">Conteúdo</label>
            <textarea name="content"  placeholder="Conteúdo" required class="p-2 border rounded-md"></textarea>
        </div>
        <button type="submit" onclick="uploadDocument()" class="w-48 text-zinc-100 shadow bg-sky-500 rounded-md h-10 hover:bg-sky-500/80">Cadastrar documento</button>
    </form>

</x-app-layout>