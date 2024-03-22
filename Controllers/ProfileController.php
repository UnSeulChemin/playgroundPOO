<?php
namespace App\Controllers;

class ProfileController extends Controller
{
    public function index()
    {
        $this->render('profile/index');
    }
}