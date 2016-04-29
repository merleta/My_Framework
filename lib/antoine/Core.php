<?php

namespace lib\antoine;

/*use antoine\exceptions\NotFoundException;*/

require_once('config.php');

class Core{

    /**
     * Load config.ini
     *
     * @return void
     */
    public static function loadConfig() {
        if(file_exists(dirname(__FILE__.'config.ini'))) {
            $ini_array = parse_ini_file('config.ini');
            foreach ($ini_array as $key => $value) {
                define($key, $value);
            }
        }
    }

    /**
     * Load autoload and Controller
     *
     * @return void
     */
    public static function run() {
        try {
            Core::registerAutoload();

            if(true === isset($_GET['page'])) {
                $getInfos = explode("/", $_GET["page"]);
                if(class_exists('\\app\\controllers\\'.ucfirst($getInfos[0]).'Controller')) {
                    $callController = '\\app\\controllers\\'.ucfirst($getInfos[0])."Controller";
                    $implementController = new $callController;
                    if(count($getInfos) > 1) {
                        $method = $getInfos[1].'Action';
                        if (method_exists($callController, $method)) {
                            $implementController->$method();
                        }
                    }
                }
            }
        } catch (Exception $e) {
            if ($e instanceof NotFoundException) {
                header("HTTP/1.1 404 Not Found");
            } else {
                header("HTTP/1.1 500 Internal Server Error");
            }
        }
    }

    /**
     * Include class
     *
     * @return void
     */
    public static function registerAutoload() {
        spl_autoload_register(
            function ($class) {

                $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

                if (file_exists(APP_DIR . "/" . $class.'.php')) {
                    include_once APP_DIR."/".$class.'.php';
                }
            }
        );
    }
}

?>