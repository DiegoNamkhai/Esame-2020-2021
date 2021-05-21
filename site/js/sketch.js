var testo = id;
console.log(testo)
var ffont = 15;
var textLen = ffont*testo.length;
var lunghezza = textLen+ffont/10;
let sketch = function(p) {
  p.setup = function(){
    p.createCanvas(lunghezza, lunghezza);
    //p.background(255);
  }

  p.draw = function(){
    p.stroke("#A5A5A5")
    p.strokeWeight(ffont/10);
    p.fill("#00FF00");
    p.circle(lunghezza/2, lunghezza/2, textLen)
    p.noStroke();
    p.fill(0);
    p.textSize(ffont);
    p.textAlign(p.CENTER, p.CENTER);
    p.text(testo, lunghezza/2, lunghezza/2);
    p.textSize(32);
  }
};

//new p5(sketch, '8');

