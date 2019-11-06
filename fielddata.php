<?php
include 'conn.php';

$queryResult=$connect->query("SELECT item_code AS kategori, SUM(stock) AS stock, SUM(price * stock) AS price FROM tb_item GROUP BY item_code");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
	$result[]=$fetchData;
}

echo json_encode($result);

?>

