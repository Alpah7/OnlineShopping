<?php

$products 		= new Products();
$items 			= $products->getAllProduct(8);
$number 		= $products->getPage(8);
$all_products 	= $products->all_products();
$num_products	= count($all_products);
$categories		= $products->categories();
$details 		= (isset($_GET['id'])) ? $products->get_details_item($_GET['id']) : '';
$num_products 	= $products->num_products();
$num_shopping_cart = $products->num_shopping_cart();

$user 		= new Users();
$all_users 	= $user->all_users();
$num_users	= count($all_users);

$categories 	= new Categories();
$all_categories = $categories->get_all_categories();

$generator 		= new Generators();

$cart 		= new Cart();

/* Admin Private Initialized */

$admin = new AdminNotifications();
$notif = $admin->get_user_notifications();

$orders = new Orders();
$scheduler = $orders->delete_scheduler();
$orders_data = $orders->get_data_order();

/* ========================= */

if (!__SHOP__) {
	$user->is_loggedin($_SESSION['users']);
}

?>