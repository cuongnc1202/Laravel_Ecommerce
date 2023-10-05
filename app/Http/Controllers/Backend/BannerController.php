<?php

namespace App\Http\Controllers\Backend;

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
    public function index(Request $request)
    {
        $banners = Banner::orderBy('id', 'DESC')->get();
        $keyword = $request->keyword;
        if ($keyword) {
            $products = Banner::where('name','like','%'.$keyword.'%')->paginate();
        }
        return view('admin.banner.index', compact('banners'));
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
        ], [
            'name.required' => "Banner's name cannot be empty",
            'name.unique' => "Banner's name already exists. Please try another name!",
        ]);
        $data = $request->only('name', 'status', 'description');
        $file_name = $request->image->getClientOriginalName();
        if ($request->image->move(public_path('/uploads'), $file_name)) {
            $data['image'] = $file_name;
            Banner::create($data);
            return redirect()->route('banner.index')->with('true', 'Banner created successfully');
        }
        return redirect()->back()->with('false', 'Banner create failed');
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
        $data = $request->only('name', 'status', 'description');
        if ($request->has('image')) {
            $file_name = $request->image->getClientOriginalName();
            $request->image->move(public_path('/uploads'), $file_name);
            $data['image'] = $file_name;
        } else {
            $data['image'] = $banner['image'];
        }
        if ($banner->update($data)) {
            return redirect()->route('banner.index')->with('true', 'Banner updated successfully');

        }
        return redirect()->back()->with('false', 'Banner update failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if ($banner->delete()) {
            return redirect()->route('banner.index')->with('true', 'Banner deleted successfully');
        }
        return redirect()->back()->with('false','Banner delete failed');
    }
}