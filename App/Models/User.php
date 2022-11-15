<?php
class User extends Model
{
    public function __construct()
    {
        $this->table = "usuario";
        parent::__construct();
    }
    public function addUser(array $data)
    {
        $this->db->query("INSERT INTO {$this->table} (nombre,tipo_documento) VALUES (:nombre,:documento)");
        $this->db->bind(":nombre", $data["nombre"]);
        $this->db->bind(":documento", $data["documento"]);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function confirm_login(string $email, string $pass): array
    {
        $email = $this->clear_inputs_html($email);
        $pass = $this->clear_inputs_html($pass);
        $response = ["status" => false, "data" => null];
        $this->db->query("SELECT * FROM usuario WHERE email=:email AND del_status = 'Live' LIMIT 1");
        $this->db->bind(":email", $email);
        $res = $this->db->fetch();
        if (password_verify($pass, $res->clave)) {
            $response = ["status" => true, "data" => $res];
        }
        return $response;
    }
    public function get_permisos_user($id)
    {
        $res = [];
        $this->db->query("SELECT permiso.nombre FROM usuario_permiso INNER JOIN permiso on usuario_permiso.idpermiso = permiso.idpermiso WHERE usuario_permiso.idusuario=:idusuario");
        $this->db->bind(":idusuario", $id);
        $res = $this->db->fetchAll();
        return $res;
    }
}