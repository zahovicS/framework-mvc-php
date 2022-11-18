<?php
class Model
{
    //conexion a base de datos
    protected $db;
    //nombre de la tabla
    protected $table;
    //query construido
    protected $query;
    //
    protected $softdelete = true;
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
        $this->query .= " WHERE $column $operator {$this->clear_inputs_html($value)}";
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
        $this->query .= " AND $column $operator {$this->clear_inputs_html($value)}";
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
    
    public function dd(){
        return dd($this->query);
    }

    public function all()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function find($id, $ownerKeyID = "id")
    {
        $this->db->query("SELECT * FROM {$this->table} where {$ownerKeyID} = {$id} LIMIT 1");
        return $this->db->fetch();
    }
    public function delete()
    {
        $this->query = "";
        if($this->softdelete){
            $this->query = "UPDATE {$this->table} SET del_status = 'Deleted' ";
        }else{
            $this->query = "DELETE FROM {$this->table} ";
        }
    }
    public function update(array $data){
        $this->query = "";
        if(!count($data) > 0){
            dd("error");
            return $this->query = "";
        }
        $this->query .= "UPDATE {$this->table} SET ";
        foreach ($data as $key => $value) {
            $_value = $this->verify_value($value);
            $this->query .= "{$key} = {$_value}";
        }
        return $this;
    }
    public function clear_inputs_html($input)
    {
        return htmlentities(addslashes($input));
    }
    public function execute(){
        if($this->query == ""){
            dd("no se puede ejecutar");
        }
        $this->db->query($this->query);
        return $this->db->execute();
    }
    private function verify_value($value){
        $type = gettype($this->clear_inputs_html($value));
        $add_value = "'{$value}'";
        if($type != "string"){
            $add_value = "{$value}";
        }
        return $add_value;
    }
}