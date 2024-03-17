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

    private function ajoutAttributs(array $attributs): string
    {
        $str = '';

        $courts = ['checked', 'disabled', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formnovalidate'];

        foreach($attributs as $attribut => $valeur)
        {
            if(in_array($attribut, $courts) && $valeur == true)
            {
                $str .= " $attribut";
            }
            
            else
            {
                $str .= " $attribut=\"$valeur\"";
            }
        }

        return $str;
    }

    public function debutForm(string $methode = 'post', string $action = '#', array $attributs = []): self
    {
        $this->formCode .= "<form action='$action' method='$methode'";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';
        return $this;
    }

    public function finForm():self
    {
        $this->formCode .= '</form>';
        return $this;
    }

    public function ajoutLabelFor(string $for, string $texte, array $attributs = []):self
    {
        $this->formCode .= "<label for='$for'";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= ">$texte</label>";

        return $this;
    }

    public function ajoutInput(string $type, string $nom, array $attributs = []): self
    {
        $this->formCode .= "<input type='$type' name='$nom'";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';
        return $this;
    }

    public function ajoutTextarea(string $nom, string $valeur = '', array $attributs = []):self
    {
        $this->formCode .= "<textarea name='$nom'";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= ">$valeur</textarea>";
        return $this;
    }

    public function ajoutSelect(string $nom, array $options, array $attributs = []):self
    {
        $this->formCode .= "<select name='$nom'";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';

        foreach($options as $valeur => $texte)
        {
            $this->formCode .= "<option value=\"$valeur\">$texte</option>";
        }

        $this->formCode .= '</select>';
        return $this;
    }

    public function ajoutBouton(string $texte, array $attributs = []): self
    {
        $this->formCode .= '<button ';
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= ">$texte</button>";

        return $this;
    }
}