<!-- single-related-products -->
<div class="single-related-products">
    <div class="container">
        <h3 class="animated wow slideInUp" data-wow-delay=".5s">Related Products</h3>
        <p class="est animated wow slideInUp" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
            deserunt mollit anim id est laborum.</p>
        <div class="new-collections-grids">
            @foreach($relatedProducts as $rp)
            <div class="col-md-3 new-collections-grid">
                <div class="new-collections-grid1 animated wow slideInLeft" data-wow-delay=".5s">
                    <div class="new-collections-grid1-image">
                        <a href="{{route('product.show',['id' => $rp->id])}}" class="product-image"><img src="{{ $rp->getImage()}}" alt="{{ $rp->name }}" class="img-responsive"></a>
                        <div class="new-collections-grid1-image-pos">
                            <a href="{{route('product.show',['id' => $rp->id])}}">Quick View</a>
                        </div>
                        <div class="new-collections-grid1-right">
                            <div class="rating">
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
                                <div class="rating-left">
                                    <img src="images/1.png" alt=" " class="img-responsive">
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                    <h4><a href="{{route('product.show',['id' => $rp->id])}}">Running Shoes</a></h4>
                    <p>Vel illum qui dolorem eum fugiat.</p>
                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                        <p><i>$280</i> <span class="item_price">$150</span><a class="item_add" href="#">add to cart </a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- //single-related-products -->
