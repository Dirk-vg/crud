<?php
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class StudentController
{
    public function render(array $GET, array $POST)
    {

        $database = new DataBaseLoader();
        $students = $database->getStudents();

        //load the view
        //require '../View/studentDetail.php';
        require '../../View/student/studentOverview.php';
    }
}