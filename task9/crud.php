<?php

class Connection{
    protected $con, $result;

    function __construct()
    {
        $this->con = mysqli_connect("localhost", "root", "", "task7");
    }

    function runQuery($sql){
            $this->result = mysqli_query($this->con, $sql);
    }

  

    function getRecord(){
        $data = array();
        while($row = $this->result){
            $data[] = $row;
        }
        return $data;
    }

}

class Crud extends Connection{
    function insert($sql){
        $this->runQuery($sql);
    }
    function delete($sql){
        $this->runQuery($sql);
    }
    function update($sql){
        $this->runQuery($sql);
    }
    function select($sql){
        $this->runQuery($sql);
        $this->getRecord();
    }
    function data($data){
        echo "<pre>";
        print($data);
        echo "<pre>";
    }
}

class Select extends Crud {
    function selectRecord($id){ 
        $query = "SELECT * FROM users WHERE id = '$id'";
        $data = $this->select($query);
        $this->data($data);
        // echo $data;
    }
    function insertRecord($id, $name){ 
        $query = "INSERT INTO users (id, name) VALUES ('$id','$name');";
        $this->insert($query);
    }
}

$obj = new Select();
// $obj->insertRecord("1", "farhan");
$obj->selectRecord("1");

?>