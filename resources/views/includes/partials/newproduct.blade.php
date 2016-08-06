<div class="new-products animated wow slideInUp" data-wow-delay=".5s">
    <h3>New Products</h3>
    <div class="new-products-grids">
        @foreach($newProducts as $newProduct)
        <div class="new-products-grid">
            <div class="new-products-grid-left">
                <a href="{{route('product.show',['id' => $newProduct->id])}}"><img src="{{ $newProduct->getImage()}}" alt="{{ $newProduct->name }}" class="img-responsive" /></a>
            </div>
            <div class="new-products-grid-right">
                <h4><a href="{{route('product.show',['id' => $newProduct->id])}}">{{ $newProduct->getSortDesciprtion($newProduct->desciption)}}</a></h4>
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
                <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                    <p> <span class="item_price">{{$newProduct->price}}</span><a class="item_add" href="#">add to cart </a></p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        @endforeach
    </div>
</div>