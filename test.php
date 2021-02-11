<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once ('classes/autoload.php');

 
$sender = new \core\Sender();
$receiver = new \core\Receiver();

\work\ConnectionManager::connect($sender,'sendSignalOne',$receiver,'actionOnSignalOne');

\work\ConnectionManager::connect($sender,'sendSignalTwo',$receiver,'actionOnSignalTwo');

$sender->sendSignalOne();

//$sender->sendSignalTwo();


//\work\ConnectionManager::disconnect($sender, 'sendSignalOne', $receiver, 'actionOnSignalOne');

//$sender->sendSignalOne();

//$sender->sendSignalTwo();