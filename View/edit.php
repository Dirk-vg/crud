<?php
require '../Model/DataBaseLoader.php';
if (isset($_POST['id'])) {

$sql = 'SELECT * FROM students WHERE id=:id';
$id = $_POST['id'];
$database = new DataBaseLoader();
$pdo = $database->getPdo();
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $id);
$statement->execute();
$fetch = $statement->fetch();
$currentStudent = new Student($fetch['name'],(int) $fetch['id'], $fetch['email'], (int)$fetch['teacher_id'], (int)$fetch['class_id']);

}

if (isset($_POST['name'], $_POST['email'], $_POST['class'], $_POST['teacher'], $_POST['id'])) {
    $database = new DataBaseLoader();
    $pdo = $database->getPdo();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $database->fetchClassIdByName($_POST['class']);
    $teacher = $database->fetchTeacherIdbyName($_POST['teacher']);

    $sql = 'UPDATE students SET name=:name, email=:email, teacher_id=:teacher_id, class_id=:class_id WHERE id=:id';
    $statement = $pdo->prepare($sql);

    $statement->bindValue('name', $name);
    $statement->bindValue('email', $email);
    $statement->bindValue('teacher_id', $teacher);
    $statement->bindValue('class_id', $class);
    $statement->bindValue('id', $id);
    $statement->execute();
}

?>
<?php require 'includes/header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update person</h2>
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
                    <input value="<?php  if(isset($currentStudent)) { echo $currentStudent->getId();} ?>" type="text" name="id" id="id" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?php  if(isset($currentStudent)) { echo $currentStudent->getName();} ?>" type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" value="<?php if(isset($currentStudent)) { echo $currentStudent->getEmail();} ?>" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="class">Teacher</label>
                    <input type="text" value="<?php if(isset($currentStudent)){ echo $database->fetchTeacherbyId($currentStudent->getTeacherId());} ?>" name="teacher" id="teacher" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Class</label>
                    <input type="text" value="<?php if(isset($currentStudent)){ echo $database->fetchClassbyId($currentStudent->getClassId());} ?>" name="class" id="class" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update person</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require 'includes/footer.php';

// ToDo
/**
delete btn for student
 */

?>
