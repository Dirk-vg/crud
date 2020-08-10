<?php
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class Student
{
    private string $name;
    private int $id;
    private string $email;
    private int $teacher_id;
    private int $class_id;

    /**
     * Student constructor.
     * @param string $name
     * @param int $id
     * @param string $email
     * @param int $teacher_id
     * @param int $class_id
     */
    public function __construct(string $name, int $id, string $email, int $teacher_id, int $class_id)
    {
        $this->name = $name;
        $this->id = $id;
        $this->email = $email;
        $this->teacher_id = $teacher_id;
        $this->class_id = $class_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getTeacherId(): int
    {
        return $this->teacher_id;
    }

    /**
     * @param int $teacher_id
     */
    public function setTeacherId(int $teacher_id): void
    {
        $this->teacher_id = $teacher_id;
    }

    /**
     * @return int
     */
    public function getClassId(): int
    {
        return $this->class_id;
    }

    /**
     * @param int $class_id
     */
    public function setClassId(int $class_id): void
    {
        $this->class_id = $class_id;
    }
}