<?php
namespace App\Controllers;

use App\Core\Functions;

abstract class Controller
{
    protected $template = 'base';

    public function render(string $file, array $data = [])
    {
        extract($data);

        ob_start();
        require_once(ROOT.'/Views/'.$file.'.php');
        $pathRedirect = Functions::pathRedirect();
        $content = ob_get_clean();

        require_once(ROOT.'/Views/'.$this->template.'.php');
    }
}