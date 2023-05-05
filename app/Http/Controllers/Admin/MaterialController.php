<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::orderBy('name','ASC')->get();
        return view('admin.material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.material.create');
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
            'name' => 'required|unique:materials',
        ],[
            'name.required' => 'Tên chất liệu không được để trống !',
            'name.unique' => 'Tên chất liệu đã tồn tại, thử tên khác !',
        ]);
        $data = $request->only('name', 'status');
        if (Material::create($data)) {
            return redirect()->route('material.index')->with('true', 'Tạo chất liệu thành công');
        }
        return redirect()->back()->with('false','Tạo chất liệu thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        return view('admin.material.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $data = $request->only('name', 'status');
        if ($material->update($data)) {
            return redirect()->route('material.index')->with('true', 'Cập nhật chất liệu thành công');
        }
        return redirect()->back()->with('false','Cập nhật chất liệu thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        if ($material->delete()) {
            return redirect()->route('material.index')->with('true', 'Xóa chất liệu thành công');
        }
        return redirect()->back()->with('false','Xóa chất liệu thất bại');
    }
}
