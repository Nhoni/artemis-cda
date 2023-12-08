<?php

/**
 * Class Book
 * Représentation d'un livre dans l'app Artemis
 */

namespace Artemis;

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
        int $id,
        string $title,
        string $description,
        string $ISBN,
        int $author_id,
        int $publisher_id
    ) {
        $this->id = $id;
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

    // Methods
    public function getAllBooks()
    {
        // Code
    }
    public function getOneBook()
    {
        // Code
    }
    public function addBook()
    {
        // Code
    }
    public function editBook()
    {
        // Code
    }
    public function deleteBook()
    {
        // Code
    }
}
// Code interdit après l'accolade