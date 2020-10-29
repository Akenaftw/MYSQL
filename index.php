<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require 'components/model/Connection.php';
require 'components/model/Authorisation.php';
require 'components/model/Session.php';
require 'components/controller/controller.php';
require 'components/view/body.php';


