<?php

include_once '../conectar.php';

//parte 1 - atributos
class livro
{
    private $cod;
    private $titulo;
    private $categoria;
    private $isbn;
    private $idioma;
    private $qtdepag;
    private $conn;
    
//parte 2 - getters e setters

public function getCod() {
    return $this->cod;
}

public function setCod($pcod) {
    $this->cod = $pcod;
}

public function getTitulo() {
    return $this->titulo;
}

public function setTitulo($ptitulo) {
    $this->titulo = $ptitulo;
}

public function getCategoria() {
    return $this->categoria;
}

public function setCategoria($pcategoria) {
    $this->categoria = $pcategoria;
}


public function getIsbn() {
    return $this->isbn;
}

public function setIsbn($pisbn) {
    $this->isbn = $pisbn;
}

public function getIdioma() {
    return $this->idioma;
}

public function setIdioma($pidioma) {
    $this->idioma = $pidioma;
}

public function getQtdepag() {
    return $this->qtdepag;
}

public function setQtdepag($pqtdepag) {
    $this->qtdepag = $pqtdepag;
}

//parte 3 - métodos
function listar_livro() 
{
    try
    {
        $this-> conn = new conectar();
        $sql = $this-> conn-> query("select * from livro order by cod_livro");
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
        $sql = $this->conn->prepare("insert into livro values (null,?,?,?,?,?)");
        @$sql->bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getIsbn(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
        @$sql->bindParam(5, $this->getQtdepag(), PDO::PARAM_STR);
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
        $sql = $this->conn->prepare("delete from livro where cod_livro = ?"); //informei o ? (parametro)
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

function pesquisar_livro() {
    try 
    {
        $this-> conn = new conectar();
        $sql = $this->conn->prepare("select * from livro where titulo like ?"); //informei o ?
        @$sql-> bindParam(1, $this->getTitulo(),PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchAll();
        $this->conn = null;
    }
    catch (PDOException $exc) 
    {
        echo "<h3><br><br>Erro ao executar pesquisa. </h3> " . $exc->getMessage();
    }
}

function alterar_livro() 
{
    try 
    {
        $this->conn = new conectar();
        $sql = $this->conn->prepare("select * from livro where cod_livro = ?");
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

function alterar2_livro()
{
    try
    {
        $this->conn=new conectar();
        $sql = $this->conn->prepare("update livro set titulo = ?, categoria = ?, ISBN = ?, idioma = ?, qtdepag = ? where cod_livro = ?");

        
        @$sql->bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
        @$sql->bindParam(3, $this->getIsbn(), PDO::PARAM_STR);
        @$sql->bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
        @$sql->bindParam(5, $this->getQtdepag(), PDO::PARAM_STR);
        @$sql->bindParam(6, $this->getCod(), PDO::PARAM_STR);

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

}//encerramento da classe livro
?>