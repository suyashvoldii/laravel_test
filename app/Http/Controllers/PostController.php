<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use  Illuminate\Http\Response;
use \App\Http\Requests\storepostrequest ;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $post = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.id','users.name', 'posts.title', 'posts.description')
        ->get();

        return view('blog.index',compact('post'));
        

        // $post = post::all();
        // return view('blog.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /**
 * Configure the validator instance.
 *
 * @param  \Illuminate\Validation\Validator  $validator
 * @return void
 */


    public function store(storepostrequest $request)
    {

       
        // $validated = $request->validated();
        $validated = $request->safe()->only(['title', 'description']);

        $post = new Post;
        $post->user_id = Auth::id();
        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->status = $request->input('status ') == true ? '1':'0';
        $post->save();
        return redirect()->back()->with('status','Post created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        return view('blog.edit',compact('post'));
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

  

        $post = post::find($id);

        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->status = $request->input('status ') == true ? '1':'0';
        $post->update();
        return redirect()->back()->with('status','Post Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        if(Auth::check()){
                if(Auth::User() == $post->users || Auth::User()->role== '1' ){
                $post->delete();
                
                return redirect()->back()->with('status','Post Deleted successfully');
            }
            else{
            // {   echo"<script language='javascript'>
            //             myFunction();
            //     </script>
            //     ";
                return redirect('/posts')->with('Cant_delete',' cant delete ');
            }
        }
        else{
            return redirect()->back()->with('status','login first');
        }

        // $post = post::find($id);
       
      
    }
}
