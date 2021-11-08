<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::search()->paginate(5);
        return view('admin.banner.index', compact('data'));
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
        if ($request->has('file_uploads')) {
            $file = $request->file_uploads;
            $ext = $request->file_uploads->extension();
            $file_name = time() . '-' . 'banner' . '.' . $ext;
            $file->move(public_path('uploads/banner'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        if (Banner::create($request->all())) {
            return redirect()->route('banner.index')->with('success', 'Thêm thành công!');
        };
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
        if ($request->has('file_uploads')) {
            $file = $request->file_uploads;
            $ext = $request->file_uploads->extension();
            $file_name = time() . '-' . 'banner' . '.' . $ext;
            $file->move(public_path('uploads/banner'), $file_name);
            $request->merge(['image' => $file_name]);
            $banner->update($request->all());
            return redirect()->route('banner.index')->with('success', 'Sửa thành công!');
        } else {
            $files = $banner->image;
            $request->merge(['image' => $files]);
            $banner->update($request->all());
            return redirect()->route('banner.index')->with('success', 'Sửa thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banner.index')->with('success', 'Xoá Thành Công!');
    }
}
