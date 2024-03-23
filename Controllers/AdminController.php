<?php
namespace App\Controllers;

use App\Core\Form;
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
            $contacts = $contactModel->findAll();
            $pathRedirect = Functions::pathRedirect();

            $this->title = 'PlaygroundPOO | Admin | Contacts';
            $this->render("admin/contacts", ["contacts" => $contacts, "pathRedirect" => $pathRedirect]);
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }

    public function contact(int $id)
    {
        if (Functions::sessionAdmin())
        {
            $contactModel = new ContactsModel;
            $contact = $contactModel->find($id);

            if (!$contact)
            {
                header('Location: ../contacts');
                exit;
            }

            $this->title = 'PlaygroundPOO | Admin | Contact | '.$contact->id;
            $this->render('admin/contact', ["contact" => $contact]);
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }

    public function updateContact(int $id)
    {
        if (Functions::sessionAdmin())
        {
            $contactModel = new ContactsModel;
            $contact = $contactModel->find($id);
            
            if (!$contact)
            {
                header('Location: ../contacts');
                exit;
            }

            if (Form::validate($_POST, ['title', 'description']))
            {
                $title = strip_tags($_POST['title']);
                $description = strip_tags($_POST['description']);

                $contactModel = new ContactsModel;
                $contactModel->setId($contact->id)->setTitle($title)->setDescription($description);
                $contactModel->update();

                header('Location: ../contacts');
                exit;
            }

            $form = new Form;

            $form->startForm()
                ->startDiv()->addInput('text', 'title', ['placeholder' => 'Title', 'value' => $contact->title, 'autofocus' => true])->endDiv()
                ->startDiv()->addInput('text', 'description', ['placeholder' => 'Description', 'value' => $contact->description])->endDiv()
                ->addButton('Validate', ['type' => 'submit', 'class' => 'link-form'])
                ->endForm();
            
            $this->title = 'PlaygroundPOO | Admin | Contacts | '.$contact->id;
            $this->render("admin/contactId", ['form' => $form->create()]);
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }

    public function deleteContact(int $id)
    {
        if (Functions::sessionAdmin())
        {
            $contactModel = new ContactsModel;
            $contactModel->delete($id);

            header('Location: ../contacts');
            exit;
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }

    public function favoriteContact(int $id)
    {
        if (Functions::sessionAdmin())
        {
            $contactModel = new ContactsModel;
            $contactArray = $contactModel->find($id);

            if (!$contactArray)
            {
                header('Location: ../contacts');
                exit;
            }

            $contact = $contactModel->hydrate($contactArray);

            $favorite = $contact->getFavorite() == 'N' ? 'Y' : 'N'; 
            $contact->setFavorite($favorite);
            $contact->update();
        }
    }
}