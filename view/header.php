<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ path }}css/style.css">
</head>
<body>
    <nav class='header'>
        <ul>
            <li><a href="{{ path }}">Home</a></li>
            <li><a href="{{ path }}modele/index">Modele Index</a></li>
            <li><a href="{{ path }}modele/create">Modele Create</a></li>
            <li><a href="{{ path }}login">Login</a></li>
        </ul>
    </nav>
</body>
</html>

