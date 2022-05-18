<?php
// NAO MEXE AQUI
class Sala_ajudante{

    // database connection and table name
    private $conn;
    private $table_name = "sala_ajudante";
 
    // object properties
    public $senha_ajudante;
    public $id_usuario_ajudante;
    public $nick_ajudante;

    public function __construct($db){
        $this->conn = $db;
    }


function entra(){ // inserir na tabela ajudante
	  $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    id_usuario_ajudante=:id_usuario_ajudante, nick_ajudante=:nick_ajudante";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->id_usuario_ajudante=htmlspecialchars(strip_tags($this->id_usuario_ajudante));
        $this->nick_ajudante=htmlspecialchars(strip_tags($this->nick_ajudante));

         // bind values 
        $stmt->bindParam(":id_usuario_ajudante", $this->id_usuario_ajudante);
        $stmt->bindParam(":nick_ajudante", $this->nick_ajudante);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
}


}

?>
