<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderBy('id','DESC')->get();
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            'name' => 'required|unique:banners',
        ],[
            'name.required' => 'Tên banner không được để trống !',
            'name.unique' => 'Tên banner đã tồn tại, thử tên khác !',
        ]);
        $data = $request->only('name','status','description');
        $file_name = $request->image->getClientOriginalName();
        if ($request->image->move(public_path('/uploads'), $file_name)) {
            $data['image'] = $file_name;
            Banner::create($data);
            return redirect()->route('banner.index')->with('true','Upload banner thành công!');
        }
        return redirect()->back()->with('false', 'Upload banner thất bại!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
       return view('admin.banner.edit', compact('banner'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $data = $request->only('name','status','description');
        if ($request->has('image')) {
            $file_name = $request->image->getClientOriginalName();
            $request->image->move(public_path('/uploads'), $file_name);
            $data['image'] = $file_name;
            } else {
                $data['image'] = $banner['image'];
            }
            // dd($data);
            if ($banner->update($data)) {
                return redirect()->route('banner.index')->with('true','Chỉnh sửa banner thành công!');
            
            }
            return redirect()->back()->with('false','Chỉnh sửa banner thất bại!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if ($banner->delelte()) {
            return redirect()->route('banner.index')->with('true','Xóa banner thành công');
        }
    }
}