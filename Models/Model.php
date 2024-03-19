<?php
namespace App\Models;

use App\Core\Db;

class Model extends Db
{
    protected $table;

    private $db;

    public function requete(string $sql, array $attributes = null)
    {
        $this->db = Db::getInstance();

        if ($attributes !== null)
        {
            $query = $this->db->prepare($sql);
            $query->execute($attributes);
            return $query;
        }

        else
        {
            return $this->db->query($sql);
        }
    }

    public function findAll()
    {
        $query = $this->requete("SELECT * FROM " . $this->table);
        return $query->fetchAll();
    }

    public function findBy(array $targets)
    {
        $fields = [];
        $values = [];

        foreach ($targets as $field => $value)
        {
            $fields[] = "$field = ?";
            $values[] = $value;
        }

        $list_fields = implode(' AND ', $fields);

        return $this->requete("SELECT * FROM {$this->table} WHERE $list_fields", $values)->fetchAll();
    }

    public function find(int $id)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE id = $id")->fetch();
    }

    public function create()
    {
        $fields = [];
        $inter = [];
        $values = [];

        foreach ($this as $field => $value)
        {
            if ($value !== null && $field != 'db' && $field != 'table')
            {
                $fields[] = $field;
                $inter[] = "?";
                $values[] = $value;
            }
        }

        $list_fields = implode(', ', $fields);
        $list_inter = implode(', ', $inter);

        return $this->requete('INSERT INTO '.$this->table.' ('. $list_fields.')VALUES('.$list_inter.')', $values);
    }

    public function update()
    {
        $fields = [];
        $values = [];

        foreach ($this as $field => $value)
        {
            if ($value !== null && $field != 'db' && $field != 'table')
            {
                $fields[] = "$field = ?";
                $values[] = $value;
            }
        }
        $values[] = $this->id;

        $list_fields = implode(', ', $fields);

        return $this->requete('UPDATE '.$this->table.' SET '. $list_fields.' WHERE id = ?', $values);
    }

    public function delete(int $id)
    {
        return $this->requete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function hydrate($datas)
    {
        foreach ($datas as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
        return $this;
    }
}