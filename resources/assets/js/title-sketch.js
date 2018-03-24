var pg;
var landing;
var speed = 500;

function preload() {
  landing = loadShader('shaders/landingPage.vert', 'shaders/landingPage.frag');
}

function setup() {
  var canvas = createCanvas(windowWidth, windowHeight, WEBGL);
  canvas.parent('title-sketch-holder');
  pg = createGraphics(256, 256);
  shader(landing);

  landing.setUniform('u_resolution', 100, 100);
  landing.setUniform('u_mouse', mouseX, mouseY);
  landing.setUniform('u_time', millis());
}

function draw() {
   background(204, 120);

    landing.setUniform('u_mouse', mouseX, mouseY);
    landing.setUniform('u_time', millis()/speed);
    quad(-1, -1, 1, -1, 1, 1, -1, 1);

    pg.background(175);
    pg.text('hello world', 50, 50);
  }

function windowResized() {
  resizeCanvas(windowWidth, windowHeight);
}
