<<<<<<< HEAD:FinalScreen.html
z<?php
require( 'DbFile.php' );
=======
<?php
require('DbFile.php');
addGameData($_POST);
>>>>>>> 714efe832689e85f949a7486419e6f5bac212d3b:php/FinalScreen.php
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

<?php produceScoreTable( $_POST );?> 

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