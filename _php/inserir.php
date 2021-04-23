<?php
require_once 'conexao.php';

class Upload
{
    private $table = null;
    private $fields = null;
    private $values = null;
    private $query = null;
    private $con = null;

    function _construct($tb){
        $this->table = $tb;
        $conexao = new Conexao('dbimagens');
        $this->con = $conexao->getConexao();
    }

    private function setQuery(){
        $this->query = 
            "INSERT INTO $this->table ($this->fields) VALUES ('$this->values')";
    }

    public function inserir ($arrFields, $arrValues){
        $this->fields = implode(',', $arrFields);
        $this->values = implode(',', $arrValues);

        mysqli_query($this->con, $this->query);
    }
}

//verifica se foi passado algum arquivo pelo input

if(!isset($_FILES['imagem'])){
    echo json_encode(array( 'status' => 'tipo não aceito.', 'className' => 'fail'));
    die('');
}

$imgSize = $_FILES['imagem']['size'];
$imgTmpName = $_FILES['imagem']['tmp_name'];
$imgType = $_FILES['imagem']['type'];

//verifica se o tipo de arquivo é aceito

$typeNotAccepted = /*$imgType != 'image/jpg' &&*/ $imgType != 'image/jpeg' && $imgType != 'image/png' && $imgType != 'image/gif';

if($typeNotAccepted){
    echo json_encode(array( 'status' => 'tipo não aceito.', 'className' => 'fail'));
    die('');
}

if(!$imgTmpName){
    echo json_encode(array( 'status' => 'erro', 'className' => 'fail'));
    die('');
}

$fileOpened = fopen($imgTmpName, "rb");
$image = fread($fileOpened, $imgSize);
$image = addslashes($image);
fclose($fileOpened);

$fields = array('img');
$values = array($image);

$upload = new Upload('imagens');
$upload->inserir($fields, $values);

echo json_encode( array( 'status' => 'sucesso', 'className' => 'success') );

?>