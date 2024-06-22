<?php

include_once '../conectar.php';

//parte 1 - atributos
class autor
{
    private $cod;
    private $nome;
    private $sobrenome;
    private $email;
    private $nasc;
    private $conn;
    
//parte 2 - getters e setters

public function getCod() {
    return $this->cod;
}

public function setCod($pcod) {
    $this->cod = $pcod;
}

public function getNome() {
    return $this->nome;
}

public function setNome($pnome) {
    $this->nome = $pnome;
}

public function getSobrenome() {
    return $this->sobrenome;
}

public function setSobrenome($psobrenome) {
    $this->sobrenome = $psobrenome;
}

public function getEmail() {
    return $this->email;
}

public function setEmail($pemail) {
    $this->email = $pemail;
}

public function getNasc() {
    return $this->nasc;
}

public function setNasc($pnasc) {
    $this->nasc = $pnasc;
}

//parte 3 - métodos
function listar_autor() 
{
    try
    {
        $this-> conn = new conectar();
        $sql = $this-> conn-> query("select * from autor order by cod_autor");
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "Erro ao executar consulta. " . $exc ->getMessage();
    }
}

function salvar() 
{
    try {
        $this-> conn = new conectar();
        $sql = $this->conn->prepare("insert into autor values (null,?,?,?,?)");
        @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getEmail(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getNasc(), PDO::PARAM_STR);
        if($sql->execute()==1) 
        {
            return "Registro salvo com sucesso!";
        }
        $this->conn = null;
    }
    catch(PDOException $exc) 
    {
        echo "Erro ao salvar o registro." . $exc->getMessage();
    }
}

function exclusao() {
    try {
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("delete from autor where cod_autor = ?"); //informei o ? (parametro)
        @$sql-> bindParam(1, $this->getCod(), PDO::PARAM_STR); //inclui esta linha para definir o parametro
        if($sql->execute() && $sql->rowCount() > 0)
        {
            return "Excluído com sucesso.";
        }
        else 
        {
            return "Erro na exclusão.";
        }

        $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "Erro ao excluir." .$exc->getMessage();
    } 
}

function pesquisar_autor() {
    try 
    {
        $this-> conn = new conectar();
        $sql = $this->conn->prepare("select * from autor where nomeautor like ?"); //informei o ?
        @$sql-> bindParam(1, $this->getNome(),PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch (PDOException $exc) 
    {
        echo "<h3>Erro ao executar pesquisa. </h3>" . $exc->getMessage();
    }
}

function alterar_autor() 
{
    try 
    {
        $this->conn = new conectar();
        $sql = $this->conn->prepare("select * from autor where cod_autor = ?");
        @$sql->bindParam(1, $this->getCod(), PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch(PDOException $exc) 
    {
        echo "Erro ao alterar ." . $exc->getMessage();
    }    
}

function alterar2_autor()
{
    try
    {
        $this->conn=new conectar();
        $sql = $this->conn->prepare("update autor set nomeautor = ?, sobrenome = ?, email = ?, nasc = ? where cod_autor = ?");
        @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getEmail(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getNasc(), PDO::PARAM_STR);
        @$sql->bindParam(5, $this->getCod(), PDO::PARAM_STR);
        if($sql->execute() == 1)
        {
            return "registro alterado com sucesso";
        }
        $this->conn=null;
    }
    catch(PDOException $exc)
    {
        echo "erro ao salvar o registro. " . $exc->getMessage();
    }
}

}//encerramento da classe autor
?>