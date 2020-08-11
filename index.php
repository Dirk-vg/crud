<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

//include all your model files here
require_once 'Model/DataBaseLoader.php';

//include all your controllers here
require_once 'Controller/HomePageController.php';
require_once 'Controller/StudentController.php';
require_once 'Controller/TeacherController.php';
require_once 'Controller/ClassController.php';

require_once 'View/includes/header.php';
?>

<h1>Select the entity you want to view</h1>
<form action="index.php" method="post">
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


require_once 'View/includes/footer.php';
?>






