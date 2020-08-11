<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
require_once '../../Model/DataBaseLoader.php';
?>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Location</th>
        <th>Teacher</th>
        <th>Current students</th>
        <th>Actions</th>
    </tr>
    <?php
    if(isset($_POST['class'])){
        $database = new DataBaseLoader();
        $classes = $database->loadClasses();
        $students = $database->getStudents();
        $currentClass = [];
        foreach($classes as $class) {
            if($class->getId() == (int)$_POST['class'])
            {
                $currentClass = $class;
            }
        }
        $classId = $currentClass->getId();
        echo '<tr>';
        echo "<td> {$classId}</td>";
        echo "<td> {$currentClass->getName()}</td>";
        echo "<td> {$currentClass->getLocation()}</td>";
        echo "<td> {$database->fetchTeacherbyId($currentClass->getTeacherId())}</td>";
        echo "<td><ul>";
        foreach ($students as $student)
        {
            if($student->getClassId() == $classId)
            {
                echo "<li> {$student->getName()} </li>";
            }
        }
        echo "</ul></td>";
        echo "<td><form action='classEdit.php' method='post'> <button type='submit' name='id' value={$currentClass->getId()}> Edit or Remove </button></form> </td>";
        echo "</tr>";
    }
    ?>
</table>