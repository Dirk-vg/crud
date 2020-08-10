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
        echo "<td> <button value=> Edit </button> <button> Remove</button> </td>";
    }
    ?>
</table>

<form action="../index.php" method="post">
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
<a href="">Create new class</a>