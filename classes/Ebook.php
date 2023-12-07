<?php

/**
 * Child class of Book
 * Représentation d'un livre numérique dans l'app Artemis
 */
require __DIR__ . '/Book.php';

use Artemis\Book;

class Ebook extends Book
{
    // Properties
    public bool $isAugmented;
    public int $availability;
    public bool $isDownloadable;

    
    public function getIsAugmented()
    {
        return $this->isAugmented;
    }

    /**
     * Set the value of isAugmented
     *
     * @return  self
     */ 
    public function setIsAugmented($isAugmented)
    {
        $this->isAugmented = $isAugmented;

        return $this;
    }

    /**
     * Get the value of availability
     */ 
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Set the value of availability
     *
     * @return  self
     */ 
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get the value of isDownloadable
     */ 
    public function getIsDownloadable()
    {
        return $this->isDownloadable;
    }

    /**
     * Set the value of isDownloadable
     *
     * @return  self
     */ 
    public function setIsDownloadable($isDownloadable)
    {
        $this->isDownloadable = $isDownloadable;

        return $this;
    }
}