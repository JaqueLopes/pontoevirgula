<?php

class Conversa{

	private $conn;
    private $table_name = "conversa";

    public $id_conv;
    public $nick1;
    public $nick2;
    public $id1;
    public $id2;
    public $online;

      public function __construct($db){
        $this->conn = $db;
    }

    // PRECISA TERMINAR

    function pegaConv(){
    	$query = " SELECT id1 FROM " . $this->table_name;

    }

}

?>