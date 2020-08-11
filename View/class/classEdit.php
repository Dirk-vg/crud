<?php
require '../../Model/DataBaseLoader.php';

$database = new DataBaseLoader();
$pdo = $database->getPdo();
if (isset($_POST['id'])) {

$sql = 'SELECT * FROM classes WHERE id=:id';
$id = $_POST['id'];
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $id);
$statement->execute();
$fetch = $statement->fetch();
$currentClass = new ItClass((int) $fetch['id'], $fetch['name'], $fetch['location'], (int)$fetch['teacher_id']);

}

if (isset($_POST['name'], $_POST['location'], $_POST['teacher'], $_POST['id']) && isset($_POST['save'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $teacher = $database->fetchTeacherIdbyName($_POST['teacher']);

    $sql = 'UPDATE classes SET name=:name, location=:location, teacher_id=:teacher_id WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->bindValue('name', $name);
    $statement->bindValue('location', $location);
    $statement->bindValue('teacher_id', $teacher);
    $statement->bindValue('id', $id);
    $statement->execute();
}

if (isset($_POST['name'], $_POST['location'], $_POST['teacher'], $_POST['id']) && isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = 'DELETE from classes WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->bindValue('id', $id);
    $statement->execute();
}

?>
<?php require '../includes/header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update class</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="name">Id</label>
                    <input value="<?php  if(isset($currentClass)) { echo $currentClass->getId();} ?>" type="text" name="id" id="id" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?php  if(isset($currentClass)) { echo $currentClass->getName();} ?>" type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" value="<?php if(isset($currentClass)) { echo $currentClass->getLocation();} ?>" name="location" id="location" class="form-control">
                </div>
                <div class="form-group">
                    <label for="teacher">Teacher</label>
                    <input type="text" value="<?php if(isset($currentClass)){ echo $database->fetchTeacherbyId($currentClass->getTeacherId());} ?>" name="teacher" id="teacher" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="save" class="btn btn-info">Update class</button>
                    <button type="submit" name="delete" class="btn btn-danger">Delete class</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require '../includes/footer.php';

// ToDo
/**
delete btn for student
 */

?>
