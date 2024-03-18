<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UsersModel;

class UsersController extends Controller
{
    public function register()
    {
        if(Form::validate($_POST, ['email', 'password']))
        {
            $email = strip_tags($_POST['email']);
            $pass = password_hash($_POST['password'], PASSWORD_ARGON2I);

            $user = new UsersModel;
            $user->setEmail($email)
                ->setPassword($pass);
            $user->create();
        }

        $form = new Form;

        $form->startForm()
            ->addLabelFor('email', 'E-mail :')
            ->addInput('email', 'email', ['class' => 'form-control', 'id' => 'email'])
            ->addLabelFor('pass', 'Mot de passe :')
            ->addInput('password', 'password', ['id' => 'pass', 'class' => 'form-control'])
            ->addBouton('M\'inscrire', ['class' => 'btn btn-primary'])
            ->endForm();

        $this->render('users/register', ['registerForm' => $form->create()]);
    }





    public function login()
    {
        if(Form::validate($_POST, ['email', 'password']))
        {
            $userModel = new UsersModel;
            $userArray = $userModel->findOneByEmail(strip_tags($_POST['email']));

            if(!$userArray)
            {
                http_response_code(404);
                header('Location: login');
                exit;
            }

            $user = $userModel->hydrate($userArray);

            if(password_verify($_POST['password'], $user->getPassword()))
            {
                $user->setSession();
                header("Location: ../main");
            }

            else
            {
                $_SESSION["erreur"] = "L'adresse e-mail et/ou le mot de passe est incorrect";
                header('Location: login');
                exit;    
            }
        }

        $form = new Form;

        $form->startForm()
            ->addLabelFor('email', 'Email')
            ->addInput('email', 'email', ['id' => 'email', 'class' => 'form-control'])
            ->addLabelFor('password', 'Mot de passe')
            ->addInput('password', 'password', ['id' => 'password', 'class' => 'form-control'])
            ->addBouton('Me connecter', ['class' => 'btn btn-primary'])
            ->endForm();

        $this->render('users/login', ['loginForm' => $form->create()]);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit;
    }    
}