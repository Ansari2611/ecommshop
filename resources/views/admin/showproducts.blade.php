<!DOCTYPE html>
<html lang="en">
  <head>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.css')

    <style>
      #table-row:hover{
        background-color: white;
        color:black;
      }
    </style>
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
                <h1 class="title" style="font-size:30px;margin:10px" >Product Page</h1>

             <table>
                <tr style="border:2px solid White; background-color:white;color:black">
                    <th style="padding:20px">Product Name</th>
                    <th style="padding:20px">Price</th>
                    <th style="padding:20px">Description</th>
                    <th style="padding:20px">Quantity</th>
                    <th style="padding:20px">Image</th>
                    <th style="padding:20px">Action</th>
                </tr>

                @foreach($data as $product)
                <tr   style="border:2px Solid White; " id="table-row">
                    <td style="padding:20px">{{$product->productname}}</td>
                    <td style="padding:20px">₹{{$product->price}}</td>
                    <td style="padding:20px">{{$product->description}}</td>
                    <td style="padding:20px">{{$product->quantity}} Pcs</td>
                    <td  style="padding:20px"><img  height="100px" width="100px" src="productimages/{{$product->image}}" alt=""> </td>
                    <td style="padding:20px">
                        <a href="{{route('editproducts',$product->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{route('deleteproducts',$product->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                    </td>
                    
                </tr>

                @endforeach

             </table>


             


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

    <script>
      function confirmation(ev)
      {
        ev.preventDefault();

        var urltoRedirect=ev.currentTarget.getAttribute('href');
        console.log(urltoRedirect)

        swal({
          title:"Are you Sure Want to Delete?",
          text:"You Wont Be Able to Revert this Action",
          icon:"warning",
          buttons:true,
          dangerMode:true,
        })

        .then((willCancel)=>{

          if(willCancel){
            window.location.href=urltoRedirect;
          }

        });

      }


    </script>
  </body>
</html>