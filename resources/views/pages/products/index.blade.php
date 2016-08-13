@extends('layouts.app')
@section('content')
{!! Breadcrumbs::render('home') !!}

<!-- product -->
<div class="products">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="filter-price animated wow slideInUp" data-wow-delay=".5s">
                <h3>Filter By Price</h3>
                <ul class="dropdown-menu1">
                    <li><a href="">								               
                            <div id="slider-range"></div>							
                            <input type="text" id="amount" style="border: 0" />
                        </a></li>	
                </ul>
                <script type='text/javascript'>//<![CDATA[ 
                    $(window).load(function () {
                        $("#slider-range").slider({
                            range: true,
                            min: 0,
                            max: 100000,
                            values: [20000, 80000],
                            slide: function (event, ui) {
                                $("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
                            }
                        });
                        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));


                    });//]]>
                </script>
                <script type="text/javascript" src="js/jquery-ui.min.js"></script>
                <!---->
            </div>
            @include('includes.partials.listcategories', ['categories' => $categories])
            <!-- new product -->
            @include('includes.partials.newproduct', ['newProducts' => $newProducts])
            <!-- end new product -->

            <div class="men-position animated wow slideInUp" data-wow-delay=".5s">
                <a href="single.html"><img src="images/27.jpg" alt=" " class="img-responsive" /></a>
                <div class="men-position-pos">
                    <h4>Summer collection</h4>
                    <h5><span>55%</span> Flat Discount</h5>
                </div>
            </div>
        </div>
        <div class="col-md-8 products-right">
            <div class="products-right-grid">
                <div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
                    <form action="{{ route('product.index')}}" id="form_search_product">
                        <div class="sorting">
                            <select id="sort_style" class="frm-field required sect" name="sortType">
                                <option value="">Default sorting</option>
                                <option value="popular">Sort by popularity</option> 
                                <option value="view">Sort by average rating</option>					
                                <option value="price">Sort by price</option>								
                            </select>
                        </div>
                        <div class="sorting-left">
                            <label>Item per page</label>
                            {{ Form::selectRange('itemPerPage', 6,24,$rangePerPage, ['class' => 'frm-field required sect', 'id' => 'per_page']) }}
                        </div>
                    </form>
                    <div class="clearfix"> </div>
                </div>
                <div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
                    <img src="images/18.jpg" alt=" " class="img-responsive" />
                    <div class="products-right-grids-position1">
                        <h4>2016 New Collection</h4>
                        <p>Temporibus autem quibusdam et aut officiis debitis aut rerum 
                            necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae 
                            non recusandae.</p>
                    </div>
                </div>
            </div>
            @foreach($products->chunk(3) as $item)
            <div class="products-right-grids-bottom">
                @foreach($item as $product)
                <div class="col-md-4 products-right-grids-bottom-grid">
                    <div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
                        <div class="new-collections-grid1-image">
                            <a href="{{route('product.show',['id' => $product->id])}}" class="product-image"><img src="{{ $product->getImage() }}" alt=" " class="img-responsive"></a>
                            <div class="new-collections-grid1-image-pos products-right-grids-pos">
                                <a href="{{route('product.show',['id' => $product->id])}}">Quick View</a>
                            </div>
                            <div class="new-collections-grid1-right products-right-grids-pos-right">
                                <div class="rating">
                                    <div class="rating-left">
                                        <img src="images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="images/1.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="images/1.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                        <h4><a href="{{route('product.show',['id' => $product->id])}}">{{ $product->name }}</a></h4>
                        <p>{{ $product->getSortDesciprtion($product->desciption)}}</p>
                        <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                            <p>
                                @if($product->isApplyDiscount())
                                <i>{{ formatnumber($product->getPrice()) }}</i> 
                                <span class="item_price">{{ formatnumber($product->getPriceDiscount()) }}</span>
                                @else
                                <span class="item_price">{{ formatnumber($product->getPrice()) }}</span>
                                @endif
                                <!--<a class="item_add" href="#">add to cart </a>-->
                            <form method="POST" action="{{route('product.add_to_cart')}}">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-fefault add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
            @endforeach
            <!-- paginal-->
            <nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
                {!! $products->appends(Request::all())->links() !!}
            </nav>
            <!-- end paginator -->
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- end product -->
@endsection

@section('javascript')
<!-- include js file -->
<script type="text/javascript" src="{{ URL::asset('js/product.js') }}"></script>
<!-- end include js file -->
@stop
