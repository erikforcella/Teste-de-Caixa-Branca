<?php

include_once '../conectar.php';

//parte 1 - atributos
class autoria
{
    private $cod_autor;
    private $cod_livro;
    private $data;
    private $editora;
    private $conn;
    
//parte 2 - getters e setters

public function getCodAutor() {
    return $this->cod_autor;
}

public function setCodAutor($pcod_autor) {
    $this->cod_autor = $pcod_autor;
}

public function getCodLivro() {
    return $this->cod_livro;
}

public function setCodLivro($pcod_livro) {
    $this->cod_livro = $pcod_livro;
}

public function getData() {
    return $this->data;
}

public function setData($pdata) {
    $this->data = $pdata;
}

public function getEditora() {
    return $this->editora;
}

public function setEditora($peditora) {
    $this->editora = $peditora;
}

//parte 3 - métodos
function listar_autoria() 
{
    try
    {
        $this-> conn = new conectar();
        $sql = $this-> conn-> query("select * from autoria order by cod_autor");
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
        $sql = $this->conn->prepare("insert into autoria values (?,?,?,?)");
        @$sql->bindParam(1, $this->getCodAutor(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getCodLivro(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getData(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getEditora(), PDO::PARAM_STR);
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
        $sql = $this->conn->prepare("delete from autoria where cod_autor = ? and cod_livro = ?"); //informei o ? (parametro)
        @$sql-> bindParam(1, $this->getCodAutor(), PDO::PARAM_STR); //inclui esta linha para definir o parametro
        @$sql-> bindParam(2, $this->getCodLivro(), PDO::PARAM_STR); //inclui esta linha para definir o parametro
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

function pesquisar_autoria() {
    try 
    {
        $this-> conn = new conectar();
        $sql = $this->conn->prepare("select * from autoria where cod_autor like ?"); //informei o ?
        @$sql-> bindParam(1, $this->getCodAutor(),PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch (PDOException $exc) 
    {
        echo "Erro ao executar pesquisa. " . $exc->getMessage();
    }
}

function alterar_autoria() 
{
    try 
    {
        $this->conn = new conectar();
        $sql = $this->conn->prepare("select * from autoria where cod_autor = ? and cod_livro = ?");
        @$sql->bindParam(1, $this->getCodAutor(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getCodLivro(), PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch(PDOException $exc) 
    {
        echo "Erro ao alterar ." . $exc->getMessage();
    }    
}

function alterar2_autoria()
{
    try
    {
        $this->conn=new conectar();
        $sql = $this->conn->prepare("update autoria set datalancamento = ?, editora = ? where cod_autor = ? and cod_livro = ?"); //SEMPRE NA MESMA ORDEM
        @$sql->bindParam(1, $this->getData(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getEditora(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getCodAutor(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getCodLivro(), PDO::PARAM_STR);
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

}//encerramento da classe  autoria
?>