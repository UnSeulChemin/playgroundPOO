<?php

namespace App\Core;

use App\Controllers\MainController;

class Main
{
    public function start()
    {
        session_start();

        $uri = $_SERVER['REQUEST_URI'];

		if ($_SERVER['SERVER_NAME'] == 'localhost'):
			$basename = "/playgroundPOO/";
		else:
			$basename = "";
		endif;

        if(!empty($uri) && $uri != '/' && $uri[-1] === '/' && $uri != $basename)
        {
            $uri = substr($uri, 0, -1);
            http_response_code(301);
            header('Location: '.$uri);
            exit;
        }

        $params = explode('/', $_GET['p']);

        if($params[0] != "")
        {
            // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule, en ajoutant le namespace des controleurs et en ajoutant "Controller" à la fin
            $controller = '\\App\\Controllers\\'.ucfirst(array_shift($params)).'Controller';

            // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
            $action = isset($params[0]) ? array_shift($params) : 'index';

            // On instancie le contrôleur
            $controller = new $controller();

            if(method_exists($controller, $action))
            {
                // Si il reste des paramètres, on appelle la méthode en envoyant les paramètres sinon on l'appelle "à vide"
                (isset($params[0])) ? call_user_func_array([$controller,$action], $params) : $controller->$action();
            }
            
            else
            {
                http_response_code(404);
                echo "La page recherchée n'existe pas";
            }
        }
        
        else
        {
            // Ici aucun paramètre n'est défini
            // On instancie le contrôleur par défaut (page d'accueil)
            $controller = new MainController();

            // On appelle la méthode index
            $controller->index();
        }
    }
}