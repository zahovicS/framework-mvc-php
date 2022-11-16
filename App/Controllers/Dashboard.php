<?php
class Dashboard extends Controller
{
    public function __construct()
    {
        $this->model_usuario = $this->model("User");
        parent::__construct();
    }
    public function index(){
        $this->render("dashboard.index",["title"=>"titlesdsad"]);
    }
    public function test($data){
        $user = $this->model_usuario->find(1,"idusuario");
        dd($user);
    }
}