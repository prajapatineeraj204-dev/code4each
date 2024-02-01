<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Post::get();
        return view('index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = \Validator::make($request->all(), [
        'title' => 'required',
        'content' => 'required',
        'author_name' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)  // Pass the validation errors to the view
            ->withInput();           // Pass the input data back to the form
    } else {
        $data = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_name' => $request->author_name,
        ]);

        return redirect()->back()->with('success', 'Post submitted successfully');
    }
}

    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $datas=Post::find($post);
      $data=Post::find($datas[0]['id']);
       return view('show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $datas=Post::find($post);
      $data=Post::find($datas[0]['id']);
       return view('edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //dd($request->all());
        $validator = \Validator::make($request->all(), [
        'title' => 'required',
        'content' => 'required',
        'author_name' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)  // Pass the validation errors to the view
            ->withInput();           // Pass the input data back to the form
    } else {
            $datas=Post::find($post);
            $data=Post::find($datas[0]['id'])->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'author_name' => $request->author_name,
                ]);
                return redirect()->back()->with('success','Post update successfully');
            }

            
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
{
    $data = Post::find($id)->delete();
 return redirect()->back()->with('success','Post delete successfully');

}
}
