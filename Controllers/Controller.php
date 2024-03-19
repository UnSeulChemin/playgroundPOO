<?php
namespace App\Controllers;

use App\Core\Functions;

abstract class Controller
{
    protected $template = 'base';
    protected $title = 'PlaygroundPOO';

    public function render(string $file, array $data = [])
    {
        extract($data);

        ob_start();
        require_once(ROOT.'/Views/'.$file.'.php');
        $title = $this->title;
        $sessionUser = Functions::sessionUser();
        $sessionAdmin = Functions::sessionAdmin();
        $pathRedirect = Functions::pathRedirect();
        $content = ob_get_clean();

        require_once(ROOT.'/Views/'.$this->template.'.php');
    }
}