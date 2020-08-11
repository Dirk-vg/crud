<?php
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class StudentController
{
    public function render(array $GET, array $POST)
    {

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.
        $database = new DataBaseLoader();
        $students = $database->getStudents();

        require '../View/studentOverview.php';

        require '../View/studentDetail.php';

        //load the view
    }
}