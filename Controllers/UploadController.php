<?php
namespace App\Controllers;

use App\Core\Form;
use App\Core\Functions;

class UploadController extends Controller
{
    private $allowed = [];

    private $filename;
    private $filetype;
    private $filesize;

    private $extension;

    public function index()
    {
        if (Functions::sessionUser())
        {
            if (Form::validateFiles($_FILES, ['image']))
            {
                $this->allowed = [
                    "jpg" => "image/jpeg",
                    "jpeg" => "image/jpeg",
                    "png" => "image/png"
                ];

                $this->filename =  $_FILES["image"]["name"];
                $this->filetype =  $_FILES["image"]["type"];
                $this->filesize =  $_FILES["image"]["size"];

                $this->extension = strtolower(pathinfo($this->filename, PATHINFO_EXTENSION));

                if (array_key_exists($this->extension, $this->allowed) || in_array($this->filetype, $this->allowed))
                {
                    if ($this->filesize < 1024 * 1024)
                    {
                        $newname = md5(uniqid());
                        $newfilename = "../public/images/uploads/$newname.".$this->extension;
        
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename))
                        {
                            chmod($newfilename, 0644);
                            $_SESSION["validate"] = "Upload success.";
                        }

                        else
                        {
                            $_SESSION['warning'] = !empty($_FILES) ? "Upload failed." : '';
                        }
                    }

                    else
                    {
                        $_SESSION['warning'] = !empty($_FILES) ? "File too large." : '';
                    }
                }

                else
                {
                    $_SESSION['warning'] = !empty($_FILES) ? "Incorrect file format." : '';
                }
            }

            else
            {
                $_SESSION['warning'] = !empty($_FILES) ? "File is empty." : '';
            }

            $this->title = 'PlaygroundPOO | Upload';
            $this->render('upload/index');
        }

        else
        {
            header('Location: users/login');
            exit;
        }
    }
}