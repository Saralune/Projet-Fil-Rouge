<?php

include 'DevCoder.php';

(new DotEnv(__DIR__ . '/../.env'))->load();

try{
    $bdd = new PDO(getenv('DATABASE_DNS'),
        getenv('DATABASE_USER'),getenv('DATABASE_PASSWORD'),
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
