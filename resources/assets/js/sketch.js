var sketch = function(p) {
  p.x;
  p.y;
  p.currentangle = 0;
  p.step = 40;
  p.angle = 100;

  p.thestring = 'A';
  p.numloops = 5;
  p.therules = [];
  p.therules[0] = ['A', '-BF+AFA+FB-'];
  p.therules[1] = ['B', '+AF-BFB-FA+'];

  p.whereinstring = 0;

  p.setup = function(){
    p.createCanvas(100, 100);
    p.background(255);
    p.stroke(0, 0, 0, 100);

    p.x = 0;
    p.y = p.height-1;

    for (p.i = 0; p.i < p.numloops; p.i++) {
      p.thestring = p.lindenmayer(p.thestring);
    }
  }

  p.draw = function(){
    p.drawIt(p.thestring[p.whereinstring]);

    p.whereinstring++;
    if (p.whereinstring > p.thestring.length-1) p.whereinstring = 0;
  }

  p.lindenmayer = function(){
   p.outputstring = '';

  for (p.i = 0; p.i < s.length; p.i++) {
    p.ismatch = 0;
    for (p.j = 0; p.j < p.therules.length; p.j++) {
      if (s[p.i] == p.therules[p.j][0])  {
        p.outputstring += p.therules[p.j][1];
        p.ismatch = 1;
        break;
      }
    }

    if (p.ismatch == 0) p.outputstring+= s[p.i];
    }

    return p.outputstring;
  }

  p.drawIt = function(){
   if (p.k=='F') { // draw forward
     // polar to cartesian based on step and currentangle:
     p.x1 = p.x + step*cos(radians(p.currentangle));
     p.y1 = p.y + step*sin(radians(p.currentangle));
     line(p.x, p.y, p.x1, p.y1); // connect the old and the new

     // update the turtle's position:
     p.x = p.x1;
     p.y = p.y1;
   } else if (p.k == '+') {
     p.currentangle += p.angle; // turn left
   } else if (p.k == '-') {
     p.currentangle -= p.angle; // turn right
   }

    p.r = random(0, 255);
    p.g = random(0, 200);
    p.b = random(0, 255);
    p.a = random(0, 100);

    p.radius = 0;
    p.radius += random(0, 15);
    p.radius += random(0, 15);
    p.radius += random(0, 15);
    p.radius = p.radius/3;

    // draw the stuff:
    p.fill(p.r, p.g, p.b, p.a);
    p.ellipse(p.x, p.y, p.radius, p.radius);
  }

};

var myp5 = new p5(sketch);
