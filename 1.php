<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form method="post">
		masukan nama <input type="text" name="nama">
		<br>
		<button type="submit" name="tombol">
			tampilkan
		</button>
		<input type="text" name="isi" readonly value="<?php
															$x = $_POST['nama'];
															echo $x;
														?>">
	</form>
</body>

</html>