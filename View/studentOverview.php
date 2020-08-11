<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
?>

<table>
    <tr>
        <th>Id</th>
        <th>Student</th>
        <th>Actions</th>
    </tr>
    <?php foreach($students as $student)
    {
        echo '<tr>';
        echo "<td> {$student->getId()} </td>";
        echo "<td> {$student->getName()} </td>";

        echo "<td><form action='edit.php' method='post'> <button type='submit' name='id' value={$student->getId()}> Edit </button> <button> Remove</button></form> </td>";
    }
    ?>
</table>

<form action="../Controller/StudentController.php" method="post">
    <select name="student" id="">
        <option value="">student...</option>
        <?php
        foreach($students as $student)
        {
            echo "<option value={$student->getId()}> {$student->getName()} </option>";
        }
        ?>
    </select>
    <input type="submit">
</form>
<a href="create.php">Create new Student</a>
