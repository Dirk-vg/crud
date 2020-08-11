<?php
require_once '../../Model/DataBaseLoader.php';
$message = '';
if (isset($_POST['name'], $_POST['location'], $_POST['teacher'])) {
    $database = new DataBaseLoader();
    $name = $_POST['name'];
    $location = $_POST['location'];
    $teacher = $database->fetchTeacherIdByName($_POST['teacher']);
    $sql = 'INSERT INTO classes(name, location, teacher_id) VALUES(:name, :location, :teacher)';
    $PDO = $database->getPdo();
    $statement =$PDO->prepare($sql);
    $statement->bindValue('name', $name);
    $statement->bindValue('location', $location);
    $statement->bindValue('teacher', $teacher);
    $statement->execute();

}

?>
<?php require '../includes/header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Create a class</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="location" name="location" id="location" class="form-control">
                </div>
                <div class="form-group">
                    <label for="teacher">Teacher</label>
                    <input type="text" name="teacher" id="teacher" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Create a teacher</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>
