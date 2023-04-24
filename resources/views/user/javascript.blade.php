<script src="user/js/jquery.min.js"></script>
<script src="user/js/popper.min.js"></script>
<script src="user/js/bootstrap.bundle.min.js"></script>
<script src="user/js/jquery-3.0.0.min.js"></script>
<script src="user/js/plugin.js"></script>
<!-- sidebar -->
<script src="user/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="user/js/custom.js"></script>
<!-- javascript --> 
<script src="user/js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
   $(document).ready(function(){
   $(".fancybox").fancybox({
   openEffect: "none",
   closeEffect: "none"
   
   })
  });
   
   
$('#myCarousel').carousel({
      interval: false
  });

  //scroll slides on swipe for touch enabled devices

  $("#myCarousel").on("touchstart", function(event){

      var yClick = event.originalEvent.touches[0].pageY;
      $(this).one("touchmove", function(event){

          var yMove = event.originalEvent.touches[0].pageY;
          if( Math.floor(yClick - yMove) > 1 ){
              $(".carousel").carousel('next');
          }
          else if( Math.floor(yClick - yMove) < -1 ){
              $(".carousel").carousel('prev');
          }
      });
      $(".carousel").on("touchend", function(){
          $(this).off("touchmove");
      });
  });
</script> 