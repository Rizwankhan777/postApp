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
        label{
            text-transform: capitalize;
        }
        img {
    width: 100%;
    height: 450px;
    /* border-radius: 50%; */
    object-fit: cover;
}
button.comment{
    background: transparent;
    border: none;
    outline: none;
    font-weight: bold;
    font-size: 22px;
    cursor: pointer;
    border: 1px solid #000;
    border-radius: 10px;
}
button.share{
    background: transparent;
    border: none;
    outline: none;
    font-weight: bold;
    font-size: 20px;
    cursor: pointer;
    border: 1px solid #000;
    border-radius: 10px;
}
button{
    background: transparent;
    border: none;
    outline: none;
    /* font-weight: bold; */
    font-size: 16px;
    cursor: pointer;
    border: 1px solid #000;
    border-radius: 6px;
}
.user_img {
  width: 80px;
  height: 70px;
  border-radius: 50%;
  object-fit: cover
}

.changeReact {
  color: rgb(4, 255, 0);
}
    </style>
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <h1>Trending Posts</h1>
            @foreach ($posts as $post)
            <img src="{{asset('/uploads/'.$post->image)}}" style="height: 200px;margin-bottom:10px" alt="sdsd">
            @endforeach
        </div>
        <div class="col-md-8 mx-auto">
         <h1 class="py-5">Profile Page <br><span>Welcome <?php echo Auth::user()->name  ?></span></h1>
           
            <form action="{{route('post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="" class="">writing something</label>
                    <textarea type="text" name="message"  class="form-control" id="" cols="30" rows="5"></textarea>
                    <label for="" class="">Image</label>
                    <input type="file" name="image"  class="form-control" id="" cols="30" rows="5" />
                  </div>
                  <button class="btn btn-block btn-primary" type="submit">Post</button>
            </form>

            <div class="data_dislpay">
                
                <div class="row py-5">
                    @foreach ($posts as $post )

                    <div class="col-md-12 pb-4">
                      <div class="d-flex">
                        <img src="{{asset('/uploads/'.$post->getUsers->image)}}" class="user_img" alt="">
                      <h1>  {{$post->getUsers->name}}  </h1>
                      <span>{{$post->created_at->format('Y-m-d') }}</span>
                      </div>
                        <img src="{{asset('/uploads/'.$post->image)}}" alt="sdsd">
                      
                    </div>
                    <div class="col-md-12 pb-4">
                        <h6>{{$post->message}}</h6>
                        <div>
                       
                        {{-- @if ($post->getReaction != '')
                            @dump($post->getReaction )
                        @endif   --}}
                        

                        <button class="reaction {{ ($post->getReaction != '' && $post->getReaction->react_id == 1 ) ? 'changeReact' : ''}} " data-reaction="1" data-post={{$post->id}}><i class="fa-solid fa-thumbs-up"></i></button> 
                       
                        <button class="reaction {{ ($post->getReaction != '' && $post->getReaction->react_id == 2 ) ? 'changeReact' : ''}} " data-reaction="2" data-post={{$post->id}}><i class="fa-solid fa-heart"></i></button> 
                       
                        <button class="reaction  {{ ($post->getReaction != '' && $post->getReaction->react_id == 3 )? 'changeReact' : ''}} " data-reaction="3" data-post={{$post->id}}><i class="fa-solid fa-face-grin-squint-tears"></i></button>
                       
                        <button class="reaction {{ ($post->getReaction != '' && $post->getReaction->react_id == 0 ) ? 'changeReact' : ''}} " data-reaction="0" data-post={{$post->id}}><i class="fa-solid fa-thumbs-down"></i></button>
                        
                        <button class="comment" type="button" data-post="{{$post->id}}" class="btn btn-primary" data-toggle="modal" data-target="#commentModal">Comment</button> <button class="share">Share <i class="fa-solid fa-share"></i></button>
                        </div>
                    </div>
                    <p>Total Comments: {{ $post->getPostComment->count() }}</p>
                    @foreach ($post->getPostComment as $comment)
                        <div class="col-md-12">
                            <h6>{{ $comment->getUsers->name }} <span>{{ $comment->created_at->format('Y-m-d , H:i:s') }}</span></h6>
                            <p>{{ $comment->comment }}</p>
                        </div>
                    @endforeach
                    
                      {{-- @php 
                    //   $comments = App\Models\CommentModel::where('post_id',$post->id)->get();
                    
                     <p> </p>
                      @endphp --}}
                    {{-- <div >
                        
                    </div> --}}
                    @endforeach
                </div>
              
            </div>

        </div>
        <div class="col-md-2">
            <h1>Active Users</h1>
            @foreach ($users as $user)
            <ul>
                <li>{{$user->name}}</li>
            </ul>
            @endforeach
        </div>
    </div>
 </div>

</body>
</html>

<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('comment')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="post_id" class="post_id">
                  <label for="exampleInputEmail1">Comment</label>
                <textarea name="comment" id="" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
  <script>
  
 $('.comment').click(function(){
   var  post_id = $(this).data('post');
   $('.post_id').val(post_id);
   console.log("my post id",post_id);
 });

$('.reaction').click(function(){
  var post_id = $(this).data('post');
  var react_id = $(this).data('reaction');
  var ele = $(this);

  console.log(post_id,react_id);
  $.ajax({
      type:'POST',
      url:'{{route("reaction")}}',
      data:{
        post_id:post_id,
        react_id:react_id,
        "_token": "{{ csrf_token() }}",
      },
      success:function(response) {
        console.log(response)
        $(ele).parent().find('button').removeClass('changeReact');
        ele.addClass('changeReact');
      }
  });
});
</script>