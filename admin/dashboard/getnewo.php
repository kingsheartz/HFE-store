<?php
require "../../db.php";

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
  $data = array(
    ':product_name' => "%" . $_GET['product_name'] . "%",
    ':order_date' => "%" . $_GET['order_date'] . "%",
    ':store_name' => "%" . $_GET['store_name'] . "%",
    ':delivery_status' => "%" . $_GET['delivery_status'] . "%",
    ':total_amt' => "%" . $_GET['total_amt'] . "%"
  );
  $query = "SELECT *  FROM new_orders
	JOIN order_delivery_details ON order_delivery_details.order_delivery_details_id=new_orders.order_delivery_details_id
	JOIN customer_delivery_details ON customer_delivery_details.customer_delivery_details_id=order_delivery_details.customer_delivery_details_id
	JOIN customers ON customers.customer_id=customer_delivery_details.customer_id
	JOIN new_ordered_products ON new_ordered_products.new_orders_id=new_orders.new_orders_id
	JOIN product_details ON new_ordered_products.product_details_id=product_details.product_details_id
	JOIN product_description ON product_details.product_description_id=product_description.product_description_id
	JOIN product ON product.product_id=product_description.product_id
	JOIN category ON category.category_id=product.category_id
	JOIN store on store.store_id=product_details.store_id
    WHERE new_ordered_products.delivery_status='pending'
      AND product.product_name LIKE :product_name
      AND new_orders.order_date LIKE :order_date
      AND store.store_name LIKE :store_name
      AND new_ordered_products.delivery_status LIKE :delivery_status
      AND new_ordered_products.total_amt LIKE :total_amt ";

  $statement = $pdo->prepare($query);
  $statement->execute($data);
  $result = $statement->fetchAll();

  foreach ($result as $row) {
    $output[] = array(
      'new_ordered_products_id' => $row['new_ordered_products_id'],
      'product_name' => $row['product_name'],
      'order_date' => $row['order_date'],
      'store_name' => $row['store_name'],
      'delivery_status' => $row['delivery_status'],
      'total_amt' => $row['total_amt']
    );
  }

  echo json_encode($output);
}
