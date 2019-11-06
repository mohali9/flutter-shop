<?php 
include 'conn.php';
$mahasiswa = query("SELECT * FROM tb_item");

// $result=array();

if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}
echo "<br>";

// echo json_encode($result);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>php & mysql</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="" method="post" accept-charset="utf-8">
		<input type="search" name="keyword" value="" placeholder="masukan nama" autocomplete="off" autofocus>
		<button type="submit" name="cari">cari</button>
	</form>

    <table border="1" cellpadding="1" cellspacing="1">
		<thead>
			<tr>
				<th>No</th>
                <th>item_code</th>
                <th>item_name</th>
                <th>price</th>
                <th>stock</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach($mahasiswa as $row) : ?>
				<tr>
					<td><?= $row["id"]; ?></td>
					<td><?= $row["item_code"]; ?></td>
					<td><?= $row["item_name"]; ?></td>
					<td><?= $row["price"]; ?></td>
                    <td><?= $row["stock"]; ?></td>
				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>

<?php
function query($query){
	global $connect;
	$result = mysqli_query($connect, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function cari($keyword){
	$query = ("SELECT * FROM tb_item WHERE 
		item_name LIKE '%$keyword%' ");
	
	return query($query);
}
?>