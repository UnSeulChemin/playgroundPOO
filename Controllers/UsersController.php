<?php
namespace App\Controllers;

use App\Core\Form;
use App\Core\Functions;
use App\Models\UsersModel;

class UsersController extends Controller
{
    public function register()
    {
        if (Functions::sessionEmpty())
        {
            if (Form::validate($_POST, ['email', 'password']))
            {
                if (Form::validateEmail($_POST, ['email']))
                {
                    $email = strip_tags($_POST['email']);

                    $userModel = new UsersModel;
                    $user = $userModel->findBy(["Email" => $email]);

                    if (!$user)
                    {
                        if (Form::validatePassword($_POST, ['password']))
                        {
                            $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
                            $roles = ["ROLE_USER"];
                
                            $userModel = new UsersModel;
                            $userModel->setEmail($email)->setPassword($password)->setRoles($roles, "encode");
                
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
                            $_SESSION['warning'] = !empty($_POST) ? "Password not enough strong." : '';
                            $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
                            $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
                        }
                    }

                    else
                    {
                        $_SESSION['warning'] = !empty($_POST) ? "Email already taken." : '';
                        $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
                        $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
                    }
                }

                else
                {
                    $_SESSION['warning'] = !empty($_POST) ? "Incorrect email format." : '';
                    $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
                    $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
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
    
            $this->title = 'PlaygroundPOO | Register';
            $this->render('users/register', ['registerForm' => $form->create()]);
        }

        else
        {
            header('Location: '.Functions::pathRedirect().'./');
            exit;
        }
    }

    public function login()
    {
        if (Functions::sessionEmpty())
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
    
            $this->title = 'PlaygroundPOO | Login';
            $this->render('users/login', ['loginForm' => $form->create()]);
        }

        else
        {
            header('Location: '.Functions::pathRedirect().'./');
            exit;
        }
    }

    public function logout()
    {
        if (Functions::sessionUser())
        {
            unset($_SESSION['user']);
            header('Location: '.Functions::pathRedirect().'./');
            exit;
        }

        else
        {
            header('Location: '.Functions::pathRedirect().'./');
            exit;
        }
    }
}