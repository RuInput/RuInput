<?php
    echo "<label id='input'> ".  $_POST["input"]  .  "</label>";
    echo "<label id='age'>" . $_POST["age"] . "</label>";
?>
<html lang="en" onclick="miss(1)">
    <head>
        <meta charset="UTF-8">
        <title>RuInput Challenge</title>
        <script src = "../js/TargetQueue.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/RuInput.css">
    </head>
    <body id="body" onload="generateTarget()">
        <label id="score"> </label>
        <br />
        <label id="misses"> </label>
        <br />
        <label id ="target_info"> </label>
        <div id="targetContainer" class="target_container"> </div>
    </body>
    <script>
        html = document.documentElement;
        var targetNum = 20;
        var targets = new TargetQueue(html.offsetWidth,  html.offsetHeight , targetNum);
        targets.generateTargets(); // populate targets object

		var date = new Date();
		var initialTime = date.getTime();
		var misses = 0;
		var score = 0;

		document.getElementById("body").onclick = function() {
		    score += 200;
            document.getElementById("score").innerHTML = "Score : " + score;
            document.getElementById("misses").innerHTML = "Misses : " + misses;
        };
		document.getElementById("score").innerHTML = "Score : 0";
        document.getElementById("misses").innerHTML = "Misses : 0";


        function generateTarget() {
            var target = document.createElement("label");
			var date = new Date();
			var newTargetTime = date.getTime();
			if (targets.currentTarget !== targetNum) {
                var values = targets.dequeueTarget();
            }
            else {
                //document.getElementById("target_info").innerHTML = JSON.stringify(targets,null,2);
                targets.age = document.getElementById("age").innerHTML;
                targets.device = document.getElementById("input").innerHTML;
                targets.score = score;
                targets.misses = document.getElementById("misses").innerHTML;
                document.getElementById("misses").innerHTML = JSON.stringify(targets, null, 2);
                //.post("./FinalScreen.php", targets, "POST");
            }
            target.className = "target";
            target.id = "target";
            target.onclick = function () {
				miss(-1); // decrement miss counter
                values['timeToClick'] = _timeToClick;
                removeTarget(this.id); // remove the existing button on screen

				var _clickedDate = new Date();
				var _clickedTime = _clickedDate.getTime();
				var _timeToClick = _clickedTime - newTargetTime; // set the time since last clicked

				score -= 200; // decrement score by 200 for every button click to
				score += _timeToClick; // Depending on the time it took the button the score is incremented accordingly
				values['timeToClick'] = _timeToClick;
                document.getElementById("score").innerHTML = "Score : " + score;
                document.getElementById("misses").innerHTML = "Misses : " + misses;
            };
			
            target.style.height = Math.floor(values.size) + "px"; // set the target height
            target.style.width = Math.floor(values.size) + "px"; // set the target width
            target.style.top = Math.floor(values.yPos) + "px"; // set the target y position
            target.style.left = Math.floor(values.xPos ) + "px"; // set the target x position


            document.getElementById("targetContainer").appendChild(target); //Append the target to the target container that spans the body
        }

        function removeTarget(id) {
            var elem = document.getElementById(id);
            elem.parentNode.removeChild(elem);
            generateTarget();
        }
		
		function miss(n) {
			misses = misses + n;
			if (misses < 0) {
				misses = 0;
			}
		}
    </script>
</html>