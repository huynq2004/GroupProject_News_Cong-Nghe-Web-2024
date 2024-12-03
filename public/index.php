<?php
require_once('../app/config/config.php');
require_once APP_ROOT .'/app/config/database.php';
//Dùng để test controller
 require_once APP_ROOT.'/app/controllers/NewsController.php';

 $controller = new NewsController();
 $controller->index();
