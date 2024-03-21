<?php
namespace App\Controllers;

use App\Core\Functions;
use App\Models\ShipsModel;

class ShipsController extends Controller
{
    public function index()
    {
        if (Functions::sessionUser())
        {
            $shipModel = new ShipsModel;
            $pathRedirect = Functions::pathRedirect();
            $ships = $shipModel->findAllPaginate();
            $counts = $shipModel->countsPaginate();
    
            $this->title = 'PlaygroundPOO | Ships';
            $this->render("ships/index", ["ships" => $ships, "counts" => $counts, "pathRedirect" => $pathRedirect]);
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }

    public function page(int $id)
    {
        if (Functions::sessionUser())
        {
            $shipModel = new ShipsModel;
            $pathRedirect = Functions::pathRedirect();
            $ships = $shipModel->findAllPaginate($id);
            $counts = $shipModel->countsPaginate();

            if (basename($_GET['p']) > $counts)
            {
                header('Location: ../users/ships/');
                exit;
            }  
        
            $this->title = 'PlaygroundPOO | Ships | '.$id;
            $this->render("ships/index", ["ships" => $ships, "counts" => $counts, "pathRedirect" => $pathRedirect]);
        }

        else
        {
            header('Location: ../users/login');
            exit;
        }
    }

    public function show(int $id)
    {
        if (Functions::sessionUser())
        {
            $shipModel = new ShipsModel;
            $pathRedirect = Functions::pathRedirect();
            $ship = $shipModel->find($id);

            if (!$ship)
            {
                header('Location: ../users/ships');
                exit;
            }

            $this->title = 'PlaygroundPOO | Ships | '.$ship->name;
            $this->render('ships/show', ["ship" => $ship, "pathRedirect" => $pathRedirect]);
        }

        else
        {
            header('Location: ../users/login');
            exit;
        }
    }
}