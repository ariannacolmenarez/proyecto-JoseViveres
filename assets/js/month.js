var monthpicker;

function set_month_picker(date) {
    monthpicker = new Date(date.getFullYear(), date.getMonth());
    $("#datepicker").datepicker('update', monthpicker);
}
$(document).ready(function()
{   
    $("#datepicker").datepicker( {
        format: "mm-yyyy",
        startView: "months", 
        minViewMode: "months",
        orientation: "bottom"
    }).on("changeDate", function(e) {
        set_month_picker(e.date);
    });
    $('.month-prev').on('click', function() {
        
        var prev = new Date(monthpicker.getTime());
        prev.setMonth(prev.getMonth() - 1);
        set_month_picker(prev);
    });
    $('.month-next').on('click', function() {
        var next = new Date(monthpicker.getTime());
        next.setMonth(next.getMonth() + 1);
        set_month_picker(next);
    });
    set_month_picker(new Date);
});
