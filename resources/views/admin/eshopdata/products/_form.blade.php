<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="categoryName">Category name</label>
    <select class="form-control" name="category_id">
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="productName">Name</label>
    <input type="text" class="form-control" name="name" id="productName" placeholder="Input name product"/>
</div>
<div class="form-group">
    <label for="productTags">Product Tags</label>
    <input type="text" class="form-control" name="tag" id="productTags" placeholder="input tag product"/>
</div>
<div class="form-group">
    <label for="productKeywords">Product keywords</label>
    <input type="text" class="form-control" name="keywords" id="productKeywords" placeholder="input keywords product"/>
</div>
<div class="form-group">
    <label for="standarInfor">Standar info</label>
    <textarea name="standard_info" class="form-control" rows="3" id="standarInfor" placeholder="Standar info"></textarea>
</div>
<div class="radio">
    <label>
        <input type="radio" name="visible" id="visibleRadio" value="Y" checked>
        Enable Product
    </label>
</div>
<div class="radio">
    <label>
        <input type="radio" name="visible" id="visibleRadio2" value="N">
        Disable Product
    </label>
</div>
<button type="submit" class="btn btn-default">Submit</button>