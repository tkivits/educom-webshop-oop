<?php
require_once 'Interfaces/ICrud.php';

class Crud implements ICrud
{
    private $connstring;
    private $dbuser;
    private $dbpassword;
    private $pdo;
    public function __construct()
    {
        $this->connstring = 'mysql:host=localhost;dbname=teuns_webshop';
        $this->dbuser = 'WebShopUser';
        $this->dbpassword = '1VyldCNbXjpb';
        try {
            $this->pdo = new PDO($this->connstring, $this->dbuser, $this->dbpassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: '.$e->getMessage();
        }
        
    }
    public function createUserRow($array)
    {
        $sql = 'INSERT INTO users (email, name, password) VALUES (:email, :name, :pw)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute($array);
        if (!$this->pdo->lastInsertId())
        {
            throw new Exception('Failed to register new user.');
        }
        return $this->pdo->lastInsertId();
    }
    public function createOrderRow($array)
    {
        $sql = 'INSERT INTO orders (user_id) VALUES (:user_id)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute($array);
        if (!$this->pdo->lastInsertId())
        {
            throw new Exception('Failed to register order.');
        }
        return $this->pdo->lastInsertId();
    }
    public function createOrderItemsRow($order_id, $array)
    {
        $sql = 'INSERT INTO order_item (order_id, product_id, quantity) VALUES (:order_id, :product_id, :qty)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        foreach ($array as $product_id => $qty)
        {
            $stmt->bindValue(':order_id', $order_id);
            $stmt->bindValue(':product_id', $product_id);
            $stmt->bindValue(':qty', $qty);
            $stmt->execute();
            if (!$this->pdo->lastInsertId())
            {
                throw new Exception('Failed to register order.');
            }
        }
        return $this->pdo->lastInsertId();
    }
    public function readOneRow($table, $row, $value)
    {
        $sql = 'SELECT * FROM '.$table.' WHERE '.$row.' = :value';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':value', $value);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function readMultipleRows($table, $row, $value)
    {
        $sql = 'SELECT * FROM '.$table.' WHERE '.$row.' = :value';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':value', $value);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function readTable($table)
    {
        $sql = 'SELECT * FROM '.$table;
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}

?>