<?php
require_once 'vendor/autoload.php';

include __DIR__ . '/templates/header.php';

$faker = Faker\Factory::create('fr_FR');

if(true) {

// Connection à la base de données
$pdo = new PDO(
    'mysql:host=localhost:3306;dbname=artemis;charset=utf8mb4', 
    'root', 
    '');

$pdo->query("CREATE DATABASE IF NOT EXISTS artemis");

// Suppression de toutes les tables
$pdo->query("SET FOREIGN_KEY_CHECKS = 0");
$pdo->query("DROP TABLE IF EXISTS Loan");
$pdo->query("DROP TABLE IF EXISTS Client");
$pdo->query("DROP TABLE IF EXISTS Book");
$pdo->query("DROP TABLE IF EXISTS Publisher");
$pdo->query("DROP TABLE IF EXISTS Author");
$pdo->query("SET FOREIGN_KEY_CHECKS = 1");

// Création de la table Author
$pdo->query("CREATE TABLE Author (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    bio TEXT NOT NULL
)");

// Insertion d'exemples d'auteurs
for ($i = 1; $i <= 180; $i++) {
    $authorData = [
        'name' => $faker->name(),
        'bio' => $faker->text(),
    ];

    $pdo->prepare("INSERT INTO Author (name, bio) VALUES (:name, :bio)")
        ->execute($authorData);
}

// Création de la table Publisher
$pdo->query("CREATE TABLE Publisher (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)");

// Insertion d'exemples d'éditeurs
for ($i = 1; $i <= 50; $i++) {
    $publisherData = [
        'name' => $faker->company(),
    ];

    $pdo->prepare("INSERT INTO Publisher (name) VALUES (:name)")
        ->execute($publisherData);
}

// Création de la table Book
$pdo->query("CREATE TABLE Book (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    ISBN VARCHAR(13) NOT NULL,
    author_id INT UNSIGNED NOT NULL,
    publisher_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (author_id) REFERENCES Author(id),
    FOREIGN KEY (publisher_id) REFERENCES Publisher(id)
)");

// Insertion d'exemples de livres
for ($i = 1; $i <= 200; $i++) {
    $bookData = [
        'title' => $faker->sentence(2),
        'description' => $faker->text(),
        'ISBN' => $faker->isbn13(),
        'author_id' => rand(1, 180),
        'publisher_id' => rand(1, 50),
    ];

    $pdo->prepare("INSERT INTO Book (title, description, ISBN, author_id, publisher_id) VALUES (:title, :description, :ISBN, :author_id, :publisher_id)")
        ->execute($bookData);
}

// Création de la table Client
$pdo->query("CREATE TABLE Client (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    deposit BOOLEAN NOT NULL
)");

// Insertion d'exemples de clients
for ($i = 1; $i <= 50; $i++) {
    $clientData = [
        'name' => $faker->name(),
        'email' => $faker->email(),
        'deposit' => rand(true, false)
    ];

    $pdo->prepare("INSERT INTO Client (name, email, deposit) VALUES (:name, :email, :deposit)")
        ->execute($clientData);
}

// Création de la table Loan
$pdo->query("CREATE TABLE Loan (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    client_id INT UNSIGNED NOT NULL,
    book_id INT UNSIGNED NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    returned BOOLEAN NOT NULL,
    FOREIGN KEY (client_id) REFERENCES Client(id),
    FOREIGN KEY (book_id) REFERENCES Book(id)
)");

// Insertion d'exemples de prêts
for ($i = 1; $i <= 50; $i++) {
    $startTimestamp = rand(strtotime("-365 days"), time());
    $startDate = date("Y-m-d", $startTimestamp);

    $endTimestamp = strtotime("+1 month", $startTimestamp);
    $endDate = date("Y-m-d", $endTimestamp);

    $loanData = [
        'client_id' => rand(1, 50),
        'book_id' => rand(1, 200),
        'start_date' => $startDate,
        'end_date' => $endDate,
        'returned' => rand(true, false)
    ];

    $pdo->prepare("INSERT INTO Loan (client_id, book_id, start_date, end_date, returned) VALUES (:client_id, :book_id, :start_date, :end_date, :returned)")
        ->execute($loanData);
}

echo "Données fictives insérées avec succès.";

}

include __DIR__ . '/templates/footer.php';