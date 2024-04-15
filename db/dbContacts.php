<?php
class Database {
    public $pdo;
    
    function __construct() {
        $dbFile = dirname(__FILE__) . "/contacts.sqlite";
        $dbExists = file_exists($dbFile);
        $this->pdo = new PDO("sqlite:$dbFile");
        if (! $dbExists) {
            $this->createDatabase();
        }
    }

    function createDatabase() {
        $this->pdo->exec('CREATE TABLE contacts (
            id INTEGER PRIMARY KEY,
            name VARCHAR NOT NULL,
            email TEXT NOT NULL,
            message TEXT NOT NULL
        )');
    }    

    function listeRecords() {
        $stmt = $this->pdo->query('SELECT * FROM contacts');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getRecord($id) {
        $stmt = $this->pdo->prepare("SELECT id, name, email, message FROM contacts WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    
    function insertRecord($name, $email, $message) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO projects (id, name, email, message)
              VALUES (:id, :name, :email, :message)");

        $result = $stmt->execute(array(
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ));

        return $result;    
    }
};



