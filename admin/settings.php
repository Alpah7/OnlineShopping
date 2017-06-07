<?php 
session_start();

require_once './bootstraps/autoload.php';

$admin_data = $user->get_user_details($_SESSION['users']);

require_once './templates/_Header.php';
require_once './templates/_Nav.php';
require_once './templates/_SideBar.php';
require_once './templates/_Settings.php';
require_once './templates/_Footer.php';

?>