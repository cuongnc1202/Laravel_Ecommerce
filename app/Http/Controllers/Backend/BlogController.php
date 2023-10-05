<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        $keyword = $request->keyword;
        if ($keyword) {
            $products = Blog::where('name','like','%'.$keyword.'%')->paginate();
        }
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:blogs',
        ],[
            'name.required' => "Post's name cannot be empty",
            'name.unique' => "Post's name already exists. Please try another name!",
        ]);
        $data = $request->only('name','content', 'status');
        $file_name = $request->avatar->getClientOriginalName();
        if ($request->avatar->move(public_path('/uploads'), $file_name)) {
            $data['avatar'] = $file_name;
            Blog::create($data);
            return redirect()->route('blog.index')->with('true','Post created successfully');
        }
        return redirect()->back()->with('false', 'Post create failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->only('name','content','status');
        if ($request->has('avatar')) {
            $file_name = $request->avatar->getClientOriginalName();
            if ($request->avatar->move(public_path('/uploads'), $file_name)) {
                $data['avatar'] = $file_name;
            } else {
                $data['avatar'] = $blog['avatar'];
            }
        }
        if ($blog->update($data)) {
            return redirect()->route('blog.index')->with('true','Post updated successfully');
        }
        return redirect()->back()->with('false','Post update failed');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if ($blog->delete()) {
            return redirect()->route('blog.index')->with('true','Post deleted successfully');
        }
    }
}
