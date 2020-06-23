<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;
use App\User;
use Image;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        //$posts = Post::all();
        //return Post::where('title', 'Web Development')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title', 'desc')->take(1)->get();
        //$posts = Post::orderBy('title', 'desc')->get();

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            $image = $request->file('cover_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('storage/cover_images/'.$filename);
            $img = Image::make($image)->resize(250, 250);
            $img->insert(public_path('images/watermark2.png'), 'center')->save($location);
        }
        
        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->author =$request->input('author');
        $post->body = $request->input('body');
        $post->moreBody = $request->input('moreBody');
        $post->cover_image = $filename;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');

    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        //Check for correct user
        if(auth()->user()->id !== $post->user_id)  
        {
            return redirect('/posts')->with('error','Unauthorized page');
        }
          return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
         // Handle File Upload
        if($request->hasFile('cover_image')){
            $image = $request->file('cover_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('storage/cover_images/'.$filename);
            $img = Image::make($image)->resize(250, 250);
            $img->insert(public_path('images/watermark2.png'), 'center')->save($location);
        }
        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->author =$request->input('author');
        $post->body  = $request->input('body');
        $post->moreBody = $request->input('moreBody');
        $post->user_id = auth()->user()->id;
        if($request->hasFile('cover_image')){
            $post->cover_image = $filename;
        $post->save();
        }

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        if($post->cover_image != 'noimage.jpg'){
            //Delete Image
        Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
    public function posts()
    {
        return response()->json(Post::get(),200);
    }
    public function postsByID($id)
    {
        $post = Post::find($id);
        if(is_null($post))
        {
            return response()->json(["message" => "Record not found!"],404);
        }
        return response()->json(Post::find($id),200);
    }
    public function postsSave(Request $request)
    {
        $rules = [
            'title' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fais())
        {
            return response()->json($validator->errors(),400);
        }
        $post = Post::create($request->all());
        return response()->json($post,201);
    }
    public function postsUpdate(Request $request, $id)
    {
        $post = Post::find($id);
        if(is_null($post))
        {
            return response()->json(["message" => "Record not found!"],404);
        }
        $post->update($request->all());
        return response()->json($post,200);
    }
    public function postsDelete(Request $request, $id)
    {
        $post = Post::find($id);
        if(is_null($post))
        {
            return response()->json(["message" => "Record not found!"],404);
        }
        $post->delete();
        return response()->json(null,204);
    }
}
