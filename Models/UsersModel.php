<?php
namespace App\Models;

class UsersModel extends Model
{
    protected $id;
    protected $email;
    protected $password;
    protected $roles;

    public function __construct()
    {
        $this->table = "users";
    }

    public function findOneByEmail(string $email)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE email = ?", [$email])->fetch();
    }

    public function setSession()
    {
        $_SESSION['user'] = [
            'id' => $this->id,
            'email' => $this->email,
            'roles' => $this->roles
        ];
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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($roles)
    {
        $this->roles = json_encode($roles);
        return $this;
    }
}