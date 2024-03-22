<?php
namespace App\Controllers;

use App\Core\Form;
use App\Core\Functions;
use App\Models\UsersModel;

class ProfileController extends Controller
{
    public function index()
    {
        if (Functions::sessionUser())
        {
            $userModel = new UsersModel;
            $user = $userModel->find($_SESSION['user']['id']);
    
            $this->title = 'PlaygroundPOO | Profile';
            $this->render('profile/index', ["user" => $user]);
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }

    public function updateEmail()
    {
        if (Functions::sessionUser())
        {
            $userModel = new UsersModel;
            $user = $userModel->find($_SESSION['user']['id']);

            if (!$user || is_numeric(basename($_GET["p"])))
            {
                header('Location: ../profile');
                exit;
            }

            if (Form::validate($_POST, ['email']))
            {
                $email = strip_tags($_POST['email']);

                $userModel = new UsersModel;
                $userModel->setId($user->id)->setEmail($email);
                $userModel->update();

                header('Location: profile');
                exit;
            }

            $form = new Form;

            $form->startForm()
                ->startDiv()->addInput('email', 'email', ['placeholder' => 'Email', 'value' => $user->email, 'autofocus' => true])->endDiv()
                ->addButton('Validate', ['type' => 'submit', 'class' => 'link-form'])
                ->endForm();

            $this->title = 'PlaygroundPOO | Profile | Email';
            $this->render("profile/emailId", ['emailForm' => $form->create()]);
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }
}