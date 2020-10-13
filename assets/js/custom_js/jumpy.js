$(document).ready(function(){
  var jumpy = document.querySelector('.jumpy');
  var on = false;

setInterval(function () {
    jumpy.setAttribute('data-animation', (on) ? 'jump' : '');
    on = !on;
}, 1600);
});
