<div class="categories animated wow slideInUp" data-wow-delay=".5s">
    <h3>Categories</h3>
    <ul class="cate">
        @foreach($categories as $category)
        <li><a href="products.html">{{$category->name}}</a> <span>({{$category->getProductActive()->count()}})</span></li>
        @endforeach
    </ul>
</div>