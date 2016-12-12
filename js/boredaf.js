



var snake;
var s = 20;
var randbox;

function setup() {
    var cnv = createCanvas(600, 600);
    $("#restartbutton").bind("click", function(){
        $("#videogame-menu").hide();
        setup();
    });


    var x = (windowWidth - width) / 2;
    var y = (windowHeight - height) / 2;
    cnv.position(x, y);
    background(255, 0, 200);
    snake = new Snake();
    frameRate(20);
    placeBox();
}

function placeBox(){
    var cWidth = floor(width/s);
    var cHeight = floor(height/s);
    var randHeight = floor(random(cHeight));
    var randWidth = floor(random(cWidth));
    randbox = createVector(floor(randWidth), floor(randHeight));
    randbox.mult(s);
}


function draw() {
    background(51);

    snake.update();
    snake.show();

    if(snake.eat(randbox)) placeBox();

    fill(255, 0, 100);
    rect(randbox.x, randbox.y, s, s);
}

function keyPressed() {
    if(keyCode === UP_ARROW && snake.yspeed != 1){
        snake.changeDirection(0, -1);
    }else if(keyCode === DOWN_ARROW && snake.yspeed != -1){
        snake.changeDirection(0, 1);
    }else if(keyCode === LEFT_ARROW && snake.xspeed != 1){
        snake.changeDirection(-1, 0);
    }else if(keyCode === RIGHT_ARROW && snake.xspeed != -1){
        snake.changeDirection(1, 0);
    }
}


function mousePressed(){
    snake.total++;
}

function Snake() {
    this.x = 0;
    this.y = 0;
    this.xspeed = 1;
    this.yspeed = 0;
    this.total = 0;
    this.tail = [];


    this.eat = function(p){
        var d = dist(this.x, this.y, p.x, p.y);
        if(d < 1){
            this.total++;
            return true;
        }
    }

    this.kill = function(){
        if(this.x > width - 11 || this.y > height - 11 || this.x < 0 || this.y < 0){
            this.total = 0;
            this.tail = [];
            $("#videogame-menu").show();
            return;
        }
        for(var i = 0; i < this.tail.length; i++){
            var pos = this.tail[i]
            var d = dist(this.x,this.y, pos.x,pos.y);
            if(d < 1){
                this.total = 0;
                this.tail = [];
                $("#videogame-menu").show();
            }
        }
    }

    this.changeDirection = function(x, y) {
        this.xspeed = x;
        this.yspeed = y;
    }

    this.update = function() {

        if(this.total === this.tail.length){
        for(var i = 0; i < this.tail.length-1; i++){
            this.tail[i] = this.tail[i+1];
        }
    }

        this.tail[this.total - 1] = createVector(this.x,this.y);
        this.x = this.x + (this.xspeed  * s);
        this.y = this.y + (this.yspeed  * s);
        this.kill();

        this.x = constrain(this.x, 0, width- s);
        this.y = constrain(this.y, 0, height- s);

        $("#score").html("Score: " + this.total);
        if(this.total === 0){
            $("#encouragement").html("You Suck");
        }if(this.total > 10){
            $("#encouragement").html("You're still pretty bad");
        }if(this.total > 20){
            $("#encouragement").html("You're okay I guess, but this is probably your 10th time trying");
        }if(this.total > 30){
            $("#encouragement").html("Okay what bug did you find?");
        }if(this.total > 100){
            $("#encouragement").html("You should probably stop and go get a life");

        }



    }

    this.show = function() {
        fill(234);
        for(var i = 0; i < this.total; i++){
            rect(this.tail[i].x, this.tail[i].y, s, s);
        }
        rect(this.x, this.y, s, s);
    }
}
