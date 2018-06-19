<?php

class dataHandler {

    private $_conn;
    private $dsn = 'mysql:host=127.0.0.1;dbname=multiversum';
    private $username = 'root';
    private $password = '';

    function __construct()
    {
        $this->_conn = new PDO($this->dsn, $this->username, $this->password);
        $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function createData($sql)
    {
        $this->_conn->exec($sql);
        return $this->_conn->lastInsertId();
    }

    function readData($sql)
    {
        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function readDataAssoc($sql)
    {
        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readAllData($sql) 
    {
        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function updateData($sql)
    {
        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();
        return $this->_conn->lastInsertId();
    }

    function deleteData($sql)
    {
        $stmt = $this->_conn->prepare($sql);
        $stmt->execute();

        return "verwijderd";
    }
}

?>
