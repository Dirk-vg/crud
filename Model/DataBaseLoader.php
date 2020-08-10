<?php
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class DataBaseLoader
{
    private PDO $pdo;

    public function __construct()
    {
        $pdo = self::openConnection();
        $this->pdo = $pdo;
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

    public function loadStudents()
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * from students');
        $statement->execute();
        $data = $statement->fetch();
        $studentArray =[];
        foreach($data as $student)
        {
            $studentArray[] = new Student();
        }
        return $studentArray;
    }

    public function loadTeachers()
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * from teachers');
        $statement->execute();
        $data = $statement->fetch();
        $teacherArray =[];
        foreach($data as $teacher)
        {
            $teacherArray[] = new Teacher();
        }
        return $teacherArray;
    }

    public function loadClasses()
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * from classes');
        $statement->execute();
        $data = $statement->fetch();
        $classArray =[];
        foreach($data as $class)
        {
            $classArray[] = new ClassName();
        }
        return $classArray;
    }
}