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
                    <th style="padding:20px">Order id</th>
                    <th style="padding:20px">Name</th>
                    <th style="padding:20px">Email</th>
                    <th style="padding:20px">Phone</th>
                    <th style="padding:20px">Address</th>
                    <th style="padding:20px">Zipcode</th>
                    <th style="padding:20px">TotalPrice</th>
                    <th style="padding:20px">Cash on Delivery</th>
                    
        

                @foreach($order as $orders)
                <tr   style="border:2px Solid White">
                    <td style="padding:20px">{{$orders->id}}</td>
                    <td style="padding:20px">{{$orders->name}}</td>
                    <td style="padding:20px">{{$orders->email}}</td>
                    <td style="padding:20px">{{$orders->phone}}</td>
                    <td style="padding:20px">{{$orders->address}} </td>
                    <td style="padding:20px">{{$orders->zipcode}} </td>
                    <td style="padding:20px">₹{{$orders->totalprice}} </td>
                    <td style="padding:20px">{{$orders->cash_on_delivery ? 'yes' : 'No'}} </td>
                    
                   
                    </td>
                    
                </tr>

                @endforeach

             </table>

             <div class="container" align="center" style="margin-top: 100px">
                <h1 class="title" style="font-size:30px;margin:10px" >Customer Order Products</h1>
             <table>
                
                <tr style="border:2px solid White; background-color:white;color:black">
                  
                    <th style="padding:20px">Order Id</th>
                    <th style="padding:20px">Product Name</th>
                    <th style="padding:20px">Price</th>
                    <th style="padding:20px">Quantity</th>
                    <th style="padding:20px">Description</th>
                    <th style="padding:20px">Image</th>
                    <th style="padding:20px">Status</th>
                    <th style="padding:20px">Action</th>
        

                @foreach($orderitem as $orders)
                <tr   style="border:2px Solid White">
                    
                    <td style="padding:20px">{{$orders->order_id}}</td>
                    <td style="padding:20px">{{$orders->productname}}</td>
                    <td style="padding:20px">₹{{$orders->price}} </td>
                    <td style="padding:20px">{{$orders->quantity}} </td>
                    <td style="padding:20px">{{$orders->description}} </td>
                    <td style="padding:20px"><img  height="100px" width="100px" src="productimages/{{$orders->image}}" alt=""> </td>
                    
                    
                    <td style="padding:20px">{{$orders->status}} </td>
                    <td style="padding:20px">
                        <a href="{{url('updatestatus',$orders->id)}}" class="btn btn-success">Deliver Order</a>
                    </td>
                    
                </tr>

                @endforeach

             </table>
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