<?php

require_once '../config/config.php';

class Portfolio
{

    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAllContent()
    {
        $stmt = $this->pdo->query('SELECT * FROM t_content');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //FETCH_ASSOC : retourne un tableau indexé par le nom de la colonne comme retourné dans le jeu de résultats
    }

    public function getArtworkById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM t_artwork WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getLastThreeArtworks()
    {
        $stmt = $this->pdo->query('SELECT * FROM t_artwork ORDER BY date DESC LIMIT 3');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
