<?php
Class View {
    public function render(string $template,array $data = []){
        $url_template = str_replace(".", "/", $template);
        $engine = [
            "loader" => new Mustache_Loader_FilesystemLoader(dirname(__DIR__, 2) . "/resources/views/"),
            "cache" => dirname(__FILE__,3)."/system/tmp/cache/mustache/",
            "partials_loader" => new Mustache_Loader_FilesystemLoader(dirname(__FILE__,3) . '/resources/views/layouts/'),
            'escape' => function($value) {
                return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
            },
            'helper' => [],
            'charset' => 'UTF-8',
        ];
        $helpers = [
            'base_url'=>function(){
                return BASE_URL;
            },
            'is_empty_array'=>function(array $array)
            {
                $result = false;
                foreach ($array as $key => $value) {
                    if ($value == "" || $value == null || empty($value)) {
                        $result = true;
                    }
                }
                return $result;
            },
            'dd'=>function($dump){
                return dd($dump);
            }
        ];
        $mustache = new Mustache_Engine($engine);
        $tpl = $mustache->loadTemplate($url_template);
        $mustache->setHelpers($helpers);
        // $mustache->addHelper('base_url',function(){
        //     return BASE_URL;
        // });
        echo $tpl->render($data);
        return;
    }
    function message(bool $status, string $message = ""): array
    {
        return ["status" => $status, "msg" => $message];
    }
}