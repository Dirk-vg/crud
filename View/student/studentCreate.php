<?php
require_once '../../Model/DataBaseLoader.php';
$message = '';
if (isset($_POST['name'], $_POST['email'], $_POST['class'], $_POST['teacher'])) {
    $database = new DataBaseLoader();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $teacher = $database->fetchTeacherIdbyName($_POST['teacher']);
    $class = $database->fetchClassIdByName($_POST['class']);
    $sql = 'INSERT INTO students(name, email, teacher_id, class_id) VALUES(:name, :email, :teacher, :class)';
    $PDO = $database->getPdo();
    $statement =$PDO->prepare($sql);
    $statement->bindValue('name', $name);
    $statement->bindValue('email', $email);
    $statement->bindValue('teacher', $teacher);
    $statement->bindValue('class', $class);
    $statement->execute();

}

?>
<?php require '../includes/header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Create a person</h2>
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
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="class">class</label>
                    <input type="text" name="class" id="class" class="form-control">
                </div>
                <div class="form-group">
                    <label for="teacher">Teacher</label>
                    <input type="text" name="teacher" id="teacher" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Create a person</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>
