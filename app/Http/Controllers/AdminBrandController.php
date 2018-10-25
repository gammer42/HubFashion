<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands = Brand::all();

        $categories = DB::table('brand_category')->join('categories','categories.id','=','brand_category.category_id')->where('brand_id','!=',0)->select('categories.name as name','brand_category.brand_id as id')->latest()->get();

//        dd($categories);

        return view('admin.brands.index', compact('brands','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view ('admin.brands.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:190',
            'slug' => 'required|string|max:190|unique:brands,slug',
            'status' => 'required',
            'categories' => 'required'
        ]);

        $store = new Brand();

        $store->name = $request->name;
        $store->slug = $request->slug;
        $store->status = $request->status;

        $store->save();

        foreach ($request->categories as $category) {
            $store->categories()->attach($category);
        }

        Session::flash('message','Brand Added Successfully!!');
        return redirect()->route('brands.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brands = Brand::query()->findOrFail($id);
        $categories = DB::table('brand_category')->join('categories','categories.id','=','brand_category.category_id')->where('brand_id',$id)->select('categories.name as name','brand_category.category_id as id')->latest()->get();
//        dd($categories);
        return view('admin.brands.show', compact('brands', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::query()->findOrFail($id);
        $given = DB::table('brand_category')->where('brand_id','=',$id)->pluck('category_id')->toArray();
//        dd($given);
        return view('admin.brands.edit', compact('categories','brands', 'given'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brands = Brand::query()->findOrFail($id);
        if($brands->slug != $request->slug){
            $this->validate($request,[
                'name' => 'required|string|max:190',
                'slug' => 'required|string|max:190|unique:brands,slug',
                'status' => 'required|boolean',
                'categories' => 'required'
            ]);
        }
        else {
            $this->validate($request, [
                'name' => 'required|string|max:190',
                'slug' => 'required|string|max:190',
                'status' => 'required|boolean',
                'categories' => 'required'
            ]);
        }

        $brands->name = $request->name;
        $brands->slug = $request->slug;
        $brands->status = $request->status;

        $brands->save();

        DB::table('brand_category')->where('brand_id',$id)->delete();


        foreach ($request->categories as $category) {
            $brands->categories()->attach($category);
        }
        Session::flash('message','Update Successfully');
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        Brand::query()->findOrFail($id)->delete();

        Session::flash('message','Brand Delete Complete');
        return redirect()->route('brands.index');
    }
}
