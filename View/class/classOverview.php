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
        <th>Actions</th>
    </tr>
    <?php foreach($classes as $class)
    {
        echo '<tr>';
        echo "<td> {$class->getId()} </td>";
        echo "<td> {$class->getName()} </td>";
        echo "<td><form action='classEdit.php' method='post'> <button type='submit' name='id' value={$class->getId()}> Edit or Remove </button></form> </td>";
    }
    ?>
</table>

<form action="classDetail.php" method="post">
    <select name="class" id="">
        <option value="">class...</option>
        <?php
        foreach($classes as $class)
        {
            echo "<option value={$class->getId()}> {$class->getName()} </option>";
        }
        ?>
    </select>
    <input type="submit">
</form>
<a href="classCreate.php">Create new class</a>