<?php

namespace App\Core;

class Form
{
    private $formCode = "";

    public function create()
    {
        return $this->formCode;
    }

    public static function validate(array $form, array $fields)
    {
        foreach($fields as $field)
        {
            if(!isset($form[$field]) || empty($form[$field]))
            {
                return false;
            }
        }
    
        return true;
    }

    private function addAttributes(array $attributes): string
    {
        $str = '';

        $shorts = ['checked', 'disabled', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formnovalidate'];

        foreach($attributes as $attribute => $valeur)
        {
            if(in_array($attribute, $shorts) && $valeur == true)
            {
                $str .= " $attribute";
            }
            
            else
            {
                $str .= " $attribute=\"$valeur\"";
            }
        }

        return $str;
    }

    public function startForm(string $methode = 'post', string $action = '#', array $attributs = []): self
    {
        $this->formCode .= "<form action='$action' method='$methode'";
        $this->formCode .= $attributs ? $this->addAttributes($attributs).'>' : '>';
        return $this;
    }

    public function endForm():self
    {
        $this->formCode .= '</form>';
        return $this;
    }

    public function addLabelFor(string $for, string $texte, array $attributs = []):self
    {
        $this->formCode .= "<label for='$for'";
        $this->formCode .= $attributs ? $this->addAttributes($attributs) : '';
        $this->formCode .= ">$texte</label>";

        return $this;
    }

    public function addInput(string $type, string $nom, array $attributs = []): self
    {
        $this->formCode .= "<input type='$type' name='$nom'";
        $this->formCode .= $attributs ? $this->addAttributes($attributs).'>' : '>';
        return $this;
    }

    public function addTextarea(string $nom, string $valeur = '', array $attributs = []):self
    {
        $this->formCode .= "<textarea name='$nom'";
        $this->formCode .= $attributs ? $this->addAttributes($attributs) : '';
        $this->formCode .= ">$valeur</textarea>";
        return $this;
    }

    public function addSelect(string $nom, array $options, array $attributs = []):self
    {
        $this->formCode .= "<select name='$nom'";
        $this->formCode .= $attributs ? $this->addAttributes($attributs).'>' : '>';

        foreach($options as $valeur => $texte)
        {
            $this->formCode .= "<option value=\"$valeur\">$texte</option>";
        }

        $this->formCode .= '</select>';
        return $this;
    }

    public function addBouton(string $texte, array $attributs = []): self
    {
        $this->formCode .= '<button ';
        $this->formCode .= $attributs ? $this->addAttributes($attributs) : '';
        $this->formCode .= ">$texte</button>";
        return $this;
    }
}