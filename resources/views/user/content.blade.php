<!-- New Arrivals Products -->
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="collection_section layout_padding">
    <div class="container">
        <h1 class="new_text"><strong>New Arrivals Products</strong></h1>
        <p class="consectetur_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
    </div>
</div>
<!-- New Arrivals Products -->


<div class="layout_padding gallery_section">
    
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-4">
                <div class="best_shoes">
                    <h2 class="best_text">{{$product->productname}} </h2>
                    <div class="shoes_icon" style="justify-content:center;align-items:center;display:flex"><img  style="height:200px; width:200px; " src="productimages/{{$product->image}}" alt=""></div>
                    <p class="best_text">{{$product->description}} </p>
                    <div class="star_text">
                        <div class="left_part">
                            <ul>
                                <li>
                                    <form action="{{route('addcart',$product->id)}}" method="post">
                                        @csrf

                                   <div class="input-group mb-3" style="width: 130px">
                                        <span class="input-group-text decrement-btn" data-product-id="{{$product->id}}" style="cursor: pointer">-</span>
                                        <input type="text" class="form-control bg-white text-center" name="quantity" min="1" value="1" data-product-id="{{$product->id}}">
                                        <span class="input-group-text increment-btn" data-product-id="{{$product->id}}"  style="cursor: pointer">+</span>
                                    </div>
                                        
                                        <button class="btn btn-primary">Add To Cart
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </form>
                                    </li>
                                   
                                
                            </ul>
                        </div>
                        <div class="right_part">
                            <div class="shoes_price" style="margin-top: 20px">₹ <span style="color: #ff4e5b;">{{$product->price}}</span></div>
                        </div>
                    </div>
                </div>
                
            </div>
           
            @endforeach
            
            <p style="margin-left:500px;"> {{$products->links()}} </p>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
      // Handle the increment button click event
      $('.increment-btn').click(function() {
        var productId = $(this).data('product-id');
        var quantityInput = $('input[data-product-id="' + productId + '"]');
        var currentValue = parseInt(quantityInput.val());
        quantityInput.val(currentValue + 1);
      });
    
      // Handle the decrement button click event
      $('.decrement-btn').click(function() {
        var productId = $(this).data('product-id');
        var quantityInput = $('input[data-product-id="' + productId + '"]');
        var currentValue = parseInt(quantityInput.val());
        // Check if the current value is already at the minimum value
        if (currentValue > 1) {
          quantityInput.val(currentValue - 1);
        }
      });
    });
    </script>