<?php
    echo "lol";
    echo $_POST["input"];
    var_dump($_POST);
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>RuInput Challenge</title>
        <script src = "../js/TargetQueue.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/RuInput.css">
    </head>
    <script>
        html = document.documentElement;
        var o = new TargetQueue(html.offsetWidth,  html.offsetHeight , 6);
        o.generateTargets();
        alert(JSON.stringify(o, null, 2));

        function generateTarget() {
            var target = document.createElement("BUTTON");
            var values = o.dequeueTarget();
            target.className = "target";
            target.id = "target";
            target.onclick = function () {
                removeTarget(this.id);
            };
            target.style.height = Math.floor(values.size) + "px";
            target.style.width = Math.floor(values.size) + "px";
            target.style.top = Math.floor(values.yPos) + "px" ;
            target.style.left = Math.floor(values.xPos ) + "px";

            document.getElementById("targetContainer").appendChild(target);
        }

        function removeTarget(id) {
            var elem = document.getElementById(id);
            elem.parentNode.removeChild(elem);
            generateTarget();
        }
    </script>
    <body onload="generateTarget()">
        <div id="targetContainer" class="target_container">
        </div>
    </body>
</html>