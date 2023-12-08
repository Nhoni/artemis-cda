<?php

/**
 * Classe Database
 * Gestionnaire des interactions avec la base de données
 */

namespace Artemis;

use PDO;

class Database
{
    private $host = 'localhost';
    private $dbname = 'artemis';
    private $username = 'mba-m2';
    private $password = '';
    private $charset = 'utf8mb4';

    // Connexion
    static public function getPDO(): object
    {
        $pdo = new PDO(
            'mysql:host=localhost:3306;dbname=artemis;charset=utf8mb4', 
            'root',
            ''
        );
        return $pdo;
    }

    /**
     * Méthode global de récupération de tous
     * les éléments d'une entité dans la BDD
     * @param string $entity
     * @return array
     */
    static public function getAll(string $entity): array
    {
        $pdo = Database::getPDO();
        $query = "SELECT * FROM $entity;";
        $stmt = $pdo->prepare($query); 
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * Méthode global de récupération d'un seul
     * élément d'une entité dans la BDD
     * @param string $entity
     * @param int $id
     * @return array
     */
    static public function getOne(string $entity, int $id): array
    {
        $pdo = Database::getPDO();
        $query = "SELECT * FROM $entity WHERE id = $id;";
        $stmt = $pdo->prepare($query); 
        $stmt->execute(); 
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }




}
// Ne pas écrire de code ici