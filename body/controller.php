<?php

namespace body;

class Controller {
    public function loadModel($model) {
        require_once 'models/' . $model . '.php';
        return new $model();
    }

    public function loadView($view, $data = []) {
        extract($data);
        require_once 'views/' . $view . '.php';
    }
}
