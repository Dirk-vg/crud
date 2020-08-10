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
        <th>Location</th>
        <th>Teacher</th>
        <th>Current students</th>
        <th>Actions</th>
    </tr>
    <?php
    if(isset($_POST['class'])){
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
        echo "<td><button>Edit</button><button>Remove</button></td>";
        echo "</tr>";
    }
    ?>
</table>