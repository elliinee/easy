$(document).ready(function(){ 
  // =========================
  // Projects Slider 
  // =========================

  $('.projects__slider').slick({
    slidesToShow: 3,
    speed: 1000,
    arrows: false,
    // touchMove: false,
    infinite: true,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.projects-prev').on('click', function () {
    $('.projects__slider').slick('slickPrev');
  });

  $('.projects-next').on('click', function () {
    $('.projects__slider').slick('slickNext');
  });

  // =========================
  // Partners Slider 
  // =========================

  $('.partners__content__block').slick({
    slidesToShow: 3,
    speed: 1000,
    arrows: false,
    // touchMove: false,
    infinite: true,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.partners-prev').on('click', function () {
    $('.partners__content__block').slick('slickPrev');
  });

  $('.partners-next').on('click', function () {
    $('.partners__content__block').slick('slickNext');
  });

  // =========================
  // Arrow scroll
  // =========================

  $('.header__bottom__block__arrow').click(function(){ 
    $('html, body').animate({scrollTop:$('#main').position().top}, 1000); 
  });
  $('.header__bottom__arrow').click(function(){ 
    $('html, body').animate({scrollTop:$('#main').position().top}, 1000); 
  });

  setTimeout(function() {
    $('.modal-over').fadeOut('slow')
  }, 2000);
});

// =========================
// String
// =========================

function animateMarquee(el, duration) {
  const innerEl = el.querySelector('.marquee__inner');
  const innerWidth = innerEl.offsetWidth;
  const cloneEl = innerEl.cloneNode(true);
  el.appendChild(cloneEl);
  
  let start = performance.now();
  let progress;
  let translateX;

  requestAnimationFrame(function step(now) {
    progress = (now - start) / duration;
 
    if (progress > 1) {
    	progress %= 1;
      start = now;
    }

    translateX = innerWidth * progress;
    
    innerEl.style.transform = `translate3d(-${translateX}px, 0 , 0)`;
    cloneEl.style.transform = `translate3d(-${translateX}px, 0 , 0)`;
    requestAnimationFrame(step);
  });
}


const marquee1 = document.querySelector('#marquee1');
const marquee2 = document.querySelector('#marquee2');
const marquee3 = document.querySelector('#marquee3');

if (marquee1 !== null){
  animateMarquee(marquee1, 50000);
  animateMarquee(marquee2, 70000);
  animateMarquee(marquee3, 50000);
}

// =========================
// projects
// =========================

let projects = document.querySelectorAll('.projects__slider__item');

function showProjectText(){
  this.classList.add('project-active');
}
function hiddenProjectText(){
  this.classList.remove('project-active');
}

for (project of projects){
  if (project !== undefined){
    project.addEventListener('mouseover', showProjectText);
    project.addEventListener('mouseout', hiddenProjectText);
  }
}