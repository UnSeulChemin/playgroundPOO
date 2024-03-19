<?php
namespace App\Models;

class ContactsModel extends Model
{
    protected $id;
    protected $title;
    protected $description;
    protected $users_id;
    protected $created_at;

    public function __construct()
    {
        $this->table = "contacts";
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getUsers_id(): int
    {
        return $this->users_id;
    }

    public function setUsers_id(int $users_id)
    {
        $this->users_id = $users_id;
        return $this;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }
}