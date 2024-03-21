<?php
namespace App\Controllers;

use App\Core\Functions;

class AdminController extends Controller
{
    public function index()
    {
        if (Functions::sessionAdmin())
        {
            $this->render('main/index');
        }

        else
        {
            header('Location: '.Functions::pathRedirect().'./');
            exit;
        }
    }
}