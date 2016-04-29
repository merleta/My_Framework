<?php

namespace lib\antoine;

abstract class Controller {

    /**
     * Display view (with values)
     *
     * @param string    $view      the view who want to call
     * @param array     $array     values 
     *
     * @return void
     */
    public function render($view, Array $array = null) {
        $expl = explode(':', $view);

        if(file_exists($expl[0])) {
            include_once('../app/views/'.$expl[0].'/'.$expl[1].'.html');
        } else {
            $content = file_get_contents('../app/views/'.$expl[0].'/'.$expl[1].'.html');

            foreach ($array as $key => $value) {
                $content = str_replace('{{ '.$key.' }}', $value, $content);
            }
            echo $content;
        }
    }
}

?>