<?php
class Dashboard extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // $a = $session_active;
        $this->model_usuario = $this->model("User");
    }
    public function index(){
        dd($this->session_active);
        $this->render("dashboard.index",["text"=>"from_template"]);
    }
}