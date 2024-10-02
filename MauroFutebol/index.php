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

        <label for="points">Pontuação</label>
        <input type="text" name="points">

        <button type="submit">Cadastrar</button>
    </form>
    <?php 
    $name = (isset($_POST["name"])) ? $_POST["name"] : null;
    $points = (isset($_POST["points"])) ? $_POST["points"] : null;

    if ($name === null || $points === null) 
        return;

    $host = 'localhost';
    $database = 'futebol';
    $user = 'root';
    $password = '';
    
    $conexao = new PDO("mysql:host=$host;dbname=$database", $user, $password);

    try {
        $comando = $conexao->prepare("INSERT INTO teams (name, points) VALUES (:name, :points)");
    
        $resultado = $comando->execute(array('name' => $name, 'points' => $points));
    
        if($resultado) {
        echo "Time cadastrado com sucesso!";
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