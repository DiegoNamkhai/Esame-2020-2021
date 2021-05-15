let sketch = function(p) {
  p.time;
  p.wait = 1000; // change this to change the 'ticking'
  p.c;
  p.setup = function(){
    p.createCanvas(200, 200);
    p.time = p.millis();
    p.c = p.color(255); 
  }

  p.draw = function(){
    p.background(p.c);
    if ((p.millis() - p.time) >= p.wait) {
      
      p.c = p.color(p.random(255), p.random(255), p.random(255)) //if it is, change the background color
      p.time = p.millis(); //also update the stored time
    }
    p.text("Milliseconds \nrunning: \n" + p.millis(), 5, 40);
  }
};

//new p5(sketch, '8');

