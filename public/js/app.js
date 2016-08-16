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
	    plugins: ["autoresize", "image", "code", "lists", "code","example", "link"],
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
    
    setup: function () {
        this.uploadFile();
        this.setupTinyMCE();
    },
    run: function () {
        this.setup();
    }
};