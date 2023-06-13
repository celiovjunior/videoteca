<?php
$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
$statement = $pdo->prepare($sql);

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, 'title');

if ($url === false || $title === false) {
    header("Location: /?sucsess=0");
    exit();
}

$statement->bindValue(1, $url);
$statement->bindValue(2, $title);

$statement->execute();
