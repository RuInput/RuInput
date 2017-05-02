/*jshint node:true, unused:false*/

function TargetQueue(screenX, screenY, targetNum) {
    this.screenX = screenX;
    this.screenY = screenY;
    this.targetNum = targetNum;
    this.currentTarget = 0;
    this.targets = [];

    /*
    Populate targets array with targets of random values that vary depending on the screensave.
     */
    this.generateTargets = function() {
        var sizeValue = this.screenX + this.screenY;
        for (var i = 0 ; i < this.targetNum; i++) {
            var tempSize = sizeValue / getRandom(7, 30);
                this.targets.push(
                    {
                        size : tempSize,
                        xPos : getRandom(0, Math.floor(screenX - tempSize)),
                        yPos : getRandom(0, Math.floor(screenY - tempSize)),
                        positionalData : null,
                        timeToClick : null
                    }
                );

                    this.targets[this.targets.length - 1].positionalData = comparePoints(
                        [
                            {
                                key: "x",
                                value: Math.floor(i === 0 ? Math.floor(this.screenX / 2) : this.targets[i - 1].xPos)
                            },
                            {
                                key: "y",
                                value: Math.floor(i === 0 ? Math.floor(this.screenY / 2) : this.targets[i - 1].yPos)
                            }
                        ],
                        [
                            {
                                key: "x",
                                value: Math.floor(Math.floor(this.targets[i].xPos))
                            },
                            {
                                key: "y",
                                value: Math.floor(this.targets[i].yPos)
                            }
                        ]
                    )
        }
    };

    this.dequeueTarget = function() {
        //return this.targets.shift();
        var _tempTarget = this.targets[this.currentTarget];
        this.currentTarget++;
        return _tempTarget;
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
        data.yAxis = "South";
    }
    else if(previousPoint[1].value > currentPoint[1].value) {
        data.yAxis = "North";
    }
    else {
        data.yAxis = "Same";
    }

    return data;
}

function calculateScore(target) {
    var score = target.timeToClick;
    return score;
}

function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}

