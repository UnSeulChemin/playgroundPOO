<?php

namespace App\Controllers;

use App\Models\ShipsModel;

class ShipsController extends Controller
{
    public function index()
    {
        $model = new ShipsModel;
        $ships = $model->findAll();

        $this->render("ships/index", ["ships" => $ships]);
    }

    public function show(int $id)
    {
        $model = new ShipsModel;
        $ship = $model->find($id);

        $this->render('ships/show', ["ship" => $ship]);
    }
}