  <script type="text/javascript">
  var element = $('.tab-container li');
  var slider = $('.tab-container');
  var sliderWrapper = $('.wrapper');
  var totalWidth = sliderWrapper.innerWidth();
  var elementWidth = element.outerWidth();
  var sliderWidth = 0;
  var positionSlideX = slider.position().left;
  var newPositionSlideX = 0;

  sliderWrapper.append('<span class="prev-slide"><</span><span class="next-slide">></span>');

  element.each(function(){
  sliderWidth = sliderWidth + $(this).outerWidth() + 1;
  });

  slider.css({
    'width': sliderWidth
  });

  $('.next-slide').click(function(){
    if(newPositionSlideX>(totalWidth-sliderWidth)){
      newPositionSlideX = newPositionSlideX - elementWidth;
      slider.css({
        'left' : newPositionSlideX
     }, check());
    };
  });

  $('.prev-slide').click(function(){
    if(newPositionSlideX>=-sliderWidth){
      newPositionSlideX = newPositionSlideX + elementWidth;
      slider.css({
        'left' : newPositionSlideX
     }, check());
    };
  });

  function check() {;
    if( sliderWidth >= totalWidth && newPositionSlideX > (totalWidth-sliderWidth)){
       $('.next-slide').css({
        'right' : 0
      });
    } else {
       $('.next-slide').css({
        'right' : -$(this).width()
      });
    };

    if( newPositionSlideX < 0){
       $('.prev-slide').css({
        'left' : 0
      });
    } else {
      $('.prev-slide').css({
        'left' : -$(this).width()
      });
    };
  };

$(window).resize(function(){
  totalWidth = sliderWrapper.innerWidth();
  check();
});
check();
</script>

  </body>
</html>