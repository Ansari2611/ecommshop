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

   
   
   	<!-- New Arrivals section end -->
   	<!-- contact section start -->
       <div class="collection_text">Contact Us</div>
     
       <div class="layout_padding contact_section">
           <div class="container">
            @if(session()->has('message'))
            <span class="alert-success" style="color:black">
              {{session()->get('message')}}
            </span>
            @endif
               <h1 class="new_text"><strong>Contact Now</strong></h1>
           </div>
           <div class="container-fluid ram">
               <div class="row">
                   <div class="col-md-6">
                       <div class="email_box">
                       <div class="input_main">
                          <div class="container">
                             <form action="{{route('contact')}}" method="post">
                                @csrf
                               <div class="form-group">
                                 <input type="text" class="email-bt" placeholder="Name" name="name">
                               </div>
                               <div class="form-group">
                                 <input type="text" class="email-bt" placeholder="Phone Numbar" name="phone">
                               </div>
                               <div class="form-group">
                                 <input type="text" class="email-bt" placeholder="Email" name="email">
                               </div>
                               
                               <div class="form-group">
                                   <textarea class="massage-bt" placeholder="Message" rows="5" id="comment" name="message"></textarea>
                               </div>
                               <div class="send_btn">
                                <button class="main_bt">Send</button>
                               </div>   
                             </form>   
                          </div> 

                       
                                        
                       </div>
               </div>
                   </div>
                   <div class="col-md-6">
                       <div class="shop_banner">
                           <div class="our_shop">
                               <button class="out_shop_bt">Our Shop</button>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    

   	<!-- contact section end -->
	<!-- section footer start -->
   
    @include('user.footer')

	<!-- section footer end -->
	<div class="copyright">2019 All Rights Reserved. <a href="https://html.design">Free html  Templates</a></div>


      <!-- Javascript files-->
     @include('user.javascript')
   </body>
</html>