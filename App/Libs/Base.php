<?php
class Base
{
    private $host = DB_SERVER;
    private $name_db = DB_NAME;
    private $port = DB_PORT;
    private $charsert = DB_CHARSET;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $attr = [PDO::ATTR_CASE => PDO::CASE_LOWER, PDO::CASE_LOWER => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    private $dbh;
    private $stmt;
    private $error;
    function __construct()
    {
        $dsn = "mysql:dbname={$this->name_db};host={$this->host};port={$this->port};charset={$this->charsert}";
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $this->attr);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
    public function bind($params, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($params, $value, $type);
    }
    public function execute()
    {
        return $this->stmt->execute();
    }
    public function fetchAll()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function fetch()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    public function count()
    {
        return $this->stmt->rowCount();
    }
}