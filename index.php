<?php

require_once("./Controllers/controller.class.php");
require_once("./Models/model.class.php");
require_once("./Views/view.class.php");

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

$controller->draft();

echo $view->output();