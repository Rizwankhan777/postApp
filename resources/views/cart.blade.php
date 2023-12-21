<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="{{asset('/js/script.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
<title>Post</title>
</head>
<style>



.qty-container{
  display: flex;
  align-items: center;
  justify-content: center;
  /* border: 2px solid #000f63; */
  /* border-radius: 1px; */
}
.qty-container .input-qty {
    text-align: center;
    padding: 6px 10px;
    border: 1px solid #d1d1d1;
    max-width: 70px;
    margin: 0 5px;
    height: 33px;
    border-radius: 18px;
}
.qty-container .qty-btn-minus,
.qty-container .qty-btn-plus{
  border: 2px solid #000f63;
  padding: 10px 13px;
  font-size: 10px;
  height: 38px;
  width: 38px;
  transition: 0.3s;
  border-radius: 30px;
}
.qty-container .qty-btn-plus{
  margin-left: -1px;
}
.qty-container .qty-btn-minus{
  /* margin-right: -1px; */
}
.qty-container i{
    padding: 0;
}




    .prouduct_div img{
        width: 100%;
        height: 300px;
    }
    .content p{
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
    .actionBtn button{
        background: #05445E;
        color:#fff;
        border-radius: 4px;
        outline: none;
        padding: 10px 20px;
        border: none;
        font-weight: bold;

}
ul li{
    list-style: none;
    position: relative;
    text-align: right
}
ul li i{
  cursor: pointer;
    position: relative;
}
ul li span.pcount {
    position: absolute;
    top: -9px;
    right: -7px;
    background: #000;
    color: #fff;
    font-size: 12px;
    padding: 2px 4px;
    border-radius: 50%;
}
.cart_product button {
    background: #e00a02;
    border: none;
    outline: none;
    color: #fff;
    cursor: pointer;
}
.cart_product img{
    width: 70px;
    height: 70px;

}

.actionBtn a {
    padding: 8px 30px;
    background-color: #05445E;
    color: #fff;
    font-size: 18px;
    border: 1px solid #fff;
    text-decoration: none
}
</style>
<body>
<div class="container">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<form action="{{route('updateCart')}}" method="POST">   
    @csrf
     <div class="row ">
        <div class="col-md-12 py-5">
            <ul>
                <li><span>My Cart</span><i class="fa-solid fa-cart-shopping"><span class="pcount">0</span></i> </li>
            </ul>
        </div>
    </div>
    @php
        $total = 0;
    @endphp
    @foreach ($cartItems as $item)
    <div class="cart_product">
        <div class="row align-items-center mb-3">
            <div class="col-md-4">
                <img src="{{asset('/uploads/'.$item->cartProducts->image)}}" alt="">
                {{-- @dump($item->product_id) --}}
            </div>
            <div class="col-md-3">
                <div class="content">
                    <h4>{{$item->cartProducts->name}}</h4>
                </div>
            </div>
            <div class="col-md-3">
                {{-- <label for="">Qty</label> --}}
            
                {{-- <input type="number"  placeholder="Quantity"> --}}
                 
                <div class="d-flex justify-content-between">
                    <h4 class="amount">${{$item->cartProducts->price}}</h4> 
                    {{-- <button><i class="fa-solid fa-trash"></i></button> --}}
                    <div class="qty-container">
                    <button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
                    <input class="form-control" type="hidden"  value="{{$item->product_id}}" class="product_id" name="product_id[]">
                    <input type="text" value="{{$item->product_Qty}}" min="0" max="10" class=" input-qty"  name="product_qty[]"/>
                    <button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
                </div>
                </div>

            </div>
            <div class="col-md-2">
                <button class="deleteCartItem" data-id="{{$item->id}}"><i class="fa-solid fa-xmark"></i> Remove</button>
            </div>
         
            @php $total += $item->cartProducts->price * $item->product_Qty;  @endphp
        </div>
      
    </div>
    @endforeach
    <div class="row">
        <div class="col-md-8">
            <div class="text-right">
                <h3>Total Price: ${{ $total }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="actionBtn">
                <a  href="{{route('checkout')}}">Proceed To Checkout</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="actionBtn mt-4">
                <button type="submit" href="javscript::" class="cartUpdate" data-cart="{{$item->id}}">Cart Updated</button>
            </div>
        </div>
    </div>
</form>


</div>

</body>
<script>
       $('.deleteCartItem').click(function (e) { 
        e.preventDefault();

    var product_id = $(this).data('id');
    var ele = $(this);
    console.log(product_id);

    $.ajax({
        type: "POST",
        url: "{{route('deleteCartItem')}}",
        data: {
            'product_id' : product_id,
            "_token": "{{ csrf_token() }}",
        },
        success: function (response) {
            (response.status);
            alert(response.message);
            ele.parent().parent().parent().remove();
        }
    });
        
    });
// update cart




      
var buttonPlus  = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");
// var price = $('.amount').text();
 buttonPlus.click(function() {

  var $n = $(this).parent(".qty-container").find(".input-qty");
   var amount =  $n.val(Number($n.val())+1 );
//    TotalPrice = amount * price;
//    price.text(TotalPrice);
//   $n.val(parseInt($n.val())+1);

  console.log(typeof $n);
});

buttonMinus.click(function() {
  var $n = $(this).parent(".qty-container").find(".input-qty");
  var amount = Number($n.val());
  if (amount > 1) {
    $n.val(amount-1);
  }
});
</script>
</html>