<?php
require "pdo.php";
session_start();
$id =
    $_SESSION['id'];
$customer = $pdo->query(
    "SELECT count(distinct customers.customer_id) as customer FROM new_orders
    JOIN order_delivery_details ON order_delivery_details.order_delivery_details_id=new_orders.order_delivery_details_id
    JOIN customer_delivery_details ON customer_delivery_details.customer_delivery_details_id=order_delivery_details.customer_delivery_details_id
    JOIN customers ON customers.customer_id=customer_delivery_details.customer_id
    JOIN new_ordered_products ON new_ordered_products.new_orders_id=new_orders.new_orders_id
    JOIN product_details ON new_ordered_products.product_details_id=product_details.product_details_id
    JOIN product_description ON product_details.product_description_id=product_description.product_description_id
    JOIN product ON product.product_id=product_description.product_id
    JOIN category ON category.category_id=product.category_id
    JOIN store on store.store_id=product_details.store_id where product_details.store_id=$id"
);
$selled = $pdo->query(
    "SELECT count(new_ordered_products.new_ordered_products_id) as selled FROM new_orders
    JOIN order_delivery_details ON order_delivery_details.order_delivery_details_id=new_orders.order_delivery_details_id
    JOIN customer_delivery_details ON customer_delivery_details.customer_delivery_details_id=order_delivery_details.customer_delivery_details_id
    JOIN customers ON customers.customer_id=customer_delivery_details.customer_id
    JOIN new_ordered_products ON new_ordered_products.new_orders_id=new_orders.new_orders_id
    JOIN product_details ON new_ordered_products.product_details_id=product_details.product_details_id
    JOIN product_description ON product_details.product_description_id=product_description.product_description_id
    JOIN product ON product.product_id=product_description.product_id
    JOIN category ON category.category_id=product.category_id
    JOIN store on store.store_id=product_details.store_id
    WHERE new_ordered_products.delivery_status='completed' AND product_details.store_id=$id"
);
$neworder = $pdo->query(
    "SELECT count(new_ordered_products.new_ordered_products_id) as neworders FROM new_orders
    JOIN order_delivery_details ON order_delivery_details.order_delivery_details_id=new_orders.order_delivery_details_id
    JOIN customer_delivery_details ON customer_delivery_details.customer_delivery_details_id=order_delivery_details.customer_delivery_details_id
    JOIN customers ON customers.customer_id=customer_delivery_details.customer_id
    JOIN new_ordered_products ON new_ordered_products.new_orders_id=new_orders.new_orders_id
    JOIN product_details ON new_ordered_products.product_details_id=product_details.product_details_id
    JOIN product_description ON product_details.product_description_id=product_description.product_description_id
    JOIN product ON product.product_id=product_description.product_id
    JOIN category ON category.category_id=product.category_id
    JOIN store on store.store_id=product_details.store_id
    WHERE new_ordered_products.delivery_status='pending' and product_details.store_id=$id"
);
$newproduct = $pdo->query(
    "SELECT  count(product_id) as newproducts from product 
    where (added_date) in (SELECT max(added_date) as date from product)"
);
$rows = array();
$nu = $customer->fetch(PDO::FETCH_ASSOC);
$rows[] = $nu;
$sn = $selled->fetch(PDO::FETCH_ASSOC);
$rows[] = $sn;
$nwo = $neworder->fetch(PDO::FETCH_ASSOC);
$rows[] = $nwo;
$npo = $newproduct->fetch(PDO::FETCH_ASSOC);
$rows[] = $npo;
echo json_encode($rows);
