<?php
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class DataBaseLoader
{
    private PDO $pdo;
    private array $students;
    private array $teachers;
    private array $classes;

    public function __construct()
    {
        $pdo = self::openConnection();
        $this->pdo = $pdo;
        $this->students = $this->loadStudents($pdo);
        $this->teachers = $this->loadTeachers($pdo);
        $this->classes = $this->loadClasses($pdo);

    }

    function openConnection(): PDO
    {
        $dbhost = "localhost";
        $dbuser = "becode";
        $dbpass = "becode";
        $db = "crud_exercise";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);
    }

    public function loadStudents(PDO $pdo)
    {
        $statement = $pdo->query('SELECT * from students');
        $data = $statement->fetch();
        $studentArray =[];
        foreach($data as $student)
        {
            $studentArray[] = new Student();
        }
        return $studentArray;
    }

    public function loadTeachers(PDO $pdo)
    {
        $statement = $pdo->query('SELECT * from teachers');
        $data = $statement->fetch();
        $teacherArray =[];
        foreach($data as $teacher)
        {
            $teacherArray[] = new Teacher();
        }
        return $teacherArray;
    }

    public function loadClasses(PDO $pdo)
    {
        $statement = $pdo->query('SELECT * from classes');
        $data = $statement->fetch();
        $classArray =[];
        foreach($data as $class)
        {
            $classArray[] = new ClassName();
        }
        return $classArray;
    }
}