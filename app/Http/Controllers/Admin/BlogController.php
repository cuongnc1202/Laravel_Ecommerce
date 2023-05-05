<?php

namespace App\Http\Controllers\Admin;

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
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
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
            'name.required' => 'Tên bài viết không được để trống !',
            'name.unique' => 'Tên bài viết đã tồn tại, thử tên khác !',
        ]);
        $data = $request->only('name','content', 'status');
        $file_name = $request->avatar->getClientOriginalName();
        if ($request->avatar->move(public_path('/uploads'), $file_name)) {
            $data['avatar'] = $file_name;
            Blog::create($data);
            return redirect()->route('blog.index')->with('true','Tạo mới tin tức thành công');
        }
        return redirect()->back()->with('false', 'Tạo mới tin tức thất bại');
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
            return redirect()->route('blog.index')->with('true','Cập nhật tin tức thành công');
        }
        return redirect()->back()->with('false','Cập nhật tin tức thất bại');

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
            return redirect()->route('blog.index')->with('true','Xóa tin tức thành công');
        }
    }
}
