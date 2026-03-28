<!DOCTYPE html>
<html>
<head>
    <title>Criar Loja</title>
</head>
<body>
    <h1>Nova Loja</h1>

    <form action="/tenants" method="POST">
        @csrf <input type="text" name="name" placeholder="Nome da Loja" required>
        <br>
        <input type="text" name="domain" placeholder="domínio.localhost" required>
        <br>
        <button type="submit">Criar Loja</button>
    </form>
</body>
</html>
