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
            $waifus = $waifuModel->findByUsersId($_SESSION['user']['id']);
    
            $this->title = 'PlaygroundPOO | Waifus';
            $this->render("waifus/index", ["waifus" => $waifus, "pathRedirect" => $pathRedirect]);
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }

    public function waifu(int $id)
    {
        if (Functions::sessionUser())
        {
            $waifuModel = new WaifusModel;
            $pathRedirect = Functions::pathRedirect();
            $waifu = $waifuModel->find($id);

            if (!$waifu || $waifu->users_id !== $_SESSION['user']['id'])
            {
                header('Location: ../users/ships');
                exit;
            }

            $this->title = 'PlaygroundPOO | Waifus | '.$waifu->name;
            $this->render('waifus/waifu', ["waifu" => $waifu, "pathRedirect" => $pathRedirect]);
        }

        else
        {
            header('Location: ../users/login');
            exit;
        }
    }
}