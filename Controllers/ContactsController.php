<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\ContactsModel;

class ContactsController extends Controller
{
    public function index()
    {
        if(Form::validate($_POST, ['title', 'description']))
        {
            $title = strip_tags($_POST['title']);
            $description = strip_tags($_POST['description']);

            $contact = new ContactsModel;

            $contact->setTitle($title)->setDescription($description);
            $contact->create();

            $_SESSION["validate"] = "Contact has been successfully sent.";
            header("Location: contacts");
            exit;
        }

        else
        {
            $_SESSION['warning'] = !empty($_POST) ? "Form is empty." : '';
            $title = isset($_POST['title']) ? strip_tags($_POST['title']) : '';
            $description = isset($_POST['description']) ? strip_tags($_POST['description']) : '';
        }

        $form = new Form;

        $form->startForm()
            ->startDiv()->addInput('text', 'title', ['placeholder' => 'Title', 'value' => $title, 'autofocus' => true])->endDiv()
            ->startDiv()->addInput('text', 'description', ['placeholder' => 'Description', 'value' => $description])->endDiv()
            ->addButton('Validate', ['type' => 'submit', 'class' => 'link-form'])
            ->endForm();

        $this->render("contacts/index", ['contactForm' => $form->create()]);
    }
}