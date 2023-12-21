<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\PostModel;
use App\Models\PostReactionModel;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{

    public function admin_login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function register_form(Request $req)
    {
        // $this->validate(request(),[
        //     'name'=>'required',
        //     'email'=>'required|max:255|unique:user',
        //     'password' => 'min:6|required_with:c_password|same:c_password',
        //     'c_password' => 'min:6'
        // ]);
        // dd($req->all());
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $image = $req->image;

         /** Make a new filename with extension */
         $filename = time() . rand(1, 30) . '.' . $image->getClientOriginalExtension();
         //Move Uploaded File
         $destinationPath = 'uploads';
         $image->move(public_path($destinationPath), $filename);
 
         $user->image =  $filename;
         
         /** Insert the data in the database */
        $user->save();
        // dd($req);
        return back()->with('success','Sign Up Successfully');
        // return redirect('login')->with('success','Sign Up Successfully');
       
    }

    public function authentication(Request $req){
        if(!empty($req->email)&&!empty($req->password)){
            $userFind = User::where('email',$req->email)->first();
            if($userFind){
                if(Hash::check($req->password,$userFind->password)){
                    Auth::login($userFind);
                    // dd($req);
                    if(Auth::check()){
                        // if(Auth::user()->user_role == 1){
                            // dd(Auth::user());
                            return redirect(route('posts'));
                            
                        // }
                    }
                    else{
                        return redirect(route('login'));
                    }
                }
                else{
                    return redirect(route('login'))->with('Failed_Password','Password is not correct');
                }
            }
            else{
                return redirect(route('login'))->with('Failed_Email','Email not found');
            }
        }
        else
        {
            return redirect(route('admin.login'))->with('Failed_Empty','please filled required fields');

        }

    }

    function index(){
        $posts = PostModel::with('getUsers')->orderBy('id','desc')->get();
        // dd($posts->toArray());
        $users = User::with('getPosts')->orderBy('id','desc')->get();
        return view('index', compact('posts','users'));
    }


    function reaction(Request $request){
    //    dd($request->all());

    $react  = new PostReactionModel();
    $react->user_id = Auth::user()->id;
    $react->post_id = $request->post_id;
    $react->react_id = $request->react_id;
    $react->save();

    return response()->json(['status' => 'true']);

    }

    function profile(){
        $posts = PostModel::with('getUsers')->orderBy('id','desc')->get();
        $users = User::with('getPosts')->orderBy('id','desc')->get();
        return view('profile', compact('posts','users'));
    }

    function postData(Request $request){
        $this->validate(request(),[
            'message'=>'required',
        ]);
        $post = new PostModel();
        $post->message = $request->message;
        $image = $request->image;
        $post->user_id = Auth::user()->id;

        /** Make a new filename with extension */
        $filename = time() . rand(1, 30) . '.' . $image->getClientOriginalExtension();
        //Move Uploaded File
        $destinationPath = 'uploads';
        $image->move(public_path($destinationPath), $filename);

        /** Insert the data in the database */
        $post->image =  $filename;
        $post->save();
        return back()->with('success','Data Saved');
        // dd($req);
    }

    public function commentData(Request $request){
        $this->validate(request(),[
            'comment'=>'required',
        ]);
        $comment = new CommentModel();
        // dd($request);
        $comment->user_id= Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->post_id= $request->post_id;
        $comment->save();
        return back()->with('success','Data Saved');
    }



    // function getData(){
      
    // }
}
