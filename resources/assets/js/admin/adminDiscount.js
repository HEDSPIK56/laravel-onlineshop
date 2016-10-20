/**
 * Created by NTHanh on 10/20/2016.
 */

$(document).ready(function () {
    setupAdminDiscount.run();
});

var setupAdminDiscount = {
    changeDiscountByPeriod: function(){
        $("#discount_by_period").click(function(e){
            var that = $(this);
            if(that.prop('checked') == true){
                $("#period_from, #period_to").removeAttr('disabled');
            }
            else{
                $("#period_from, #period_to").attr('disabled','disabled');
            }
        });
    },

    setup: function(){
        this.changeDiscountByPeriod();
    },

    run: function () {
        this.setup();
    }
};