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
    <title>Post</title>
</head>
<style>
.profile_div img {
    border-radius: 50%;
    widows: 50px;
    width: 150px;
    height: 145px;
    border: 2px solid #000;
    padding: 3px;
}
    .profile_div{
        display: flex;
        gap: 10px;
        align-items: flex-end
    }
    .profile_div h1 {
        text-transform: uppercase
    }
 img.user_img {
    border-radius: 50%;
    widows: 50px;
    width: 50px;
    height: 45px;
    border: 2px solid #000;
    padding: 3px;
    margin-bottom: 10px
}
 img.post_img {

    width: 100%;
    height: 245px;
    border: 2px solid #000;
    object-fit: cover
 
}
</style>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            {{-- @foreach ($users as $user) --}}
          <h1 class="text-center">User Profile</h1>
            <div class="profile_div">
                
                <img src="{{asset('/uploads/'.Auth::user()->image)}}" alt=""> 
                <h1>HEllo My Name is <?php echo Auth::user()->name  ?></h1>
                {{-- <img src="{{asset('/uploads/'.$user->image)}}" style="height: 20px;width:20px; margin-bottom:10px" alt="">
                <h5>{{$user->name}}</h5> --}}
            </div>
            
            {{-- @endforeach --}}
        </div>

        <div class="col-md-12">
            @foreach (Auth::user()->getPosts as $post)
          <div class="d-flex align-items-center gap-2 ">
            <img class="user_img " src="{{asset('/uploads/'.Auth::user()->image)}}" alt=""> 
            <h5>{{Auth::user()->name}}</h5>
          </div>
          <img class="post_img mb-3" src="{{asset('/uploads/'.$post->image)}}" alt=""> 
           <p>{{$post->message}}</p>
                {{-- {{$user->->message}} --}}
            @endforeach
        </div>
    </div>
</div>
</body>
</html>