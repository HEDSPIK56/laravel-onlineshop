<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repository\ProductRepository;
use App\Condition\ProductSearchCondition;
use App\Repository\CategoryRepository;
use Cart;

class ProductsController extends Controller
{
    protected $productRes;
    protected $categoryRes;

    public function __construct(ProductRepository $res, CategoryRepository $cat)
    {
        $this->productRes = $res;
        $this->categoryRes = $cat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $condition = new ProductSearchCondition();
        $condition->setAttributes($request->all());
        $products = $this->productRes->getAllProduct($condition);
        $newProducts = $this->productRes->getNewsProduct($condition);
        $categories = $this->categoryRes->getListCategory();
        $rangePerPage = $condition->getItemPerPage();
        $temp = range(6, 100, 3);
        return view('pages.products.index', compact(
                        'products', 'categories', 'newProducts', 'rangePerPage', 'temp'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /** @var ProductSearchCondition $condition */
        $condition = new ProductSearchCondition();
        $condition->setAttributes(['id' => $id]);
        $product = $this->productRes->readProduct($condition);
        $categories = $this->categoryRes->getListCategory();
        $relatedProducts = $this->productRes->relatedProducts($condition);
        // update number view
        $this->productRes->updateNumberView($product);
        return view('pages.products.show', compact('product', 'categories', 'relatedProducts'));
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
    
    public function addToCart(Request $request)
    {
        if ($request->isMethod('post')) {
            $product_id = $request->input('product_id');
            $this->productRes->addToCart($product_id);
        }
        return redirect()->route('cart.index');
    }
}
