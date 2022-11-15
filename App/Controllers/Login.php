<?php
class Login extends Controller
{
    public function __construct()
    {
        $this->model_usuario = $this->model("User");
        parent::__construct();
    }
    public function index()
    {
        if (!empty($_SESSION["id_usuario"])) {
            // dd($_SESSION);
            return $this->redirect(BASE_URL . "/dashboard");
        }
        $this->render("login.login", ["text"=>"text"]);
        // $this->redirect(BASE_URL . "/");
    }
    public function loger()
    {
        if ($_POST) {
            $user = $_POST["email"];
            $pass = $_POST["pass"];
            $confirm = $this->model_usuario->confirm_login($user, $pass);
            if ($confirm["status"]) {
                $permisos = $this->model_usuario->get_permisos_user($confirm["data"]->idusuario);
                $_SESSION["id_usuario"] = $confirm["data"]->idusuario;
                $_SESSION["id_business"] = $confirm["data"]->idbusiness;
                $_SESSION["nombre"] = $confirm["data"]->nombre;
                $_SESSION["us_tipo_name"] = $confirm["data"]->cargo;
                $_SESSION["rute_profile"] = $confirm["data"]->imagen;
                foreach ($permisos as $key => $value) {
                    $_SESSION[$value->nombre] = 1;
                }
                $this->redirect(BASE_URL . "/dashboard");
            }
            $this->redirect(BASE_URL . "/");
        }
    }
    public function logout()
    {
        session_destroy();
        $this->redirect(BASE_URL . "/");
    }
}