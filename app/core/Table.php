<?php

$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
class Table 
{
  protected $table;
  protected $contents = [];

	function readAll()
	{
		global $mysqli;
		$query="SELECT * FROM ". $this->table;
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		return $data;
	}
  
    public function create() {
        global $mysqli;
        $result = $mysqli->query("INSERT INTO ". $this->table ." VALUES(''," . $this->parseContents("create") . ")");
        return $result;
    }
    function read($id=1) {
        global $mysqli;
        $query="SELECT * FROM ". $this->table. " WHERE id=$id";
        $data=array();
        $result=$mysqli->query($query);
        while($row=mysqli_fetch_object($result)) {
            $data[]=$row;
        }
        return $data;
    }
    function update($id) {
        global $mysqli;
        $result = $mysqli->query("UPDATE ".$this->table ." SET ". $this->parseContents("update") ." WHERE id='$id'");
        return $result;
    }
  function delete($id) {
    global $mysqli;
    $query="DELETE FROM ". $this->table ." WHERE id=".$id;
    $result = $mysqli->query($query);
    return $result;
  }

  function delete_key($key,$value) {
    global $mysqli;
    $query="DELETE FROM ". $this->table ." WHERE $key='$value'";
    $result = $mysqli->query($query);
    return $result;
  }

  function where($key, $value) {
    global $mysqli;
    $query="SELECT * FROM $this->table WHERE $key='$value'";
    $data=array();
    $result=$mysqli->query($query);
    while($row=mysqli_fetch_object($result)) {
        $data[]=$row;
    }
    return $data;
}

function like($key, $value) {
  global $mysqli;
  $query="SELECT * FROM $this->table WHERE $key LIKE '%$value%'";
  $data=array();
  $result=$mysqli->query($query);
  while($row=mysqli_fetch_object($result)) {
      $data[]=$row;
  }
  return $data;
}
  function parseContents($method) {
    $query = "";
    switch($method) {
      case "update":
        foreach($this->contents as $content) {
          $query .= $content . "='$_POST[$content]',";
        }
        break;
      case "create":
        foreach($this->contents as $content) {
          $query .= "'$_POST[$content]',";
        }
        break;
      }
    $query = rtrim($query, ',');
    return $query;
  }
}