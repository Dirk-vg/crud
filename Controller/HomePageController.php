<?php
declare(strict_types = 1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
class HomePageController
{


    public function render(array $GET, array $POST)
    {

        if (isset($_POST['student_page'])) {
            header('Location: http://crud.local/View/student/StudentView.php');
            die();
        }

        if (isset($_POST['teacher_page'])) {
            header('Location: http://crud.local/View/teacher/teacherView.php');
            die();
        }

        if (isset($_POST['class_page'])) {
            header('Location: http://crud.local/View/class/classView.php');
            die();
        }


    }
}