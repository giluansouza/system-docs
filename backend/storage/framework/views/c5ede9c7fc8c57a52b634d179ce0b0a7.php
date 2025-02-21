<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload e Busca de Documentos</title>
    <script>
        async function uploadDocument() {
            const formData = new FormData(document.getElementById('uploadForm'));
            const response = await fetch('/api/documents', {
                method: 'POST',
                body: formData
            });
            alert(await response.text());
        }

        async function searchDocument() {
            const query = document.getElementById('searchQuery').value;
            const response = await fetch(`/api/documents/search?query=${query}`);
            const results = await response.json();

            document.getElementById('results').innerHTML = results.map(res => `
                <div>
                    <h4>${res._source.title}</h4>
                    <p>${res._source.content.substring(0, 100)}...</p>
                </div>
            `).join('');
        }
    </script>
</head>
<body>
    <h1>Upload de Documentos</h1>
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

    <h1>Buscar Documentos</h1>
    <input type="text" id="searchQuery" placeholder="Digite sua busca">
    <button onclick="searchDocument()">Buscar</button>

    <div id="results"></div>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/index.blade.php ENDPATH**/ ?>