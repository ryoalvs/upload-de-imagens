<?php

class Conexao
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $database = null;

    private $conexao = null;

    public function _construct($db){
        $this->setDataBase($db);
        $this->start();
    }

    private function setDataBase($dbName){
        $this->database = $dbName;
    }

    public function getConexao(){
        return $this->conexao;
    }

    private function start(){
        $this->conexao = mysqli_connect(
            $this->host,
            $this->user,
            $this->pass,
            $this->database
        );

        if(!$this->conexao)
            die("Erro de conexão com o banco de dados.");

        return $this->conexao;
    }

    public function stop(){
        mysqli_close($this->conexao);
    }
}

?>