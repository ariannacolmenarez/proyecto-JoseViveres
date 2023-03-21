var yearpicker;

function set_year_picker(date) {
    yearpicker = new Date(date.getFullYear(), date.getMonth());
    $("#year_datepicker").datepicker('update', yearpicker);
    console.log(yearpicker.getYear());
}
$(document).ready(function()
{   
    $("#year_datepicker").datepicker( {
        format: "yyyy",
        startView: "years", 
        minViewMode: "years",
        orientation: "bottom",
        changeYear: true
    }).on("changeDate", function(e) {
        set_year_picker(e.date);  
    });
    $('.year-prev').on('click', function() {
        var prev = new Date(yearpicker.getTime());
        prev.setFullYear(prev.getFullYear() - 1);
        set_year_picker(prev);
    });
    $('.year-next').on('click', function() {
        var next = new Date(yearpicker.getTime());
        next.setFullYear(next.getFullYear() + 1);
        set_year_picker(next);
    });
    set_year_picker(new Date);
});