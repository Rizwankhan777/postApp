<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
p.price {
    font-weight: bold
}
</style>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 py-5">
            <ul>
                <li><span>My Cart</span><i class="fa-solid fa-cart-shopping"><span class="pcount">1</span></i> </li>
            </ul>
        </div>
        <div class="col-md-12">
            <h1 class="text-center">Add Product</h1>
            <form action="{{route('addProduct')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="" class="">Product Name</label>
                    <input type="text" name="name" class="form-control">
                    <label for="">Product Price</label>
                    <input type="text" name="price" class="form-control">
                    <label for="" class="">Product Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                    <label for="" class="">Product Image</label>
                    <input type="file" name="image"  class="form-control" />
                  </div>
                  <button class="btn btn-block btn-primary" type="submit">Post</button>
            </form>
        </div>
        <div class="col-md-12 py-5">
            <h1 class="text-center">All Products</h1>
        </div>
    </div>
    <div class="row mb-5">
        @foreach ($products as $product)
        <div class="col-md-4 mb-3">
            <div class="prouduct_div">
                <div class="img_div">
                   <a href="{{route('productDetail',['id'=>$product->id])}}"> <img src="{{asset('/uploads/'.$product->image)}}" alt=""></a>
                </div>
                <div class="content">
                    <h4 class="mt-2 mb-3">{{$product->name}}</h4>
                    <p class="mt-2 mb-3 price">Price ${{$product->price}}</p>
                    <p>{{$product->description}}</p>
                    {{-- <div class="actionBtn">
                        <button>Add To Cart</button>
                    </div> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>