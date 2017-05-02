<?php
    echo "lol";
    echo $_POST["input"];
    var_dump($_POST);
?>
<html lang="en" onclick="miss(1)">
    <head>
        <meta charset="UTF-8">
        <title>RuInput Challenge</title>
        <script src = "../js/TargetQueue.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/RuInput.css">
    </head>
    <body onload="generateTarget()">
        <label id="score"/>
        <label id="misses"/>
        <div id="targetContainer" class="target_container">
        </div>
    </body>
    <script>
        html = document.documentElement;
        var targets = new TargetQueue(html.offsetWidth,  html.offsetHeight , 30);
        targets.generateTargets(); // populate targets object
        alert(JSON.stringify(targets, null, 2));
		
		var date = new Date();
		var initialTime = date.getTime();
		var misses = 0;
		var score = 0;

		document.getElementById("score").innerHTML = "Score : 0";
        document.getElementById("misses").innerHTML = "Misses : 0";


        function generateTarget() {
            var target = document.createElement("BUTTON");
			var date = new Date();
			var newTargetTime = date.getTime();
            var values = targets.dequeueTarget();
            target.className = "target";
            target.id = "target";
            target.onclick = function () {
				miss(-1);
                removeTarget(this.id);
				var clickedDate = new Date();
				var clickedtime = clickedDate.getTime();
				timeToClick = clickedtime - newTargetTime;
				alert(timeToClick);
				alert(misses);
            };
			
            target.style.height = Math.floor(values.size) + "px";
            target.style.width = Math.floor(values.size) + "px";
            target.style.top = Math.floor(values.yPos) + "px";
            target.style.left = Math.floor(values.xPos ) + "px";


            document.getElementById("targetContainer").appendChild(target);
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