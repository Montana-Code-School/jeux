@extends('layouts.landing')
@section('content')

 <div id="title-sketch-holder">
 </div>

 <div id="voronoi-sketch-holder">
   <canvas id="voronoi-sketch"></canvas>
 </div>


 <!-- <script type="text/javascript" src="{{asset('js/voronoi-sketch.js')}}"></script> -->
 <!-- <script type="text/javascript" src="{{asset('js/title-sketch.js')}}"></script> -->
<script type="text/paperscript" canvas="voronoi-sketch">
    var canvas = document.getElementById('voronoi-sketch');
		paper.setup(canvas);

    var start = true;
    var voronoi = new Voronoi();
    var bbox, diagram;
    var sites = generateSites(view.size / 150, false);
    var cells = [];
    var oldSize = view.size;
    var selected = false;
    var rasters, groups = [];
    var top = view.center - [40, 80];
    var bottom = view.center + [40, 80];
    var images = [
      "image1.jpg",
      "image2.jpg",
      "image3.jpg",
      "image4.jpg",
      "image5.jpg",
      "image6.jpg",
      "image7.jpg",
      "image8.jpg",
      "image9.jpg",
      "image10.jpg"
    ];

    function Cell(points, center){
      this.path = new Path();
      this.points = points;
      this.center = center;
      //this.text;

      this.image;
      this.group;

      this.createCell = function(){
        //this.path.fillColor = new Color('black');
        this.path.fillColor =  {
          gradient: {
              stops: ["orange", "red"]
             },
           origin: top,
           destination: bottom
       }
        this.path.closed = true;

        for(var i = 0; i < this.points.length; i++) {
          var point = this.points[i]; //point origin
          var next = this.points[(i + 1) == this.points.length ? 0 : i + 1]; //future point
          var vector = (next - point) / 2; //direction that next point is moving in slope!
          this.path.add({
            point: point + vector,
            handleIn: -vector,
            handleOut: vector
          });
        }
        this.path.scale(0.95);
        this.removeSmallBits();
        // this.text = new PointText(new Point(center));
        // this.text.fillColor = "black";
        // this.text.content = "JEUX";
        // this.text.fontFamily = "Monofett";
        // this.text.fontSize = (-1*this.path.area) / 1000;
        // this.text.justification = 'center';
        // this.text.skew(this.path.bounds.width* (Math.random() * 10), this.path.bounds.height* (Math.random() * 10));
        //this.text.opacity = 0.5;

        //this.text.skew(10);
        //this.bindImage();
      }

      this.updateCell = function(points){
        this.points = points;
        this.path = new Path();

        this.path.fillColor = new Color('black');
        this.path.closed = true;

        for(var i = 0; i < this.points.length; i++) {
          var point = this.points[i]; //point origin
          var next = this.points[(i + 1) == this.points.length ? 0 : i + 1]; //future point
          var vector = (next - point) / 2; //direction that next point is moving in slope!
          this.path.add({
            point: point + vector,
            handleIn: -vector,
            handleOut: vector
          });
        }
        this.path.scale(0.95);
        this.removeSmallBits();
      }

      this.bindImage = function(){
        this.image = new Raster("./images/" + images[Math.floor(Math.random()*images.length)]);
        // this.image = new Raster("./images/image1.jpg");
        this.group = new Group(this.path, this.image);
        this.group.clipped = true;
        this.image.position = this.center;
      }

      this.removeSmallBits = function(){
        var averageLength = this.path.length / this.path.segments.length;
        var min = this.path.length / 50;
        for(var i = this.path.segments.length - 1; i >= 0; i--) {
          var segment = this.path.segments[i];
          var cur = segment.point;
          var nextSegment = segment.next;
          var next = nextSegment.point + nextSegment.handleIn;
          if(cur.getDistance(next) < min) {
            segment.remove();
          }
        }
      }
    }

    function generateSites(size, loose) { //sites = all points
      var points = [];
      var col = view.size / size; //window size height + width
      for(var i = -1; i < size.width + 1; i++) {
        for(var j = -1; j < size.height + 1; j++) {
          var point = new Point(i, j) / new Point(size) * view.size + col / 2;
          if(j % 2)
            point += new Point(col.width / 2, 0);
          if(loose) //loose means no rigid structure
            point += (col / 4) * Point.random() - col / 4;
          points.push(point);
        }
      }
      return points;
    }

    function createDiagram() {
      project.activeLayer.children = [];
      var diagram = voronoi.compute(sites, bbox);
      if(diagram) {
        for(var i = 0, l = sites.length; i < l; i++) {
          var cell = diagram.cells[sites[i].voronoiId]; //???
          if(cell) {
            var halfedges = cell.halfedges, length = halfedges.length;
            if(length > 2) {
              var points = [];
              for(var j = 0; j < length; j++) {
                v = halfedges[j].getEndpoint();
                points.push(new Point(v));
              }
              cells[sites[i].voronoiId] = new Cell(points, sites[i]);
              cells[sites[i].voronoiId].createCell();
            }
          }
        }
      }
    }

    function updateDiagram(){
      project.activeLayer.children = [];
      var diagram = voronoi.compute(sites, bbox);
      if(diagram) {
        for(var i = 0, l = sites.length; i < l; i++) {
          var cell = diagram.cells[sites[i].voronoiId]; //???
          if(cell) {
            var halfedges = cell.halfedges, length = halfedges.length;
            if(length > 2) {
              var points = [];
              for(var j = 0; j < length; j++) {
                v = halfedges[j].getEndpoint();
                points.push(new Point(v));
              }
              cells[sites[i].voronoiId].updateCell(points);
            }
          }
        }
      }
    }
    //------------------------------------------------------------------------------

    function onResize() {
      var margin = 20;
      bbox = {
        xl: margin,
        xr: view.bounds.width - margin,
        yt: margin,
        yb: view.bounds.height - margin
      };
      for(var i = 0, l = sites.length; i < l; i++) {
        sites[i] = sites[i] * view.size / oldSize;
      }
      oldSize = view.size;
      // if(start){
        createDiagram();
        // start = false;
      // }else{
      //   updateDiagram();
      // }
    }

    function onMouseDown(event) {
      sites.push(event.point);
      createDiagram();
    }

    function onMouseMove(event) {
      mousePos = event.point; //mouse goes over a point
      if(event.count === 0) //if mouse goes over a point, push the sites over to make room
        sites.push(event.point);
        sites[sites.length - 1] = event.point;
        createDiagram(); //rerender diagram
    }

    function onKeyDown(event) {
      if(event.key == 'space') {
        selected = !selected;
        createDiagram();
      }
    }
    paper.view.draw();
</script>
@endsection
