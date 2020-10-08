<?php

class BD{
	var $servidor = "sql7.freemysqlhosting.net";
	var $basedados = "sql7369641";
	var $utilizador = "sql7369641";
	var $password = "SCrvieira951753";
	
	var $ligacao;
	
	function __construct(){
		$this->ligacao = new PDO(
		"mysql:host=".$this->servidor.";dbname=".$this->basedados,
		$this->utilizador,
		$this->password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		
		}
	
	function inserir($caminho,$tipo){
		
        $sql = "INSERT INTO files (path,tipe) VALUES (:caminho,:tipo)";
        $instrucao = $this->ligacao->prepare($sql);
        $instrucao->bindValue(":caminho", $caminho);
		$instrucao->bindValue(":tipo", $tipo);
		
        $instrucao->execute();
    }
	function conct($fk){
		$sql = "INSERT INTO temp (fk_file,vez) VALUES ($fk, 1)";
        $instrucao = $this->ligacao->prepare($sql);
        $instrucao->execute();
		
		//echo "alert(".$fk.");";
	}
	function del(){
		$sql = "DELETE FROM temp WHERE vez = 1";
        $instrucao = $this->ligacao->prepare($sql);
        $instrucao->execute();
	}
	function delid($id){
		$sql = "DELETE FROM temp WHERE fk_file = $id";
        $instrucao = $this->ligacao->prepare($sql);
        $instrucao->execute();
	}
    
    function consultar($tabela){
		$sql = "SELECT * FROM $tabela";
		$setenca = $this->ligacao->prepare($sql);
		$setenca->execute();
		return $setenca->fetchAll();
	}
	function consultarTipo($tipo){
		$sql = "SELECT * FROM files WHERE tipe=:tipo";
		$setenca = $this->ligacao->prepare($sql);
		$setenca->bindValue(":tipo", $tipo);
		$setenca->execute();
		return $setenca->fetchAll();
	}
	function contar($id){
		$sql = "SELECT * FROM temp WHERE fk_file=:id";
		$setenca = $this->ligacao->prepare($sql);
		$setenca->bindValue(":id", $id);
		$setenca->execute();
		return $setenca->rowCount();
	}
	
}

?>