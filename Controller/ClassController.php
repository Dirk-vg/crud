<?php


class ClassController
{
    //ToDO
    public function render(array $GET, array $POST)
    {

        $database = new DataBaseLoader();
        $classes = $database->getClasses();

        //load the view
        //require '../View/studentDetail.php';
        require '../../View/class/classOverview.php';
    }
}