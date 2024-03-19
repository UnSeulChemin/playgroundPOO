<?php
namespace App\Controllers;

use App\Models\ShipsModel;

class ShipsController extends Controller
{
    public function index()
    {
        $shipModel = new ShipsModel;
        $ships = $shipModel->findAll();

        $this->render("ships/index", ["ships" => $ships]);
    }

    public function show(int $id)
    {
        $shipModel = new ShipsModel;
        $ship = $shipModel->find($id);

        $this->render('ships/show', ["ship" => $ship]);
    }
}