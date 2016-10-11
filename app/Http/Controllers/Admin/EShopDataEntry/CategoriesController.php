<?php

namespace App\Http\Controllers\Admin\EShopDataEntry;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Admin\Data\CategoryRequest;
use App\Category;
use Illuminate\Support\Facades\Response;
use App\Repositories\AdminDataCategoryRepository;
use App\Http\Controllers\Admin\AdminController;
use App\Condition\AdminCopyCategoryCondition;

class CategoriesController extends AdminController
{
    protected $_cateRep;
    
    public function __construct(AdminDataCategoryRepository $cat)
    {
        parent::__construct();
        $this->_cateRep = $cat;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at')->paginate(10);
        return view('admin.eshopdata.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eshopdata.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if (is_null($request))
        {
            $request = \Request::instance();
        }
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        return redirect()->route('admin.data.category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param AdminCopyCategoryCondition $condition
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function copy(Request $request)
    {
        $condition = new AdminCopyCategoryCondition();
        $condition->setAttributes([
            'ids' => $request->input('id')
        ]);
        $result = $this->_cateRep->copyCategory($condition);
        if($result){
            return redirect()->route('admin.data.category.index')->with('success','copy category successfully');
        }
        return redirect()->route('admin.data.category.index')->with('error','copy category failed');

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
