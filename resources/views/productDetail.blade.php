<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <script src="{{asset('/js/script.js')}}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
<title>Post</title>
</head>
<style>
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




.qty-container{
  display: flex;
  align-items: center;

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

</style>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-12 py-5">
            <ul>
                <li><a href="{{route('cartListing')}}"><span>My Cart</span><i class="fa-solid fa-cart-shopping"><span class="pcount">0</span></i></a> </li>
            </ul>
        </div>
    </div>
    <div class="card product_data">
    <div class="row mb-5">
    
        <div class="col-md-4 mb-3">
            <div class="prouduct_div">
                <div class="img_div">
                    <img src="{{asset('/uploads/'.$products->image)}}" alt="">
                </div>
           
            </div>
        </div>
        <div class="col-md-6">
            <div class="content">
                <h4 class="mt-2 mb-3">{{$products->name}}</h4>
                <p>{{$products->description}}</p>
                <h4 class="mt-2 mb-3">${{$products->price}}</h4>
                {{-- <h4>Product Name</h4> --}}
               <div class="mb-3">
                <input type="hidden" value="{{$products->id}}" class="prod_id">
                <div class="qty-container">
                    <button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
                    {{-- <input class="form-control" type="hidden" value="{{$item->id}}" class="product_id" name=""> --}}
                    <input type="number" name="quantity" class="product_qty input-qty" value="1" placeholder="Quantity">
                    <button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
                </div>
                
               </div>
                <div class="actionBtn">
                    <button class="cartBtn">Add To Cart</button>
                </div>
            </div>
        </div>
       </div>
    </div>
</div>
<script>

    $(document).ready(function(){
        // console.log('asd');
    })
$('.cartBtn').click(function(){
    
var product_id = $(this).closest('.product_data').find('.prod_id').val();
var product_qty = $(this).closest('.product_data').find('.product_qty').val();
console.log(product_id,product_qty);
var cartCount = $('.pcount').text();
var totalCount =  parseInt(cartCount) + parseInt(product_qty)
   console.log(totalCount);
$.ajax({
    type: "POST",
    url: "{{route('addToCart')}}",
    data: {
        'product_id' : product_id,
         'product_qty' : product_qty,
         "_token": "{{ csrf_token() }}",
    }, 
    success: function (response) {
        // alert(response.data)
        if(response.status){
            // console.log(typeof cartCount);
            // console.log(typeof totalCount);
            // $('.pcount').html();
            $('.pcount').html(totalCount);
            alert(response.message)
        }
    }
});
})

  
var buttonPlus  = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

 buttonPlus.click(function() {

  var $n = $(this).parent(".qty-container").find(".input-qty");
   var amount =  $n.val(Number($n.val())+1 );
//   $n.val(parseInt($n.val())+1);

  console.log(typeof $n);
});

buttonMinus.click(function() {
  var $n = $(this).parent(".qty-container").find(".input-qty");
  var amount = Number($n.val());
  if (amount > 0) {
    $n.val(amount-1);
  }
});
</script>
</body>
</html>