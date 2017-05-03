<?php
require('DbFile.php');
//addGameData($_POST);
echo $_POST[0];
//addTargets($_POST);
?>

<!DOCTYPE html>
<html>
<head>
<style>
.textAlign{
	text-align: center;
					
}
.buttonStyle{
	border-color: #4CAF50;
	border: none;
	padding: 15px, 32px;
	display: inline-block;
	font-size: 16px;
	color: white; 
	text-align: center;
}

.divStyle{
    width: 500px;
    margin: auto;
    border: 2px solid #4Ca;
}

.centerStyle{
	width: 200px;
    margin: auto;
}

th{
	padding: 10px
}

</style>

</head>

<body>
	
	<h1 class="textAlign">End Game</h1>
<div class="divStyle">Your Score

<?php echo $_POST['score'];?>

</div>

<div class="centerStyle">

<ul class="buttonStyle">

<li>
<button class="buttonStyle">Play Again</button>
</li>
</ul>

</div>

</body>
</html>