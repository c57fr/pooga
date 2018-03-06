<?php
use Gc7\Tuto\Session;
require 'Interface/accueil/Session.php';
$session = new Session();
//include 'autoloader.php';

use Gc7\Tuto\Flash;

require 'Interface/accueil/Flash.php';
//require 'Interface/accueil/SessionInterface.php';

$flash=new Flash($session);
echo $flash->get();

