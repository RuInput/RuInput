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
                    yPos : getRandom(0, Math.floor(screenY - tempSize))
                }
            );
        }
    };

    this.dequeueTarget = function() {
        return this.targets.shift();
    };
}

function getRandom(bottom,top) {
    return Math.floor((Math.random()*top+1)+bottom);
}

