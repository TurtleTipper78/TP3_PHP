<?php

class RequirePage {

    static public function model($model) {
        $modelFile = 'model/' . $model . '.php';
        if (file_exists($modelFile)) {
            require_once $modelFile;
        } else {
            echo "Model file not found: $modelFile";
        }
    }

    static public function library($library) {
        $libraryFile = 'library/' . $library . '.php';
        if (file_exists($libraryFile)) {
            require_once $libraryFile;
        } else {
            echo "Library file not found: $libraryFile";
        }
    }

    static public function header($title) {
        return '
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>' . $title . '</title>
                <link rel="stylesheet" href="' . PATH_DIR . 'css/style.css">
            </head>
            <nav>
                <ul>
                    <li><a href="' . PATH_DIR . '">Home</a></li>
                    <li><a href="' . PATH_DIR . 'modele">Modele</a></li>
                    <li><a href="' . PATH_DIR . 'modele/create">Modele Create</a></li>
                    <li><a href="' . PATH_DIR . 'view/user/index">Login</a></li>
                </ul>
            </nav>
        ';
    }

    static public function url($url) {
        header('Location: ' . PATH_DIR . $url);
        exit();
    }
}
