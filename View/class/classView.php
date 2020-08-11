<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
require_once '../../Model/DataBaseLoader.php';

//include all your controllers here
require_once '../../Controller/HomePageController.php';
require_once '../../Controller/StudentController.php';
require_once '../../Controller/TeacherController.php';
require_once '../../Controller/ClassController.php';

$controller = new ClassController();
$controller->render($_GET, $_POST);