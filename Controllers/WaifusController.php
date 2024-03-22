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

            $sessionId = $_SESSION['user']['id'];
            $waifus = $waifuModel->findBy(['users_id' => $sessionId]);
    
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

            $waifuUsersId = $waifu->users_id;
            $sessionId = $_SESSION['user']['id'];

            if (!$waifu || $waifuUsersId !== $sessionId)
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