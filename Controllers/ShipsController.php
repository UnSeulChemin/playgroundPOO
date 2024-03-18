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
}