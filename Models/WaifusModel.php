<?php
namespace App\Models;

class WaifusModel extends Model
{
    protected $id;
    protected $image;
    protected $extension;
    protected $name;
    protected $users_id;
    protected $created_at;

    public function __construct()
    {
        $this->table = "waifus";
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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function setExtension($extension)
    {
        $this->extension = $extension;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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