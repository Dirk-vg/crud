<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
?>

    <table>
        <tr>
            <th>Id</th>
            <th>Teacher</th>
            <th>Actions</th>
        </tr>
<?php foreach($teachers as $teacher)
{
    echo '<tr>';
    echo "<td> {$teacher->getId()} </td>";
    echo "<td> {$teacher->getName()} </td>";
    echo "<td> <button value=> Edit </button> <button> Remove</button> </td>";
        }
        ?>
</table>

<form action="../index.php" method="post">
    <select name="teacher" id="">
        <option value="">teacher...</option>
        <?php
        foreach($teachers as $teacher)
        {
            echo "<option value={$teacher->getId()}> {$teacher->getName()} </option>";
        }
        ?>
    </select>
    <input type="submit">
</form>
<a href="">Create new teacher</a>
