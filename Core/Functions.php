<?php
namespace App\Core;

class Functions
{
    public static function sessionUser(): bool
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id']))
        {
            return true;
        }
        return false;
    }

    public static function pathRedirect()
    {
        if (str_contains($_GET["p"], "/"))
        {
            if (substr_count($_GET["p"], "/") == 1)
            {
                return "../";
            }

            else if (substr_count($_GET["p"], "/") == 2)
            {
                return "../../";
            }

            else
            {
                http_response_code(404);
                $value = "Page doesn't exist.";
                setcookie("404", $value, time()+3600);
                header("Location: ./");
            }
        }
        return null;
    }
}