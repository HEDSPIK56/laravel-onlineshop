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
    
    setup: function () {
        this.uploadFile();
    },
    run: function () {
        this.setup();
    }
};