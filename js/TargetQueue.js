/*jshint node:true, unused:false*/

function TargetQueue(screenX, screenY, targetNum) {
    this.screenX = screenX;
    this.screenY = screenY;
    this.targetNum = targetNum;
    this.targets = [];

    this.generateTargets = function() {
        var sizeValue = this.screenX + this.screenY;
        for (var i = 0 ; i < this.targetNum ; i++) {
            var tempSize = sizeValue / getRandom(7, 30);
                this.targets.push(
                    {
                        size : tempSize,
                        xPos : getRandom(0, Math.floor(screenX - tempSize)),
                        yPos : getRandom(0, Math.floor(screenY - tempSize)),
                        centerX : Math.floor(screenX / 2)
                    }
                );
        }
    };

    this.dequeueTarget = function() {
        return this.targets.shift();
    };

    this.compareTargets = function() {
    }
}

function getRandom(bottom,top) {
    return Math.floor((Math.random()*top+1)+bottom);
}

/*
getDirection : orderedPair[array of x and y values], orderedPair[array of x and y values] --> Direction[STRING]
Given two arrays containing information LIKE array[{key: x, value: 12321}, {key: y, value: 123213} ]
returns an object representing xDis, yDis from previous point to the current point
 */
function comparePoints(previousPoint, currentPoint) {
    var data =
        {
            yAxis : null,
            xAxis : null,
            xDistance : Math.abs(previousPoint[0].value - currentPoint[0].value),
            yDistance : Math.abs(previousPoint[1].value - currentPoint[1].value)
        };

    if (previousPoint[0].value < currentPoint[0].value) {
        data.xAxis = "East";
    }
    else if(previousPoint[0].value > currentPoint[0].value) {
        data.xAxis = "West";
    }
    else {
        data.xAxis = "Same";
    }

    if (previousPoint[1].value < currentPoint[1].value) {
        data.yAxis = "North";
    }
    else if(previousPoint[1].value > currentPoint[1].value) {
        data.yAxis = "South";
    }
    else {
        data.yAxis = "Same";
    }

    return data;
}
