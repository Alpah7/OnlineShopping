<?php 
session_start();

require_once '../actions/core.php';
require_once '../classes/Database.php';
require_once '../classes/Products.php';
require_once '../classes/Categories.php';
require_once '../classes/Users.php';
require_once '../classes/Cart.php';
require_once '../classes/Generators.php';
require_once '../classes/init.php';
require_once '../actions/CartAction.php';

require_once '../templates/_Header.php';
require_once '../templates/_Nav.php';
require_once '../templates/_Container.php';
require_once '../templates/_Footer.php';
?>