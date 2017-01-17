<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>

html {
	font-family: sans-serif;
}

form {
	display: table;
}

form div {
	display: table-row;
}

form label , form input {
	display: table-cell;
}

form label {
	text-align : right;
}

</style>
<body>

<h1>Dades personals</h1>
<form action="">

	<div>
		<label for="name">First name:</label>
		<input type="text" name="name">
	</div>

	<div>
		<label for="lastname">Last name: </label>
		<input type="text" name="lastname">
	</div>

	<div>
		<label for="age">Age:</label>
		<input type="text" name="age">
	</div>



</form>

</body>
</html>