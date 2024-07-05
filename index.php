<?php
// Autoload the necessary files
spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\", DIRECTORY_SEPARATOR, $class_name);

    // Check in core, controllers, models and config directories
    $directories = ['body', 'controllers', 'models', 'config'];

    foreach ($directories as $directory) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $class_name . '.php';
        echo "Checking: $file<br>"; // Debugging statement
        if (file_exists($file)) {
            require_once $file;
            echo "Loaded: $file<br>"; // Debugging statement
            return;
        }
    }
    echo "Class file not found for $class_name<br>"; // Debugging statement
});

// Get the controller and action from the URL, default to UserController and index
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'UserController';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Add namespace to controller
$controllerClass = "controllers\\" . $controllerName;
echo "Controller class: $controllerClass<br>"; // Debugging statement

if (class_exists($controllerClass)) {
    // Create an instance of the controller and call the action
    $controller = new $controllerClass();
    echo "Controller instantiated: $controllerClass<br>"; // Debugging statement

    if (method_exists($controller, $action)) {
        echo "Calling action: $action<br>"; // Debugging statement
        $controller->$action();
    } else {
        echo "Action $action not found in controller $controllerClass.<br>";
    }
} else {
    echo "Controller class $controllerClass not found.<br>";
}
