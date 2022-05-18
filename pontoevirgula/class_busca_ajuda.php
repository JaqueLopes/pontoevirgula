<?php

class Sala_busca_ajuda{
 
    // database connection and table name
    private $conn;
    private $table_name = "sala_busca_ajuda";
 
    // object properties
    public $senha_busca_ajuda;
    public $id_usuario_busca_ajuda;
    public $nick_busca_ajuda;

    public function __construct($db){
        $this->conn = $db;
    }

		 
function entra(){ // inserir na tabela busca ajuda
	  $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    id_usuario_busca_ajuda=:id_usuario_busca_ajuda, nick_busca_ajuda=:nick_busca_ajuda";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->id_usuario_busca_ajuda=htmlspecialchars(strip_tags($this->id_usuario_busca_ajuda));
        $this->nick_busca_ajuda=htmlspecialchars(strip_tags($this->nick_busca_ajuda));

         // bind values 
        $stmt->bindParam(":id_usuario_busca_ajuda", $this->id_usuario_busca_ajuda);
        $stmt->bindParam(":nick_busca_ajuda", $this->nick_busca_ajuda);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
}

}

?>