<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.about-us{
  
  width: 100%;
  padding: 90px 0;
  background: #ddd;
}
.pic{
  height: auto;
  width:  302px;
}
.about{
  width: 1130px;
  max-width: 85%;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-around;
}
.text{
  width: 540px;
}
.text h2{
  font-size: 50px;
  font-weight: 600;
  margin-bottom: 10px;

}
.text h5{
  font-size: 22px;
  font-weight: 500;
  margin-bottom: 20px;
}
span{
  color: #4070f4;
}
.text p{
  font-size: 18px;
  line-height: 25px;
  letter-spacing: 1px;
}
.data{
  margin-top: 30px;
}
.hire{
  font-size: 18px;
  background: #4070f4;
  color: #fff;
  text-decoration: none;
  border: none;
  padding: 8px 25px;
  border-radius: 6px;
  transition: 0.5s;
}
.hire:hover{
  background: #000;
  border: 1px solid #4070f4;
}

  </style>


<style>
    .gradient-custom {
/* fallback for old browsers */
background: #cd9cf2;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1))
}
</style>
    <title>My Order</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand " href="{{route('home')}}" style="margin-left: 35%">Home</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('about')}}" style="margin-top:10px">About Us <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{route('contact')}}" style="margin-top:10px">Contact Us</a>
            </li>

            

            <li class="nav-item active">
                <a class="nav-link" href="{{route('showcart')}}" style="margin-top:10px">
                    <i class="fas fa-shopping-cart"></i>
                    My Cart</a>
              </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('showwallet')}}" style="margin-top:10px">
                    <i class='fas fa-wallet'></i>
                    My Wallet</a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="{{route('myorders')}}" style="margin-top:10px">
                    <i class='fas fa-shopping-bag'></i>
                    My Orders</a>
              </li>

            @if (Route::has('login'))
                    
            @auth
            <x-app-layout>
            </x-app-layout>
            @else
                <a class="nav-item nav-link" href="{{ route('login') }}" >Log in</a>

                @if (Route::has('register'))
                    <a class="nav-item nav-link" href="{{ route('register') }}" >Register</a>
                @endif
            @endauth
       
    @endif
            
            
          </ul>
        </div>
      </nav>
      <section class="h-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-10 col-xl-8">
              <div class="card" style="border-radius: 10px;">
                <div class="card-header px-4 py-5">
                    @if(session()->has('message'))
                  <h5 class="text-muted mb-0">{{session()->get('message')}}</h5>
                  @endif
                </div>
                <div class="card-body p-4">
                 


                  @foreach($myorders as $myorder)
                  <div class="card shadow-0 border mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-2">
                          <img src="productimages/{{$myorder->image}}"
                            class="img-fluid" alt="Phone">
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0">{{$myorder->productname}}</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">{{$myorder->description}}</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">Qty: {{$myorder->quantity}} pcs</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">₹{{$myorder->price}}/Pcs</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                            <p class="text-muted mb-0 small">{{$myorder->status}}</p>
                          </div>
                        
                      </div>
                      <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                      <div class="row d-flex align-items-center">
                        <div class="col-md-5">
                          <p class="text-muted mb-0 small"><a href="{{route('deleteorders',$myorder->id)}}" class="btn btn-info">Cancel Order</a></p>
                        </div>
                       
                    </div>
                  </div>
                  @endforeach


      
                  
      
                 
      
                  
      
                 
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>