$(document).ready(function () {

    $("#add-holiday-btn").click(function () {
        if( ($('.form-horizontal .control-group').length+1) > 2) {
            alert("Only 2 control-group allowed");
            return false;
        }
        var id = ($('.holiday .h-group').length + 1).toString();
        $('.holiday').append(
            '.h-group#h-group '+ id +' \
                = form_start(holidayForm) \
                = form_widget(holidayForm) \
                = form_end(holidayForm)'
        );
    });

    $("#removeButton").click(function () {
        if ($('.form-horizontal .control-group').length == 1) {
            alert("No more textbox to remove");
            return false;
        }

        $(".form-horizontal .control-group:last").remove();
    });
});
