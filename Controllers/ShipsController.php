<?php
namespace App\Controllers;

use App\Models\ShipsModel;

class ShipsController extends Controller
{
    public function index()
    {
        $shipModel = new ShipsModel;
        $ships = $shipModel->findAll();

        $this->title = 'PlaygroundPOO | Ships';
        $this->render("ships/index", ["ships" => $ships]);
    }

    public function show(int $id)
    {
        $shipModel = new ShipsModel;
        $ship = $shipModel->find($id);

        $this->title = 'PlaygroundPOO | '.$ship->name;
        $this->render('ships/show', ["ship" => $ship]);
    }
}