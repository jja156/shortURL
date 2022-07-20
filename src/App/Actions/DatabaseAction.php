<?php
namespace App\Actions;
use PDO;
use PDOException;

class DatabaseAction
{
    private PDO $pdo;
    function __construct()
    {
        $dsn = 'mysql:dbname=test;host=localhost';
        $user = 'root';
        $password = '';
        try {
            $this->pdo = new PDO($dsn, $user, $password);
        }catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function create(): bool
    {
        $statements = [
            'CREATE TABLE testTask( 
        id   BIGINT AUTO_INCREMENT,
        short_url  VARCHAR(6) NOT NULL UNIQUE, 
        user_id VARCHAR(50) NOT NULL UNIQUE,
        PRIMARY KEY(id));'
        ];
        try {
            foreach ($statements as $statement) {
                $this->pdo->exec($statement);
            }
            return true;
        }catch (PDOException $e){
            //print "Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }
    public function insert($url, $id): bool
    {
        try {
            $sql = 'INSERT INTO testTask (short_url, user_id) VALUES (?,?)';
            $stmt = $this->pdo->prepare($sql);
            $test = $stmt->execute([$url, $id]);
            return true;
        }catch (PDOException $e){
            //print "Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }
    public function select($url): bool
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM testTask WHERE short_url=?");
            $stmt->execute([$url]);
            $url = $stmt->fetchAll();
            if($url){
                return true;
            }
            return false;
        }catch (PDOException $e){
            //print "Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }
    public function get_id($url): array|bool
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM testTask WHERE short_url=?");
            $stmt->execute([$url]);
            $url = $stmt->fetchAll();
            if($url){
                return $url;
            }
            return false;
        }catch (PDOException $e){
            //print "Error!: " . $e->getMessage() . "<br/>";
            return false;
        }
    }
}