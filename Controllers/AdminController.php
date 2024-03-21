<?php
namespace App\Controllers;

use App\Core\Functions;
use App\Models\ContactsModel;

class AdminController extends Controller
{
    public function index()
    {
        if (Functions::sessionAdmin())
        {
            $this->title = 'PlaygroundPOO | Admin';
            $this->render('admin/index');
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }

    public function contacts()
    {
        if (Functions::sessionAdmin())
        {
            $contactModel = new ContactsModel;
            $pathRedirect = Functions::pathRedirect();
            $contacts = $contactModel->findAll();

            $this->title = 'PlaygroundPOO | Admin | Contacts';
            $this->render("admin/contacts", ["contacts" => $contacts, "pathRedirect" => $pathRedirect]);
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }
}