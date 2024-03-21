<?php
namespace App\Controllers;

use App\Core\Functions;
use App\Models\WaifusModel;

class WaifusController extends Controller
{
    public function index()
    {
        if (Functions::sessionUser())
        {
            $waifuModel = new WaifusModel;
            $pathRedirect = Functions::pathRedirect();
            $waifus = $waifuModel->findAll();
    
            $this->title = 'PlaygroundPOO | Waifus';
            $this->render("waifus/index", ["waifus" => $waifus, "pathRedirect" => $pathRedirect]);
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }
}