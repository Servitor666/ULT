var i = 0;
var txt = 'Način života, skup ideja i vrednosti koji spaja grupu individua.';
var speed = 65;

setTimeout(function typeWriter() {
  if (i < txt.length) {
    document.getElementById("typewrite").innerHTML = document.getElementById("typewrite").innerHTML.substr(0, document.getElementById("typewrite").innerHTML.length-1);
    document.getElementById("typewrite").innerHTML += txt.charAt(i) + '_';
    i++;
      if(i == txt.length)
          {
              document.getElementById("typewrite").innerHTML = document.getElementById("typewrite").innerHTML.substr(0, document.getElementById("typewrite").innerHTML.length-1);
          }
    setTimeout(typeWriter, speed);
  }
}, 1500);
window.onload = typeWriter;