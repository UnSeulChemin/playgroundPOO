<?php

namespace App\Controllers;

abstract class Controller
{
    protected $template = 'base';

    public function render(string $fichier, array $data = [])
    {
        extract($data);

        ob_start();
        require_once(ROOT.'/Views/'.$fichier.'.php');
        $content = ob_get_clean();

        require_once(ROOT.'/Views/'.$this->template.'.php');
    }
}