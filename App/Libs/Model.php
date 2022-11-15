<?php
class Model
{
    //conexion a base de datos
    protected $db;
    //nombre de la tabla
    protected $table;
    //query construido
    protected $query;
    //valores agregados
    protected $values = [];
    //resultado - no usado
    protected $result = [];

    public function __construct()
    {
        $this->db = new Base;
    }
    public function select(string ...$query_select)
    {
        $this->query = "SELECT " . implode(', ', $query_select) . " FROM " . $this->table;
        return $this;
    }
    public function where(string $column, string $operator = "=", $value)
    {
        $this->query .= " WHERE $column $operator $value";
        $this->values[] = $value;
        return $this;
    }
    public function join(string $table, string $first, string $operator = "=", string $second, string $type = "INNER")
    {
        $this->query .= " $type JOIN $table ON $first $operator $second";
        return $this;
    }
    public function and(string $column, string $operator = "=", $value)
    {
        $this->query .= " AND $column $operator $value";
        $this->values[] = $value;
        return $this;
    }
    public function get()
    {
        $this->db->query($this->query);
        return $this->db->fetchAll();
    }
    public function first()
    {
        $this->query .= " LIMIT 1";
        $this->db->query($this->query);
        return $this->db->fetch();
    }
    public function test()
    {
        return ["QUERY" => $this->query, "VALUES" => $this->values];
    }
    public function all()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }
    // public function first()
    // {
    //     $this->db->query("SELECT * FROM {$this->table} LIMIT 1");
    //     return $this->db->fetch();
    // }
    public function find($id, $ownerKeyID = "id")
    {
        $this->db->query("SELECT * FROM {$this->table} where {$ownerKeyID} = {$id} LIMIT 1");
        return $this->db->fetch();
    }
    // public function delete($id, $ownerKeyID = "id")
    // {
    //     $this->db->query("DELETE FROM {$this->table} where {$ownerKeyID} = {$id}");
    //     return $this->db->execute();
    // }
    function clear_inputs_html($input)
    {
        return htmlentities(addslashes($input));
    }
}