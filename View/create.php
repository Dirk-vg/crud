<?php
require_once '../Model/DataBaseLoader.php';
$message = '';
if (isset($_POST['name'], $_POST['email'], $_POST['class'], $_POST['teacher'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $teacher = $database->fetchTeacherbyId((int)$_POST['teacher']);
    $sql = 'INSERT INTO students(name, email, class, teacher) VALUES(:name, :email, :class, :teacher)';
    $database = new DataBaseLoader();
    $PDO = $database->getPdo();
    $statement =$PDO->prepare($sql);
    if ($statement->execute([':name' => $name, ':email' => $email, ':class' => $class, ':teacher' => $teacher])) {
        $message = 'data inserted successfully';
    }
}

?>
<?php require 'includes/header.php'; ?>
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
                <label for="product">Choose a teacher:</label>
                <select name="product" id="product">
                    <option value="">Teachers</option>
                    <?php
                    /** @var Teacher[] $teachers */
                    $teachers = $teachers->getTeachers();
                    foreach ($teachers as $teacher) {
                        $id = $teacher->getId();
                        $name = ucfirst($teacher->getName());
                        echo '<option value="$teacher_id">';
                    }
                    ?>
                </select>
            </form>
        </div>
    </div>
</div>
<?php require 'includes/footer.php'; ?>
