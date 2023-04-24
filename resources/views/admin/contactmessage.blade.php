<!DOCTYPE html>
<html lang="en">
  <head>
  
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->

       <!-- partial:partials/_navbar.html -->
    
       @include('admin.header')
        <!-- partial -->
  
       
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

          <div class="container-fluid page-body-wrapper">

            <div class="container" align="center">
                <h1 class="title" style="font-size:30px;margin:10px" >Customer Details</h1>

             <table>
                <tr style="border:2px solid White; background-color:white;color:black">
                    <th style="padding:20px">Name</th>
                    <th style="padding:20px">Phone</th>
                    <th style="padding:20px">Email</th>
                    <th style="padding:20px">Message</th>
                 
                    
        

                @foreach($contact as $contacts)
                <tr   style="border:2px Solid White">
                    <td style="padding:20px">{{$contacts->name}}</td>
                    <td style="padding:20px">{{$contacts->phone}}</td>
                    <td style="padding:20px">{{$contacts->email}}</td>
                    <td style="padding:20px">{{$contacts->message}}</td>
                    
                   
                    </td>
                    
                </tr>

                @endforeach

         
             </div>
             
            </div>
            

           


        </div>
        
        
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.javascript')
    <!-- End custom js for this page -->
  </body>
</html>