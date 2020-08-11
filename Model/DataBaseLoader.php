<?php
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

require 'ItClass.php';
require 'Student.php';
require  'Teacher.php';

class DataBaseLoader
{
    private PDO $pdo;
    private array $students;
    private array $teachers;
    private array $classes;

    public function __construct()
    {
        $pdo = $this->openConnection();
        $this->pdo = $pdo;
        $this->students = $this->loadStudents();
        $this->teachers = $this->loadTeachers();
        $this->classes = $this->loadClasses();
    }
    function openConnection(): PDO
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "Compile-1894";
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
        $data = $statement->fetchAll();
        $studentArray =[];
        foreach($data as $student)
        {
            $studentArray[] = new Student($student['name'], (int)$student['id'], $student['email'], (int)$student['teacher_id'], (int)$student['class_id']);
        }
        return $studentArray;
    }

    public function loadTeachers()
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * from teachers');
        $statement->execute();
        $data = $statement->fetchAll();
        $teacherArray =[];
        foreach($data as $teacher)
        {
            $teacherArray[] = new Teacher((int)$teacher['id'], $teacher['name'], $teacher['email'], (int)$teacher['class_id']);
        }
        return $teacherArray;
    }

    public function loadClasses()
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * from classes');
        $statement->execute();
        $data = $statement->fetchAll();
        $classArray =[];
        foreach($data as $class)
        {
            $classArray[] = new ItClass((int) $class['id'], $class['name'], $class['location'], (int)$class['teacher_id']);
        }
        return $classArray;
    }

    /**
     * @return array
     */
    public function getStudents(): array
    {
        return $this->students;
    }

    /**
     * @return array
     */
    public function getTeachers(): array
    {
        return $this->teachers;
    }

    /**
     * @return array
     */
    public function getClasses(): array
    {
        return $this->classes;
    }

    public function fetchTeacherbyId(int $id) : string
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT name from teachers where id= :id');
        $statement->bindValue('id', $id);
        $statement->execute();
        $name = $statement->fetch();
        return $name['name'];
    }
    public function fetchClassbyId(int $id) : string
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT name from classes where id= :id');
        $statement->bindValue('id', $id);
        $statement->execute();
        $name = $statement->fetch();
        return $name['name'];
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

}