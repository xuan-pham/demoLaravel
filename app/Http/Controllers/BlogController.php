<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
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
        $data = Blog::search()->paginate(5);
        return view('admin.blog.index', compact('data'));
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
        if ($request->has('file_uploads')) {
            $file = $request->file_uploads;
            $ext = $request->file_uploads->extension();
            $file_name = time() . '-' . 'blog' . '.' . $ext;
            $file->move(public_path('uploads/blog'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        if (Blog::create($request->all())) {
            return redirect()->route('blog.index')->with('success', 'Thêm bài viết thành công!');
        };
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
        if ($request->has('file_uploads')) {
            $file = $request->file_uploads;
            $ext = $request->file_uploads->extension();
            $file_name = time() . '-' . 'blog' . '.' . $ext;
            $file->move(public_path('uploads/blog'), $file_name);
            $request->merge(['image' => $file_name]);
            $blog->update($request->only(['name', 'description', 'sumaty', 'image', 'status']));
            return redirect()->route('blog.index')->with('success','Thay đổi thành công!');

        } else {
            $img = $blog->image;
            $request->merge(['image' => $img]);
            $blog->update($request->only(['name', 'description', 'sumaty', 'image', 'status']));
            return redirect()->route('blog.index')->with('success','Thay đổi thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Xoá Thành Công!');
    }
}
