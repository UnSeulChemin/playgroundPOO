<?php
namespace App\Controllers;

use App\Core\Functions;

class AdminController extends Controller
{
    public function index()
    {
        if (Functions::sessionAdmin())
        {
            $this->title = 'PlaygroundPOO | Admin';
            $this->render('admin/index');
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }
}