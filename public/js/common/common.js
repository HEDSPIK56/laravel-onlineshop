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
    
    setupTinyMCE: function(){
        tinymce.init({
	    selector: "textarea",
	    resize: "both",
	    relative_urls: false,
	    //plugins: ["autoresize", "image", "code", "lists", "code","example", "link"],
        plugins: [
          'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
          'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
          'save table contextmenu directionality emoticons template paste textcolor'
        ],
	    indentation : '20pt',
	    file_browser_callback: function(field_name, url, type, win) {
	        if (type == 'image') $('#my_form input').click();
	    },
	    image_list: "/imglist",
	    toolbar: [
	        "undo redo | styleselect | bold italic | link image | alignleft aligncenter alignright | preview | spellchecker"
	    ]
	});
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
        this.setupTinyMCE();
        this.addToCart();
    },
    run: function () {
        this.setup();
    }
};