var x, y; // the current position of the turtle
var currentangle = 0;
var step = 25;
var angle = 55;

var thestring = 'A';
var numloops = 5;
var therules = [];
therules[0] = ['A', '-BF+AFA+FB-'];
therules[1] = ['B', '+AF-BFB-FA+'];

var whereinstring = 0; // where in the L-system are we?

function setup() {
  var canvas = createCanvas(windowWidth, windowHeight);
  canvas.parent("sketch-holder");
  background(229, 180, 82);
  stroke(0, 0, 0, 255);

  // start the x and y position at lower-left corner
  x = 0;
  y = height-1;

  // COMPUTE THE L-SYSTEM
  for (var i = 0; i < numloops; i++) {
    thestring = lindenmayer(thestring);
  }
}

function windowResized() {
  resizeCanvas(windowWidth, windowHeight);
}

function draw() {

  drawIt(thestring[whereinstring]);

  whereinstring++;
  if (whereinstring > thestring.length-1) whereinstring = 0;
}

// interpret an L-system
function lindenmayer(s) {
  var outputstring = '';

  for (var i = 0; i < s.length; i++) {
    var ismatch = 0;
    for (var j = 0; j < therules.length; j++) {
      if (s[i] == therules[j][0])  {
        outputstring += therules[j][1];
        ismatch = 1;
        break;
      }
    }

    if (ismatch == 0) outputstring+= s[i];
  }

  return outputstring;
}

function drawIt(k) {

 if (k=='F') {

   var x1 = x + step*cos(radians(currentangle));
   var y1 = y + step*sin(radians(currentangle));
   line(x, y, x1, y1);

   x = x1;
   y = y1;
 } else if (k == '+') {
   currentangle += angle;
 } else if (k == '-') {
   currentangle -= angle;
 }

 var r = random(100, 255);
 var g = random(0, 200);
 var b = random(0, 0);
 var a = random(0, 255);

 var radius = 0;
 radius += random(0, 20);
 radius += random(0, 20);
 radius += random(0, 40);
 radius = radius/3;

 fill(r, g, b, a);
 ellipse(x, y, radius, radius);
}
