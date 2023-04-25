<!DOCTYPE html>
<html lang="en">
   <head>
      {{-- css --}}
      @include('user.css')

      <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

   </head>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- body -->
   <body class="main-layout">
	<!-- header section start -->
    @include('user.header')
	<!-- header section end -->
	<!-- New Arrivals Products -->

    <div class="container my-5" >
      
        <div class="card" >
            <div class="card-header" style="text-align: center;">Show Cart</div>
           
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Remove Cart</th>
                  </tr>
                </thead>
                <tbody>
                  @php $totalPrice = 0; @endphp
                  @foreach($cart as $item)
                  <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->productname }}</td>
                    <td>₹{{ $item->price }}</td>
                    <td><img src="productimages/{{$item->image}}" alt="{{ $item->productname }}" style="width:50px; height:50px;"></td>
                    
                      <td>
                        <form action="{{ route('updatecart', $item->id) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3" style="width: 130px">
                              <span class="input-group-text decrement-btn quantity-btn" data-product-id="{{ $item->id }}"  style="cursor: pointer">-</span>
                                <input type="number" class="form-control bg-white text-center quantity-input" name="quantity" min="1" value="{{ $item->quantity }}" data-product-id="{{ $item->id }}">

                                <span class="input-group-text increment-btn quantity-btn" data-product-id="{{ $item->id }}" style="cursor: pointer">+</span>
                                {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
                            </div>
                      
                    
                    
                </td>
                    <td>
                      <a class="btn btn-danger"href="{{route('deletecart', $item->id)}}" onclick="confirmation(event)" ><i class="fas fa-shopping-cart"></i> Remove</a>
            
                    </td>
                  </tr>
                  @php $totalPrice += $item->price * $item->quantity; @endphp
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3"></td>
                    <td colspan="3" class="fw-bold text-end">Total Price:</td>
                    <td class="fw-bold text-danger" id="totalPrice">₹{{$totalPrice}}</td>

                  </tr> 
                  
                </tfoot>
              </table>
            </div>
            <div class="text-end position-relative">
              
              <div class="position-absolute bottom-5">
                <button type="submit">
                  <a href="{{route('checkout')}}" class="btn btn-warning" >
                    <span class="fw-bold fs-5" >Proceed to Buy</span>
                    <i class="bi bi-arrow-right ms-2 fs-4"></i>
                  </a>
                </button>
                
              </div>
            </div>
          </form>
            
          
        </div>
      </div>
    </div>

      
      


    {{-- @include('user.product') --}}
   	<!-- New Arrivals section end -->
   	<!-- contact section start -->
    
   	<!-- contact section end -->
	<!-- section footer start -->
    @include('user.footer')
	<!-- section footer end -->
	<div class="copyright">2023 All Rights Reserved. <a href="https://html.design">SAHU ROSHAN</a></div>


      <!-- Javascript files-->
      @include('user.javascript')
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script>
        $(document).ready(function() {
          // Handle the increment and decrement button click events
          $('.quantity-btn').click(function() {
            var productId = $(this).data('product-id');
            var quantityInput = $('input[data-product-id="' + productId + '"]');
            var currentValue = parseInt(quantityInput.val());
            if ($(this).hasClass('increment-btn')) {
              quantityInput.val(currentValue + 1);
            } else if ($(this).hasClass('decrement-btn') && currentValue > 1) {
              quantityInput.val(currentValue - 1);
            }
            // Calculate the new total price
            var totalPrice = 0;
            $('.quantity-input').each(function() {
              var quantity = parseInt($(this).val());
              var price = parseFloat($(this).closest('tr').find('td:eq(3)').text().replace('₹',''));
              totalPrice += quantity * price;
            });
            // Update the "Total Price" table cell using Ajax
            $.ajax({
              url: '{{ route('showcart.totalprice') }}',
              type: 'POST',
              data: {
                _token: '{{ csrf_token() }}',
                totalPrice: totalPrice
              },
              success: function(response) {
                $('#totalPrice').text('₹' + response);
              },
              error: function(xhr) {
                console.log(xhr.responseText);
              } 
            });
          });
        });


        
        function confirmation(ev)
        {
          ev.preventDefault();

          var urltoRedirect=ev.currentTarget.getAttribute('href');
          console.log(urltoRedirect)

          swal({
            title:"Are you Sure Want to Remove?",
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