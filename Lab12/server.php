<?php

class Server
{
    public function __construct()
    {
    }

    public function getStudentName($idArray)
    {
        return "Teo";
    }
}

$params = array('uri' => 'server.php');
$server = new SoapServer(NULL, $params);
$server->setClass(("server"));
$server->handle();

/*
[a) Locate your php.ini file. This is normally under your <php_home> folder (for example, C:/xampp/php).
b) Search for and uncomment the line that says ;extension=soap, by removing the first ; character, to make it looks like extension=soap; and save php.ini.
c) Then restart your server (stop and start XAMPP]
*/