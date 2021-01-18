<?php

namespace App\Http\Controllers\Author;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\NewAuthorPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Category;
use App\Post;
use App\Tag;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->latest()->get(); //Only Author Post Filter
        return view('author.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all(); 
        return view('author.post.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        DB::beginTransaction();
            $this->validate($request,[
                'title' => 'required',
                'image' => 'required',
                'categories' => 'required',
                'tags' => 'required',
                'body' => 'required',

            ]);

            $image = $request->file('image');
            $slug = Str::slug($request->title);

            if (isset($image)) {
                //Make Unique Name For Image
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            
                if (!Storage::disk('public')->exists('post'))
                {
                    Storage::disk('public')->makeDirectory('post');
                }

                $postImage = Image::make($image)->resize(1600,1066)->save('foo'.$image->getClientOriginalExtension());
                Storage::disk('public')->put('post/'.$imageName,$postImage);
            } else {
                $imageName = "default.png";
            }

            //DB Update
            $post = new Post();
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->slug = $slug;
            $post->image = $imageName;
            $post->body = $request->body;

            if (isset($request->status)) 
            {
                $post->status = true;
            }else 
            {
                $post->status = false;
            }
            $post->is_approved = false;

        try {
            $post->save();

            //Relation
            $post->categories()->attach($request->categories);
            $post->tags()->attach($request->tags);

            DB::commit();

            $users = User::where('role_id','1')->get();
            Notification::send($users, new NewAuthorPost($post));


            Toastr::success('Post Sussessfully Create :)', 'Success');
            return  redirect()->route('author.post.index');
        } catch (\Exception $message) {
            return redirect()->back()->withErrors(['error' => $message->getMessage()]);
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //Auth chack Start
         if($post->user_id !=Auth::id())
        {
            Toastr::error('You Are Not Authorized to Access This Post','Error');
            return redirect()->back();
        }
        //Auth chack End
        return view('author.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
         //Auth chack Start
         if($post->user_id !=Auth::id())
        {
            Toastr::error('You Are Not Authorized to Access This Post','Error');
            return redirect()->back();
        }
        //Auth chack End
        $categories = Category::all();
        $tags = Tag::all(); 
        return view('author.post.edit', compact('post', 'categories','tags'));

        Toastr::success('Post Sussessfully Updated :)', 'Success');
        return  redirect()->route('author.post.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
         //Auth chack Start
         if($post->user_id !=Auth::id())
        {
            Toastr::error('You Are Not Authorized to Access This Post','Error');
            return redirect()->back();
        }
        //Auth chack End
        $this->validate($request,[
            'title' => 'required',
            'image' => 'image',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',

            ]);

        $image = $request->file('image');
        $slug = Str::slug($request->title);

        if (isset($image)) 
        {
            //Make Unique Name For Image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        
            if (!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }
            //Delete Old Post Image
            if (Storage::disk('public')->exists('post/'.$post->image)) 
            {
                Storage::disk('public')->delete('post/'.$post->image);
                
            }

            $postImage = Image::make($image)->resize(1600,1066)->save('foo'.$image->getClientOriginalExtension());
            Storage::disk('public')->put('post/'.$imageName,$postImage);

        }
        else 
        {
            $imageName = $post->image;
        }

        //DB Update
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status)) 
        {
            $post->status = true;
        }else 
        {
            $post->status = false;
        }
        $post->is_approved = false;
        $post->save();

        //Relation
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        Toastr::success('Post Sussessfully Updated :)', 'Success');
        return  redirect()->route('author.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Auth chack Start
         if($post->user_id !=Auth::id())
        {
            Toastr::error('You Are Not Authorized to Access This Post','Error');
            return redirect()->back();
        }
        //Auth chack End

        if (Storage::disk('public')->exists('post/'.$post->image)) 
        {
            Storage::disk('public')->delete('post/'.$post->image);
        }
        //Delete Post With Related Post
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        Toastr::success('Post Sussessfully Deleted :)', 'Success');
        return  redirect()->back();
    }
}
