<?php
class Database {
    public $pdo;
    
    function __construct() {
        $dbFile = dirname(__FILE__) . "/projects.sqlite";
        $dbExists = file_exists($dbFile);
        $this->pdo = new PDO("sqlite:$dbFile");
        if (! $dbExists) {
            $this->createDatabase();
        }
    }

    function createDatabase() {
        $this->pdo->exec('CREATE TABLE projects (
            id INTEGER PRIMARY KEY,
            title VARCHAR NOT NULL,
            img TEXT NOT NULL,
            description TEXT,
            link TEXT NOT NULL
        )');
    }    

        function listeRecords() {
            $stmt = $this->pdo->query('SELECT * FROM projects');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    function getRecord($id) {
        $stmt = $this->pdo->prepare("SELECT id, title, img, description, link FROM projects WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    
    function insertRecord($title, $img, $description, $link) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO projects (id, title, img, description, link)
            VALUES (:id, :title, :img, :description, :link)");

        $result = $stmt->execute(array(
            'title'       => $title,
            'img' => $img,
            'description' => $description,
            'link' => $link
        ));

        return $result;    
    }
};



