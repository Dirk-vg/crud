<?php
require '../Model/DataBaseLoader.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM students WHERE id=:id';
$database = new DataBaseLoader();
$pdo = $database->getPdo();
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $id);
$statement->execute();
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['name'], $_POST['email'], $_POST['class'], $_POST['teacher'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = 'UPDATE students SET name=:name, email=:email WHERE id=:id';
    $statement = $pdo->prepare($sql);
    if ($statement->execute([':name' => $name, ':email' => $email, 'class' => $class, ':teacher' => $teacher, ':id' => $id])) {
        header("Location: /");
    }
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
                    <label for="name">Name</label>
                    <input value="<?php  $person->getName(); ?>" type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="<?php $email->getEmail(); ?>" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="class">Class</label>
                    <input type="text" value="<?php $class->getClasses(); ?>" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="<?php $teacher->getTeachers(); ?>" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update person</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'includes/footer.php'; ?>
