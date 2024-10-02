<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="title">Título</label>
        <input type="text" name="title">

        <label for="language">Linguaguem</label>
        <input type="text" name="language">

        <label for="total_pages">Total de páginas</label>
        <input type="text" name="total_pages">

        <label for="editor">Editor</label>
        <input type="text" name="editor">

        <label for="isbn">Isbn</label>
        <input type="text" name="isbn">

        <label for="published_at">Data de publicação</label>
        <input type="date" name="publishd_at">

        <button type="submit">Cadastrar</button>
    </form>
    <?php 
    $title = (isset($_POST["title"])) ? $_POST["title"] : null;
    $language = (isset($_POST["language"])) ? $_POST["language"] : null;
    $totalPages = (isset($_POST["total_pages"])) ? $_POST["total_pages"] : null;
    $editor = (isset($_POST["editor"])) ? $_POST["editor"] : null;
    $isbn = (isset($_POST["isbn"])) ? $_POST["isbn"] : null;
    $publishedAt = (isset($_POST["published_at"])) ? $_POST["published_at"] : null;



    $host = 'localhost';
    $database = 'library';
    $user = 'root';
    $password = '';
    
    $conexao = new PDO("mysql:host=$host;dbname=$database", $user, $password);

    try {
        $comando = $conexao->prepare("INSERT INTO produtos (title, language, totalPages, editor, isbn, published_at) VALUES (:title, :language, :totalPages, :editor, :isbn, :published_at)");
    
        $resultado = $comando->execute(array(
            'title' => $title,
            'language' => $language,
            'total_pages' => $totalPages,
            'editor' => $editor,
            'isbn' => $isbn,
            'publised_at' => $publishedAt
        ));
    
        if($resultado) {
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro ao executar o comando!";
        }
    } catch (Exception $e) {
        echo "Erro $e";
    }
    
    $conexao = null;
    ?>
</body>
</html>