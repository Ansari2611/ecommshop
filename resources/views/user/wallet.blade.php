<!DOCTYPE html>
<!---Coding By CoderGirl!--->
<html lang="en">
<head>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--<title> An About Us Page | CoderGirl </title>-->
  <!---Custom Css File!--->

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

      

  <section class="about-us">
    <div class="row " style="width: 800px;margin-left:70%">
        <div class="col-md-4 order-md-2 mb-4">
           
            <ul class="list-group mb-3 sticky-top">
               
                
              
            
            
                

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total  Amount  </span>
                    
                    <strong>₹{{ $showwallet ?? " "}}
                    </strong>
                        
                       
                </li>
            </ul>
           
        </div>
        </div>
    <div class="about">
      <!--<img src="girl.png" class="pic">-->
      <div class="text">
        <h2>My Wallet</h2>
        <h5>EcommShop & <span>Shoes</span></h5>


       

         

        <div class="container">
            <form method="post" action="{{route('addwallet')}}">
                @csrf
                <div class="form-group" >
                
                  <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Amount" name="amount" style="width: 200px">
                 
                </div>
                
                
                <button type="submit" class="btn btn-primary" style="background-color: black">Add Money</button>
              </form>

            
      
      </div>
    </div>
  </section>
</body>
</html>

