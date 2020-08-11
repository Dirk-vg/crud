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
        <th>Email</th>
        <th>Teacher</th>
        <th>Class</th>
        <th>Actions</th>
    </tr>
    <?php
    if(isset($_POST['student'])){
        $currentStudent = [];
        $database = new DataBaseLoader();
        $students = $database->getStudents();
        foreach($students as $student) {
            if($student->getId() == (int)$_POST['student'])
            {
                $currentStudent = $student;
            }
        }
        echo '<tr>';
        echo "<td> {$currentStudent->getId()}</td>";
        echo "<td> {$currentStudent->getName()}</td>";
        echo "<td> {$currentStudent->getEmail()}</td>";
        echo "<td> {$database->fetchTeacherByid($currentStudent->getTeacherId())}</td>";
        echo "<td> {$database->fetchClassByid($currentStudent->getClassId())}</td>";
        echo "<td><form action='studentEdit.php' method='post'> <button type='submit' name='id' value={$currentStudent->getId()}> Edit or Remove </button></form> </td>";
        echo "</tr>";
    }
    ?>
</table>