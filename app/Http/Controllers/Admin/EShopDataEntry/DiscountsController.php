<?php

namespace App\Http\Controllers\Admin\EShopDataEntry;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Admin\AdminController;
use App\Repositories\AdminDataDiscountRepository;
use App\Condition\Admin\AdminDiscountSearchCondition;
use App\Http\Requests\Admin\Data\AdminCreateDiscountRequest;

class DiscountsController extends AdminController
{
    protected $_discountRep;
    
    public function __construct(AdminDataDiscountRepository $rep)
    {
        parent::__construct();
        $this->_discountRep = $rep;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $condition = new AdminDiscountSearchCondition();
        $condition->setAttributes($request->all());
        $discounts = $this->_discountRep->fetchListDiscount($condition);
        // dd($discounts);

        return view('admin.eshopdata.discounts.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eshopdata.discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateDiscountRequest $request)
    {
        $condition = new AdminDiscountSearchCondition();
        $condition->setAttributes($request->all());
        $result = $this->_discountRep->insertDiscount($condition);
        if($result){
            return redirect()->route('admin.data.discount.index')->with('success','insert discount successfully');
        }
        return redirect()->route('admin.data.discount.index')->with('error','insert discount failed');

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
    
    public function copy(Request $request, $id){
        
    }
}
