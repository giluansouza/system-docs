<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold tracking-tight text-zinc-300">Documentos</h1>
    </x-slot>

    <form id="uploadForm">
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
    </form>

</x-app-layout>