<?php

/**
 * Class Book
 * Représentation d'un livre dans l'app Artemis
 */

namespace Artemis;

require_once __DIR__ . '/../controller/Database.php';

use PDO;
use Artemis\Database;

class Book
{
    // Properties
    public int $id;
    public string $title;
    public string $description;
    public string $ISBN;
    public int $author_id;
    public int $publisher_id;

    // Constructor
    public function __construct(
        string $title,
        string $description,
        string $ISBN,
        int $author_id,
        int $publisher_id
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->ISBN = $ISBN;
        $this->author_id = $author_id;
        $this->publisher_id = $publisher_id;
    }

    // Getters & Setters
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getISBN()
    {
        return $this->ISBN;
    }
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
        return $this;
    }

    public function getAuthor_id()
    {
        return $this->author_id;
    }
    public function setAuthor_id($author_id)
    {
        $this->author_id = $author_id;
        return $this;
    }

    public function getPublisher_id()
    {
        return $this->publisher_id;
    }
    public function setPublisher_id($publisher_id)
    {
        $this->publisher_id = $publisher_id;
        return $this;
    }

    static public function searchBooks($keyword)
    {
        $pdo = Database::getPDO();
        $query = "SELECT
                    Book.id AS BookId,
                    Book.title AS BookTitle,
                    Book.description AS BookDescription,
                    Book.isbn AS BookIsbn,
                    Author.name AS AuthorName,
                    Publisher.name AS PublisherName
                FROM Book JOIN Author ON Book.author_id = Author.id
                JOIN Publisher ON Book.publisher_id = Publisher.id
                WHERE Book.title LIKE '%$keyword%'
                ORDER BY Book.title ASC;
                ";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $books;
    }

    static public function getAllBooks()
    {
        $pdo = Database::getPDO();
        $query = "SELECT
                    Book.id AS BookId,
                    Book.title AS BookTitle,
                    Book.description AS BookDescription,
                    Book.isbn AS BookIsbn,
                    Author.name AS AuthorName,
                    Publisher.name AS PublisherName
                FROM Book JOIN Author ON Book.author_id = Author.id
                JOIN Publisher ON Book.publisher_id = Publisher.id
                ORDER BY Book.title ASC;
                ";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $books;
    }

    static public function getOneBook(int $id)
    {
        $pdo = Database::getPDO();
        $query = "SELECT
                    Book.title AS BookTitle,
                    Book.description AS BookDescription,
                    Book.isbn AS BookIsbn,
                    Author.name AS AuthorName,
                    Publisher.name AS PublisherName
                FROM Book JOIN Author ON Book.author_id = Author.id
                JOIN Publisher ON Book.publisher_id = Publisher.id
                WHERE Book.id = $id;
        ";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        return $book;
    }
    static public function addBook(
        $title,
        $description,
        $ISBN,
        $author_id,
        $publisher_id
    ) {

        // Objectif : Ajouter un livre dans la base de données
        // Formulaire [X]
        // Traiter les données et Instance de la classe (objet Book) [X]
        // Préparation pour la persistance [X]
            // Connexion + Query [X]
            // Prepare [X]
            // BindParam du statement [X]
            // Execute [X]
            // Redirection HTTP [X]

        $pdo = Database::getPDO();
        $query = "INSERT INTO Book (
                title, description, ISBN, author_id, publisher_id
                ) VALUES (
                    :title, :description, :ISBN, :author_id, :publisher_id
                );";

        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':ISBN', $ISBN, PDO::PARAM_STR);
        $stmt->bindParam(':author_id', $author_id, PDO::PARAM_INT);
        $stmt->bindParam(':publisher_id', $publisher_id, PDO::PARAM_INT);

        $stmt->execute();

        $url = 'index.php?message=addbook';
        header("Location: $url");
    }



    public function editBook()
    {
        // Code
    }
    static public function deleteBook($id)
    {
        $pdo = Database::getPDO();
        $query = "DELETE FROM Book WHERE id = $id;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $url = 'index.php';
        header("Location: $url");

    }
}
// Code interdit après l'accolade