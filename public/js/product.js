$(document).ready(function () {
    setupProduct.run();
});

//create namespace
var setupProduct = {
    search: function(){
        $("#sort_style, #per_page").on('change', function(e){
            $("#form_search_product").submit();
        });
    },
    setup: function () {
        this.search();
    },
    run: function () {
        this.setup();
    }
};