<?php
include 'conn.php';

// $queryResult=$connect->query("SELECT * FROM tb_item");
$queryResult=$connect->query("SELECT id,item_code AS kategori,item_name,price,stock, SUM(price * stock) AS totalharga, (select sum(stock) from tb_item child where parent.item_code = child.item_code group by child.item_code) as totalstok FROM tb_item parent GROUP BY id,item_code,item_name,price,stock");

// $queryResult=$connect->query("SELECT id,item_code AS kategori,item_name,price,stock, SUM(stock) AS totalstok, SUM(price * stock) AS totalharga FROM tb_item GROUP BY id,item_code,item_name,price,stock WHERE item_code IN (SELECT item_code AS kategori, SUM(stock) AS stock, SUM(price * stock) AS price FROM tb_item GROUP BY item_code);
			

$result=array();

while($fetchData=$queryResult->fetch_assoc()){
	$result[]=$fetchData;
}

echo json_encode($result);

?>
