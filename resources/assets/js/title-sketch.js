// var message = "B  CUBED",
// font,
// bounds,
// fontsize = 60,
// x, y;

var pg;

var landing;
var speed = 500;

function preload() {
  // font = loadFont('assets/Monofett regular.ttf');
  landing = loadShader('shaders/landingPage.vert', 'shaders/landingPage.frag');
}

function setup() {
  var canvas = createCanvas(windowWidth, windowHeight, WEBGL);
  canvas.parent('title-sketch-holder');
  // set up the font
  // textFont(font);
  // textSize(fontsize);
  pg = createGraphics(256, 256);
  //get the width and height of the text so we can center it initially
  // bounds = font.textBounds(message, 0, 0, fontsize);
  // x = width / 2 - bounds.w / 2;
  // y = height / 2 - bounds.h / 2;
  shader(landing);

  landing.setUniform('u_resolution', 100, 100);
  landing.setUniform('u_mouse', mouseX, mouseY);
  landing.setUniform('u_time', millis());
}

function draw() {
   background(204, 120);
  //
  // //write the text in black and get its bounding box
  // fill(15);
  // stroke(255, 255, 180);
  // text(message, x, y);
  // bounds = font.textBounds(message,x,y,fontsize);
  //
  // // check if the mouse is inside the bounding box and tickle if so
  // if ( mouseX >= bounds.x && mouseX <= bounds.x + bounds.w &&
  //   mouseY >= bounds.y && mouseY <= bounds.y + bounds.h) {
  //     x += random(-7, 10);
  //     y += random(-7, 10);
  //   }
  //
  //   if (mouseIsPressed) {
  //     noFill(200);
  //     noStroke();
  //     colorMode(RGB, 100);
  //     for (var i = 0; i < 100; i++) {
  //       for (var j = 0; j < 100; j++) {
  //         stroke(i, j, 0);
  //         point(i, j);
  //       }
  //     }
  //   }

    landing.setUniform('u_mouse', mouseX, mouseY);
    landing.setUniform('u_time', millis()/speed);
    quad(-1, -1, 1, -1, 1, 1, -1, 1);

    pg.background(175);
    pg.text('hello world', 50, 50);



  }

  function windowResized() {
  resizeCanvas(windowWidth, windowHeight);
}
