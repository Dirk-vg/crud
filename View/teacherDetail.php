<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
?>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Class</th>
        <th>Current students</th>
        <th>Actions</th>
    </tr>
    <?php
    if(isset($_POST['teacher'])){
        $currentTeacher = [];
        foreach($teachers as $teacher) {
            if($teacher->getId() == (int)$_POST['teacher'])
            {
                $currentTeacher = $teacher;
            }
        }
        $teacherId = $currentTeacher->getId();
        echo '<tr>';
        echo "<td> {$teacherId}</td>";
        echo "<td> {$currentTeacher->getName()}</td>";
        echo "<td> {$currentTeacher->getEmail()}</td>";
        echo "<td> {$database->fetchClassByid($currentTeacher->getClassId())}</td>";
        echo "<td><ul>";
        foreach ($students as $student)
        {
            if($student->getTeacherId() == $teacherId)
            {
                echo "<li> {$student->getName()} </li>";
            }
        }
        echo "</ul></td>";
        echo "<td><button>Edit</button><button>Remove</button></td>";
        echo "</tr>";
    }
    ?>
</table>
