$(document).ready(function () {
    setupAdminCommon.run();
});

var setupAdminCommon = {
    setupDataTable: function(){
        $('#example').DataTable();
    },
    // setup
    setup: function () {
        //this.setupDataTable();
    },
    //run
    run: function () {
        this.setup();
    }
};
//# sourceMappingURL=admin.common.js.map
