<?php
require '../../Model/DataBaseLoader.php';

$database = new DataBaseLoader();
$pdo = $database->getPdo();
if (isset($_POST['id'])) {

$sql = 'SELECT * FROM teachers WHERE id=:id';
$id = $_POST['id'];
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $id);
$statement->execute();
$fetch = $statement->fetch();
$currentTeacher = new Teacher((int) $fetch['id'], $fetch['name'], $fetch['email'], (int)$fetch['class_id']);

}

if (isset($_POST['name'], $_POST['email'], $_POST['class'], $_POST['id']) && isset($_POST['save'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $database->fetchClassIdByName($_POST['class']);

    $sql = 'UPDATE teachers SET name=:name, email=:email, class_id=:class_id WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->bindValue('name', $name);
    $statement->bindValue('email', $email);
    $statement->bindValue('class_id', $class);
    $statement->bindValue('id', $id);
    $statement->execute();
}

if (isset($_POST['name'], $_POST['email'], $_POST['class'], $_POST['id']) && isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = 'DELETE from teachers WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->bindValue('id', $id);
    $statement->execute();
}

?>
<?php require '../includes/header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update teacher</h2>
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
                    <input value="<?php  if(isset($currentTeacher)) { echo $currentTeacher->getId();} ?>" type="text" name="id" id="id" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?php  if(isset($currentTeacher)) { echo $currentTeacher->getName();} ?>" type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" value="<?php if(isset($currentTeacher)) { echo $currentTeacher->getEmail();} ?>" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Class</label>
                    <input type="text" value="<?php if(isset($currentTeacher)){ echo $database->fetchClassbyId($currentTeacher->getClassId());} ?>" name="class" id="class" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="save" class="btn btn-info">Update person</button>
                    <button type="submit" name="delete" class="btn btn-danger">Delete person</button>
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
