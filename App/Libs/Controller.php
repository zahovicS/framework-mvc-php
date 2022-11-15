<?php
session_start();
class Controller extends View
{
    protected $session_acive = false;
    public function __construct()
    {
        $this->session_acive = $this->verifyAuthUser();
    }
    public function model($model)
    {
        require_once dirname(__DIR__, 1) . "/Models/" . $model . ".php";
        return new $model();
    }
    public function controller($controller)
    {
        require_once dirname(__DIR__, 1) . "/Controllers/" . $controller . ".php";
        return new $controller();
    }
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string $view Ruta de la vista en la carpeta resources/views
     * @param  array  $data Data que se mandará a la vista para renderizarse
     * @param  boolean|null  $render
     * - TRUE = renderiza toda la pagina con css y script (template original)
     * - FALSE = renderiza la en caso de que solo quieras la pagina sin los css o scripts
     * @param  boolean|null  $is_render_pdf
     * - TRUE = retorna la renderizacion del html para usarlo en DomPDF ($render debe ser false)
     * - FALSE = no actua/afecta en nada 
     * @return  TEMPLATE_VIEW retorna la visa con un require_once o un ob_get_clean en caso sea PDF
     */
    // public function view(string $view, $data = [], $render = true, $is_render_pdf = false)
    // {
    //     $view = str_replace(".", "/", $view);
    //     if (!file_exists(dirname(__DIR__, 2) . "/resources/views/" . $view . ".php")) {
    //         die("View not found");
    //     }
    //     if ($render) {
    //         require_once dirname(__DIR__, 2) . "/resources/views/layouts/header.php";
    //         require_once dirname(__DIR__, 2) . "/resources/views/layouts/scripts.php";
    //         require_once dirname(__DIR__, 2) . "/resources/views/" . $view . ".php";
    //         require_once dirname(__DIR__, 2) . "/resources/views/layouts/footer.php";
    //         return;
    //     }
    //     if (!$render && !$is_render_pdf) {
    //         require_once dirname(__DIR__, 2) . "/resources/views/" . $view . ".php";
    //     }
    //     if (!$render && $is_render_pdf) {
    //         ob_start();
    //         require_once dirname(__DIR__, 2) . "/resources/views/" . $view . ".php";
    //         return ob_get_clean();
    //     }
    // }
    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
    function message(bool $status, string $message = ""): array
    {
        return ["status" => $status, "msg" => $message];
    }
    protected function verifyAuthUser()
    {
        if (!empty($_SESSION["id_usuario"])) {
            return true;
        }
    }
    protected function verifyImage(array $img): array
    {
        $msg = "";
        $status = true;
        $type = $img["type"];
        $size = $img["size"];
        if (!$type == "image/jpeg" || !$type == "image/jpg" || !$type == "image/png") {
            $status = false;
            $msg = "El formato de imagen no es la correcta.";
        }
        if ($size > 4000000) {
            $status = false;
            $msg = "El tamaño de la imagen es mayor al permitido, [MAX: 4MB]";
        }
        return ["msg" => $msg, "status" => $status];
    }
}