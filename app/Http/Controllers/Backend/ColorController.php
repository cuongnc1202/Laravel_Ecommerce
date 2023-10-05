<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $colors = Color::orderBy('id','DESC')->get();
        $keyword = $request->keyword;
        if ($keyword) {
            $products = Color::where('name','like','%'.$keyword.'%')->paginate();
        }
        return view('admin.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
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
            'name' => 'required|unique:colors',
            'slug' => 'required|unique:colors',
        ],[
            'name.required' => "Color's name can not be empty !",
            'name.unique' => "Color's name already exists, please try another name !",
            'slug.required' => "Color's slug can not be empty !",
            'slug.unique' => "Color's slug already exists, please try another slug !",
        ]);
        $data = $request->only('name', 'slug', 'status');
        if (Color::create($data)) {
            return redirect()->route('color.index')->with('true', 'Color created successfully');
        }
        return redirect()->back()->with('false','Color create failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $data = $request->only('name', 'slug', 'status');
        if ($color->update($data)) {
            return redirect()->route('color.index')->with('true', 'Color updated successfully');
        }
        return redirect()->back()->with('false', 'Color update failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        if ($color->delete()) {
            return redirect()->route('color.index')->with('true', 'Color has been deleted');
        }
        return redirect()->back()->with('false','Color delete failed');
    }
}
