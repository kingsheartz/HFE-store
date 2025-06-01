<?php
session_start();
$id = $_SESSION['id'];
require "pdo.php";
$stmt = $pdo->query("select *  FROM new_orders
  JOIN order_delivery_details ON order_delivery_details.order_delivery_details_id=new_orders.order_delivery_details_id
  JOIN customer_delivery_details ON customer_delivery_details.customer_delivery_details_id=order_delivery_details.customer_delivery_details_id
  JOIN customers ON customers.customer_id=customer_delivery_details.customer_id
  JOIN new_ordered_products ON new_ordered_products.new_orders_id=new_orders.new_orders_id
  JOIN product_details ON new_ordered_products.product_details_id=product_details.product_details_id
  JOIN product_description ON product_details.product_description_id=product_description.product_description_id
  JOIN product ON product.product_id=product_description.product_id
  JOIN category ON category.category_id=product.category_id
  JOIN store on store.store_id=product_details.store_id
  WHERE new_ordered_products.delivery_status='completed' AND product_details.store_id=$id");
$rows = array(1);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $rows[] = $row;
}
echo json_encode($rows);
?>