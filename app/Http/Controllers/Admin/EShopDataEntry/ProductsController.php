<?php

namespace App\Http\Controllers\Admin\EShopDataEntry;

use App\Discount;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\AdminProductRepository;
use App\Condition\AdminProductSearchCondition;
use App\Category;
use App\Http\Requests\Admin\Data\AdminProductRequest;

class ProductsController extends Controller
{

    protected $products;

    public function __construct(AdminProductRepository $rep)
    {
        $this->products = $rep;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd(\App\Product::find(1)->category->name);
        $condition = new AdminProductSearchCondition();
        $condition->setAttributes($request->all());
        $products = $this->products->getListProduct($condition);
        return view('admin.eshopdata.products.index', compact('products'));
    }
    
    public function copy(AdminProductRequest $request)
    {
        $id = $request->input('product_id');
        if($this->products->copyProduct($id)){
            return redirect()->route('admin.data.product.index');
        }
        return "sai r";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::getAllCategory();
        $discounts = Discount::all();
        return view('admin.eshopdata.products.create', compact('categories','discounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminProductRequest $request)
    {
        $data = $request->except('images');
        $product = $this->products->addProduct($data);
        if ($product)
        {
            // process upload image
            $imageName = $this->products->uploadImage($request, $product->id);
            $product->images = $imageName;
            $product->save();
        }
        return redirect()->route('admin.data.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
