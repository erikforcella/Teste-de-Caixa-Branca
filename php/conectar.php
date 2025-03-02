<?php
class conectar extends PDO
{
    private static $instancia;
    private $query;
    private $host = "127.0.0.1"; //endereço servidor da etec // casa
    private $usuario = "root"; //user servidor da etec: root
    private $senha = ""; //senha servidor da etec
    private $db = "bd_autoria"; //banco do mysql  

    public function __construct()
    {
        parent::__construct("mysql:host=$this->host;dbname=$this->db","$this->usuario","$this->senha");
    }

    public static function getInstance()
    {
        if(!isset(self::$instancia))
        {
            try
            {
                self::$instancia = new conectar;
                echo 'Conectado com sucesso!!!';
            }
            catch(Exception $e)
            {
                echo 'Erro ao conectar';
                exit();
            }
        }
        return self::$instancia;
    }
    
    public function sql($query)
    {
        $this->getInstance();
        $this->query=$query;
        $stmt = $pdo->prepare($this->query);
        $stmt->execute();
        $pdo = null;
    }
}
?>