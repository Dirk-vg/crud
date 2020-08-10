<?php
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class Teacher
{
    private int $id;
    private string $name;
    private string $email;
    private int $class_id;

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

    /**
     * Teacher constructor.
     * @param int $id
     * @param string $name
     * @param string $email
     */
    public function __construct(int $id, string $name, string $email, int $class_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->class_id = $class_id;
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



}