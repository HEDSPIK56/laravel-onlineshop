$(document).ready(function () {
    setupCommonApp.run();
});

//create namespace
var setupCommonApp = {
    
    reviewImageBeforeUpload: function(input, input_review){
        //http://jsfiddle.net/LvsYc/
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) {
                $(input_review).attr('src', e.target.result);
            }
        }
    },
    
    uploadFile: function(){
        $("#upload_file").change(function(e){
            setupCommonApp.reviewImageBeforeUpload(this, "#review_image");
        });
    },
    
    addToCart: function(){
      $(".btn.btn-fefault.add-to-cart").on('click', function(e){
          e.preventDefault();
          var that = $(this);
          var form = that.parents('form');
          return false;
          console.log(form);
      });  
    },
    
    setup: function () {
        this.uploadFile();
        this.addToCart();
    },
    run: function () {
        this.setup();
    }
};