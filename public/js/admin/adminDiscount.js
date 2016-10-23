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
                $("#period_from, #period_to").removeAttr('disabled').attr('required');
            }
            else{
                $("#period_from, #period_to").attr('disabled','disabled').removeAttr('required');
            }
        });
    },

    changeDiscountByQuanlity: function(){
        $("#discount_by_quantity").click(function(e){
            var that = $(this);
            if(that.prop('checked') == true){
                $("#min_quantity").removeAttr('disabled').attr('required');
            }
            else{
                $("#min_quantity").attr('disabled','disabled').removeAttr('required');
            }
        });
    },

    setup: function(){
        this.changeDiscountByPeriod();
        this.changeDiscountByQuanlity();
    },

    run: function () {
        this.setup();
    }
};