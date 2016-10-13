$(document).ready(function () {
    setupAdminProduct.run();
});

var setupAdminProduct = {
    limit : 100,
    
    generateItemPerPage: function(item, limit){
        var result = [];
        
        for(var i = item; i <= limit; i += item){
            result.push(i);    
        }
        
        return result;
    },
    
    processItemPerPage: function(item, limit, prefix){
        var item = item * 1;          
        var data = setupAdminProduct.generateItemPerPage(item, limit);
        var html = '';
        if(data.lenght > 0){
            html = '<li><a data-value="' + data[0] + '" class="selected">' + data[0] + '개</a></li>';
            for(i = 1; i < data.length; i++){ 
                html += '<li><a data-value="' + data[i] + '">' + data[i] + '개</a></li>';
            }
            
            $('#' + prefix + '_dropdown').html(html);   
            $('#' + prefix + '_a').html(data[0]);   
            $('#' + prefix + '_hidden').val(data[0]);
            
            // process event
            var parent = $('#' + prefix + '_container').parent('li');
            var dom = $('#' + prefix + '_container').remove();                  
            parent.append(dom); 
            dom.dropdown();
        }
    },
    
    setupItemPerPagePC: function(){
        $("#per_page_pc li").click(function(e){
            var item = $(this).data('value') * 1;
            setupAdminProduct.processItemPerPage(item, setupAdminProduct.limit, 'per_line_pc')
        });
    },
    
    
    setup: function(){
    },
    
    run: function () {
        this.setup();
    }
};