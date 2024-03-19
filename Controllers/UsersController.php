<?php
namespace App\Controllers;

use App\Core\Form;
use App\Models\UsersModel;

class UsersController extends Controller
{
    public function register()
    {
        if (Form::validate($_POST, ['email', 'password']))
        {
            $email = strip_tags($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
            $roles = ['ROLE_USER'];

            $userModel = new UsersModel;
            $userModel->setEmail($email)->setPassword($password)->setRoles($roles);

            if ($userModel->create())
            {
                $userArray = $userModel->findOneByEmail($email);
                $user = $userModel->hydrate($userArray);
                $user->setSession();
                header("Location: .././");
                exit;
            }
        }

        else
        {
            $_SESSION['warning'] = !empty($_POST) ? "Form is empty." : '';
            $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
            $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
        }

        $form = new Form;

        $form->startForm()
            ->startDiv()->addInput('email', 'email', ['placeholder' => 'Email', 'autofocus' => true])->endDiv()
            ->startDiv()->addInput('password', 'password', ['placeholder' => 'Password'])->endDiv()
            ->addButton('Register', ['type' => 'submit', 'class' => 'link-form'])
            ->endForm();

        $this->render('users/register', ['registerForm' => $form->create()]);
    }

    public function login()
    {
        if (Form::validate($_POST, ['email', 'password']))
        {
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);

            $userModel = new UsersModel;
            $userArray = $userModel->findOneByEmail($email);

            if ($userArray)
            {
                $user = $userModel->hydrate($userArray);

                if (password_verify($password, $user->getPassword()))
                {
                    $user->setSession();
                    header("Location: .././");
                    exit;
                }
    
                else
                {
                    $_SESSION["warning"] = "Email and / or password is incorrect.";
                }
            }

            else
            {
                $_SESSION["warning"] = "Email and / or password is incorrect.";
            }
        }

        else
        {
            $_SESSION['warning'] = !empty($_POST) ? "Form is empty." : '';
            $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
            $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
        }

        $form = new Form;

        $form->startForm()
            ->startDiv()->addInput('email', 'email', ['placeholder' => 'Email', 'autofocus' => true])->endDiv()
            ->startDiv()->addInput('password', 'password', ['placeholder' => 'Password'])->endDiv()
            ->addButton('Login', ['type' => 'submit', 'class' => 'link-form'])
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