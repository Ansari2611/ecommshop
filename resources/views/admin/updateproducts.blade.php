<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
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
                

                @if(session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert">x</button>

                {{session()->get('message')}}

            </div>

                @endif

                <section class=" bg-image"
                style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
                <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                  <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                      <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px; background-color:white;color:black">
                          <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5" style="font-size: 30px">Edit Products</h2>
              
                            <form  action="" method="post" enctype="multipart/form-data">
                              @csrf
              
                              <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example1cg">Product Name</label>
                                <input type="text" id="form3Example1cg" class="form-control form-control-lg" style="color:white;background-color:black" name="productname" required value="{{$data->productname}}"/>
                              </div>
              
                              <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3cg">Price</label>
                                <input type="number" id="form3Example3cg" class="form-control form-control-lg" style="color:white;background-color:black" name="price" required value="{{$data->price}}"/>
                              </div>
              
                              <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4cg">Description</label>
                                <input type="text" id="form3Example4cg" class="form-control form-control-lg" style="color:white;background-color:black" name="description" required value="{{$data->description}}"/>
                              </div>
              
                              <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4cdg">Quantity</label>
                                <input type="number" id="form3Example4cdg" class="form-control form-control-lg" style="color:white;background-color:black" name="quantity" required value="{{$data->quantity}}"/>
                              </div>
              
                              <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4cdg">Old Image</label>
                                <img src="productimages/{{$data->image}}" alt="" height="120px" width="120px">
                              </div>

                              <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4cdg">Change Image</label>
                                <input type="file" id="form3Example4cdg" class="form-control form-control-lg" style="color:white;background-color:black" name="image"/>
                              </div>
              
                              
              
                              <div class="d-flex justify-content-center">
                                <input type="submit" value="Submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" style="background-color:black">
                              </div>
              
                              
                            </form>
              
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>


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