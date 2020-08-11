<?php
declare(strict_types = 1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
class HomePageController
{

    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.
        if (isset($_POST['student_page'])) {
            header('Location: http://crud.local/View/StudentView.php');
            die();
        }
        //load the view
    }
}