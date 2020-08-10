<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

//include all your model files here
require_once 'Model/ItClass.php';
require_once 'Model/Student.php';
require_once 'Model/Teacher.php';
require_once 'Model/DataBaseLoader.php';

//include all your controllers here
require_once 'Controller/HomePageController.php';
require_once 'Controller/InfoController.php';
require_once 'Controller/StudentController.php';
require_once 'Controller/TeacherController.php';
//require 'Controller/InfoController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

$controller = new HomePageController();
if(isset($_GET['page']) && $_GET['page'] === 'info') {
//    $controller = new InfoController();
}
$controller->render($_GET, $_POST);

$database = new DataBaseLoader();
$students = $database->getStudents();
$teachers = $database->getTeachers();
$classes = $database->getClasses();

require 'View/studentOverview.php';
require 'View/studentDetail.php';

require 'View/teacherOverview.php';
require 'View/teacherDetail.php';

require 'View/classOverview.php';
require  'View/classDetail.php';
