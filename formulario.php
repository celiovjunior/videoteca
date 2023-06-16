<?php 
use PDO;

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$video = [
    'url' => '',
    'title' => '',
];

if ($id !== false && $id !== null) {
    $statement = $pdo->prepare("SELECT * FROM videos WHERE id = ?;");
    $statement->bindValue(1, $id, PDO::PARAM_INT);
    $statement->execute();

    // $statement->rowCount();

    $video = $statement->fetch(PDO::FETCH_ASSOC);
}

?><?php require_once "open-html.php"; ?>
    <body>
    <h1>Preencha o formulário a seguir para cadastrar um novo vídeo:</h1>
    <form  method="post">
        <label for="url">Url do vídeo:</label>
        <input type="url" name="url" value="<?= $video['url']; ?>">

        <label for="title">Título do vídeo:</label>
        <input type="text" name="title" id="title" value="<?= $video['title']; ?>">

        <input type="submit" value="Cadastrar">
    </form>
<?php require_once "close-html.php"; ?>
