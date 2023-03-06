<?php

$env = parse_ini_file('.env');

try {
    $pdo = new PDO("mysql:host=" . $env['DB_HOST'] . ";dbname=" . $env['DB_NAME'], $env['DB_USERNAME'], $env['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
}
