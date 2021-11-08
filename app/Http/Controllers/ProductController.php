<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
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

        $data = Product::search()->paginate(5);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin/product/create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        if ($request->has('file_uploads')) {
            $file = $request->file_uploads;
            $ext = $request->file_uploads->extension();
            $file_name = time() . '-' . 'product' . '.' . $ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $images = $request->file('image_lists');
        if ($request->hasFile('image_lists')) :
            foreach ($images as $item) :
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $imageName = $time . '-' . $item->getClientOriginalName();
                $item->move(public_path('uploads/file'), $imageName);
                $arr[] = $imageName;
            endforeach;
            $image = implode(",", $arr);
        else :
            $image = '';
        endif;
        $request->merge(['image' => $file_name]);
        $request->merge(['image_list' => $image]);
        if (Product::create($request->all())) {
            return redirect()->route('product.index')->with('success', 'Thêm mới sản phẩm thành công!');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.product.edit', compact('cats', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        //sử lý 2
        if ($request->has('file_uploads') || $request->hasFile('image_lists')) {
            $file = $request->file_uploads;
            $ext = $request->file_uploads->extension();
            $file_name = time() . '-' . 'product' . '.' . $ext;
            $file->move(public_path('uploads'), $file_name);
            //image list
            $images = $request->file('image_lists');
            foreach ($images as $item) :
                $var = date_create();
                $time = date_format($var, 'YmdHis');
                $imageName = $time . '-' . $item->getClientOriginalName();
                $item->move(public_path('uploads/file'), $imageName);
                $arr[] = $imageName;
            endforeach;
            $image = implode(",", $arr);
            $request->merge(['image' => $file_name]);
            $request->merge(['image_list' => $image]);
            $product->update($request->only(
                'name',
                'image',
                'price',
                'sale_price',
                'description',
                'image_list',
                'status',
                'category_id',
            ));
            return redirect()->route('product.index')->with('success', 'Cập nhật danh mục thành công!');
        } else {
            $file_name = $product->image;
            $image = $product->image_list;
            $request->merge(['image' => $file_name]);
            $request->merge(['image_list' => $image]);
            $product->update($request->only(
                'name',
                'image',
                'price',
                'sale_price',
                'description',
                'image_list',
                'status',
                'category_id',
            ));
            return redirect()->route('product.index')->with('success', 'Cập nhật danh mục thành công!');
        }

        //sử lý 1
        // if ($request->has('file_uploads')) {
        //     $file = $request->file_uploads;
        //     $ext = $request->file_uploads->extension();
        //     $file_name = time() . '-' . 'product' . '.' . $ext;
        //     $file->move(public_path('uploads'), $file_name);
        // }
        // $images = $request->file('image_lists');
        // if ($request->hasFile('image_lists')) :
        //     foreach ($images as $item) :
        //         $var = date_create();
        //         $time = date_format($var, 'YmdHis');
        //         $imageName = $time . '-' . $item->getClientOriginalName();
        //         $item->move(public_path('uploads/file'), $imageName);
        //         $arr[] = $imageName;
        //     endforeach;
        //     $image = implode(",", $arr);
        // else :
        //     $image = '';
        // endif;
        // $request->merge(['image' => $file_name]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->detail->count() > 0) {
            return redirect()->route('product.index')->with('error', 'Khổng thể xoá!');
        } else {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Xoá Thành Công!');
        }
    }
}
