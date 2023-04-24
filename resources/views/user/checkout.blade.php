<style>.container {
    max-width: 960px;
  }
  
  .lh-condensed { line-height: 1.25; }</style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

  

<div class="container">
    
    <div class="py-5 text-center">

        <a style="margin-right: 1000px" href="{{route('showcart')}}" class="btn btn-success">
            <i class='fas fa-hand-point-left'></i>
    
            Back</a>

            <div class="row " style="width: 700px;margin-left:70%">
                <div class="col-md-4 order-md-2 mb-4">
                   
                    <ul class="list-group mb-3 sticky-top">
                       
                        
                      
                    
                    
                        
        
                        <li class="list-group-item d-flex justify-content-between">
                            <span>My Balance: </span>
                            
                            <strong>₹{{$amount}}
                                </strong>
                               
                        </li>
                    </ul>
                   
                </div>
                </div>

        @if(session()->has('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>



        @endif

        @if(session()->has('alert'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session()->get('alert')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>



        @endif
        
        
        <h2>Checkout form</h2>
       
    </div>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
              
            </h4>
            <ul class="list-group mb-3 sticky-top">
                @php
                $price=0;
                @endphp
                @foreach($cart as $carts)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        
                        <h6 class="my-0">{{$carts->productname}}</h6>
                        <small class="text-muted">{{$carts->description}}</small>
                        <small class="text-muted"><img src="/productimages/{{$carts->image}}" height="100px" width="100px" alt=""></small>
                        <p class="text-muted" style="font-size: 13px">Quantity: {{$carts->quantity}} pcs</p>
                    </div>
                    @php
                    $price=$carts->price*$carts->quantity
                    @endphp
                    <span class="text-muted">₹
                        {{$price}}</span>
                    
                    
                </li>
                @endforeach
               
                
                @php
                $sum = 0;
            @endphp
            
            @foreach ($cart as $carts)
                @php
                    $sum += $carts->price*$carts->quantity;
                    // $total=$sum*$carts->quantity
                @endphp
            @endforeach
                

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total  Price</span>
                    <strong>₹
                        {{$sum}}</strong>
                </li>
            </ul>
           
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form method="post" enctype="multipart/form-data" action="{{route('order')}}">
                @csrf
            
                    <div class="mb-3">
                        <label for="email">Name</label>
                        <input type="text" class="form-control" id="email" value="" name="name">
                        @error('name')
                        <span class="alert-danger"> {{$message}} </span>
                        @enderror
                    </div>

                    
                   
                
               
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="" name="email">
                    @error('email')
                    <span class="alert-danger"> {{$message}} </span>
                    @enderror
                </div>


                 
                <div class="mb-3">
                    <label for="email">Phone No.</label>
                    <input type="number" class="form-control" id="email" value="" name="phone">
                    @error('phone')
                    <span class="alert-danger"> {{$message}} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter Your Address" required="" name="address">
                    @error('address')
                    <span class="alert-danger"> {{$message}} </span>
                    @enderror
                </div>
               
                <div class="row">
                   
                   
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip Code</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required="" name="zipcode">
                        @error('zipcode')
                        <span class="alert-danger"> {{$message}} </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="cash-on-delivery" name="cash-on-delivery">
                    <label class="form-check-label" for="cash-on-delivery">Cash on delivery</label>
                  </div>
                
                
             
               
                
                
               
               
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
            </form>
        </div>
    </div>
    
</div>