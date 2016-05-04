<?php

class DB_class{
	protected $server = "localhost";
	protected $dbuser = "root";
	protected $dbpw = "";
	protected $db = "mail";
	protected $con;
	
	function __construct() {
    	$this->con = new mysqli($this->server,$this->dbuser,$this->dbpw, $this->db);
    	$this->con->set_charset("utf8");

   }
}

?>