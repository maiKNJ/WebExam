$(".next").on('click', function(){
  var currentImg = $(".active");
  var nextImg = currentImg.next();

  if(nextImg.length){
    currentImg.removeClass('active').css('z-index', -10);
    nextImg.addClass('active').css('z-index', 10);
  }
});

$(".prev").on('click', function(){
  var currentImg = $(".active");
  var prevImage = currentImg.prev();

  if(prevImage.length){
    currentImg.removeClass('active').css('z-index', -10);
    prevImage.addClass('active').css('z-index', 10);
  }
});


















/*var slideIndex = 1;
showSlides();

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n){
  var i;
  var slides = $(".mySlides");
  var dots = $(".dot");
  if(n > slides.length){
    slideIndex = 1;
  }
  if(n < 1){
    slideIndex = slides.length;
  }
  for (i = 0; i<slides.length; i++){
    $(".mySlides").each(function (i){
      $(this).css('display', 'none');
    });
    //$(this, ".mySlides").css('style', 'none');
  }
  for ( i = 0; i < dots.length; i++) {
    $(".dot").each(function (i){
      $(this).attr('dot', 'active');
    });
    //$(this, ".dot").className = $(this, ".dot").className.replace("active");
  }
  slideIndex -= 1;
  $(".mySlides").each(function (slideIndex){
    $(this).css('display', 'block');
  });
  $(".dot").each(function (slideIndex) {
    $(this).addClass('active');
  });
  //slides[slideIndex - 1].css('display', 'block');
  //dots[slideIndex-1].className += "active";
}*/
