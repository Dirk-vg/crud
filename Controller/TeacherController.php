<?php
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class TeacherController
{
    //TODO
    public function render(array $GET, array $POST)
    {

        $database = new DataBaseLoader();
        $teachers = $database->getTeachers();

        //load the view
        //require '../View/studentDetail.php';
        require '../../View/teacher/teacherOverview.php';
    }
}