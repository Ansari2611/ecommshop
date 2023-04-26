<!DOCTYPE html>
<html lang="en">
   <head>
 
    @include('user.css')

   </head>
   <!-- body -->
   <body class="main-layout">
	<!-- header section start -->

    @include('user.header')

	<!-- header section end -->
    
    
	
	<!-- New Arrivals section start -->

    @include('user.content')
    
   
   	<!-- New Arrivals section end -->
   	<!-- contact section start -->
  
    {{-- @include('user.csection') --}}

   	<!-- contact section end -->
	<!-- section footer start -->
   
    @include('user.footer')

	<!-- section footer end -->
	<div class="copyright">2019 All Rights Reserved. <a href="https://html.design">Free html  Templates</a></div>


      <!-- Javascript files-->
     @include('user.javascript')
   </body>
</html>