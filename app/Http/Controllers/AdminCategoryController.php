<?php /** @noinspection PhpUnusedLocalVariableInspection */

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories AS child')
            ->join('categories AS parent', 'parent.id', '=', 'child.parent_id')
            ->select('child.id','child.name','child.slug','child.status','child.parent_id','parent.name as parent_name')
            ->get();

//        dd($categories);
        $roots = DB::table('categories')->where('categories.parent_id',0)->get();

        return view('admin.category.index', compact('categories','roots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('children')->where('parent_id','=',0)->orderBy('name', 'asc')->get();
        return view('admin.category.create', compact('categories'));
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
            'name' => 'required|max:190|string',
            'parent' => 'required',
            'slug' => 'required|string|max:190|unique:categories',
            'status' => 'required'
        ]);

        $store = new Category();

        $store->name = $request->name;
        $store->parent_id = $request->parent;
        $store->slug = $request->slug;
        $store->status = $request->status;

        $store->save();

        Session::flash('message','Category Created Successfully!!!');
        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Category::query()->where('parent_id','=',0)->where('id',$id)->first();

        if($show != null){
            $categories = $show;
        }
        else {
            $categories = DB::table('categories AS child')
                ->join('categories AS parent', 'parent.id', '=', 'child.parent_id')
                ->where('child.id', '=', $id)
                ->select('child.id', 'child.name', 'child.slug', 'child.status', 'child.parent_id', 'parent.name as parent_name')
                ->first();
        }
        return view('admin.category.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $temp = Category::query()->where('parent_id','=',0)->where('id',$id)->first();

        if($temp != null){
            $categories = $temp;
        }
        else {
            $categories = DB::table('categories AS child')
                ->join('categories AS parent', 'parent.id', '=', 'child.parent_id')
                ->where('child.id', '=', $id)
                ->select('child.id', 'child.name', 'child.slug', 'child.status', 'child.parent_id', 'parent.name as parent_name')
                ->first();
        }
        $parents = Category::with('children')->where('parent_id','=',0)->orderBy('name', 'asc')->get();
//        dd($categories);
        return view('admin.category.edit', compact('categories','parents'));
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
        $store = Category::query()->findOrFail($id);

        if($request->slug != $store->slug)
        $this->validate($request,[
            'name' => 'required|max:190|string',
            'parent' => 'required',
            'slug' => 'required|string|max:190|unique:categories',
            'status' => 'required'
        ]);

        else
        $this->validate($request,[
            'name' => 'required|max:190|string',
            'parent' => 'required',
            'slug' => 'required|string|max:190',
            'status' => 'required'
        ]);



        $store->name = $request->name;
        $store->parent_id = $request->parent;
        $store->slug = $request->slug;
        $store->status = $request->status;

        $store->save();

        Session::flash('message','Category Updated Successfully!!!');
        return redirect()->route('categories.index');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cat = DB::table('categories')->where('parent_id', $id)->first();
        if($cat == null){
//            Category::query()->findOrFail($id)->delete();
            Session::flash('message','Category Deleted Successfully!!!');
        }
        else{
            Session::flash('message','Cannot Delete!!! Category Has Sub-category');
        }


        return redirect()->route('categories.index');
    }
}
