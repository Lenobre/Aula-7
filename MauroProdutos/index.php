<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="name">Nome</label>
        <input type="text" name="name">

        <label for="url">Imagem (url)</label>
        <input type="text" name="url">

        <label for="description">Descrição</label>
        <input type="text" name="description">

        <label for="price">Preço</label>
        <input type="text" name="price">

        <button type="submit">Cadastrar</button>
    </form>
    <?php 
    $name = (isset($_POST["name"])) ? $_POST["name"] : null;
    $url = (isset($_POST["url"])) ? $_POST["url"] : null;
    $description = (isset($_POST["description"])) ? $_POST["description"] : null;
    $price = (isset($_POST["price"])) ? $_POST["price"] : null;

    if ($name === null || $url === null || $description === null || $price === null) 
        return;

    $price = str_replace(",",".", $price);

    $host = 'localhost';
    $database = 'produtos';
    $user = 'root';
    $password = '';
    
    $conexao = new PDO("mysql:host=$host;dbname=$database", $user, $password);

    try {
        $comando = $conexao->prepare("INSERT INTO produtos (name, url, description, price) VALUES (:name, :url, :description, :price)");
    
        $resultado = $comando->execute(array('name' => $name, 'url' => $url, 'description' => $description, 'price' => $price));
    
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