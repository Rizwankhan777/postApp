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
<script src="{{asset('/js/script.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
<title>Post</title>
</head>
<body>
    <style>
  
    </style>
 <section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 my-4">
                <div class="checkForm">
                    <h1>Basic Details</h1>
                    <form>
                        
                        <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" >
                              </div>
                           </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input type="text" class="form-control" name="l_name" aria-describedby="emailHelp" >
                                  </div>
                            </div>
                        </div>
                        
                      <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Phone</label>
                          <input type="text" class="form-control" name="phone" >
                        </div>
                       </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Address</label>
                            <input type="text" class="form-control" name="address" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Country</label>
                          <input type="text" class="form-control" name="phone" >
                        </div>
                       </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Pin Code</label>
                            <input type="text" class="form-control" name="address" >
                          </div>
                        </div>
                      </div>
                      
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
            <div class="col-md-4 my-4">
                <div class="order_details">
                    <h1>Order Details</h1>
                    <table>
                      <tbody>
                        <thead>
                          <tr>
                            <td>Name</td>
                          </tr>
                        </thead>
                        @foreach ($cartItems as $item)
                        <tr>
                         <td><h5>{{$item->cartProducts->name}}</h5></td>
                         <td></td>
                         <td></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 </section>
</body>
</html>
