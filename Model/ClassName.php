<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
class ClassName
{
    private int $id;
    private string $name;
    private string $location;
    private int $teacher_id;

    /**
     * ClassName constructor.
     * @param int $id
     * @param string $name
     * @param string $location
     * @param int $teacher_id
     */
    public function __construct(int $id, string $name, string $location, int $teacher_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->teacher_id = $teacher_id;
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
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
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
}