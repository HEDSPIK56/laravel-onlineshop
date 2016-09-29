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
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    },
    
    uploadFile: function(){
        $("#upload_file").change(function(e){
            setupCommonApp.reviewImageBeforeUpload(this, "#review_image");
            $("#review_image").show();
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

    datepickerSetup: function(){
      $('input.datepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years',
      });
    },

    formValidation: function(){
      $('#myForm').validator();
      //http://1000hz.github.io/bootstrap-validator/#validator-markup
    },
    
    setup: function () {
        this.uploadFile();
        this.addToCart();
        this.datepickerSetup();
        this.formValidation();
    },
    run: function () {
        this.setup();
    }
};