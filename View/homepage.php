<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
//include all your model files here

require_once '../Model/DataBaseLoader.php';

//include all your controllers here
require_once '../Controller/HomePageController.php';
require_once '../Controller/InfoControler.php';
require_once '../Controller/StudentController.php';
require_once '../Controller/TeacherController.php';

//require 'Controller/InfoController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!
?>
<!doctype html>
<html lang="en">
<head>
    <title>Homepage</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<h1>Select the entity you want to view</h1>
<form action="homepage.php" method="post">
    <label for="student_page" name="student_page">Students</label>
    <input type="submit" name="student_page">
    <label for="teacher_page" name="teacher_page">Teachers</label>
    <input type="submit" name="teacher_page">
    <label for="class_page" name="class_page">Classes</label>
    <input type="submit" name="class_page">
</form>

    <?php
    $controller = new HomePageController();

    $controller->render($_GET, $_POST);

    //$database = new DataBaseLoader();

    //$teachers = $database->getTeachers();
    //$classes = $database->getClasses();
    /*require 'View/studentOverview.php';
    require 'View/studentDetail.php';

    require 'View/teacherOverview.php';
    require 'View/teacherDetail.php';

    require 'View/classOverview.php';
    require 'View/classDetail.php';*/
    ?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>




