
   
   var weekpicker, start_date, end_date;

function set_week_picker(date) {
    start_date = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay());
    end_date = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 6);
    weekpicker.datepicker('update', start_date);
    weekpicker.val((start_date.getMonth() + 1) + '/' + start_date.getDate() + '/' + start_date.getFullYear() + ' - ' + (end_date.getMonth() + 1) + '/' + end_date.getDate() + '/' + end_date.getFullYear());
}
$(document).ready(function() {
    
    weekpicker = $('.week-picker');
    weekpicker.datepicker({
        autoclose: true,
        forceParse: false,
        container: '#week-picker-wrapper',
    }).on("changeDate", function(e) {
        set_week_picker(e.date);
    });
    $('.week-prev').on('click', function() {
        var prev = new Date(start_date.getTime());
        prev.setDate(prev.getDate() - 1);
        set_week_picker(prev);
    });
    $('.week-next').on('click', function() {
        var next = new Date(end_date.getTime());
        next.setDate(next.getDate() + 1);
        set_week_picker(next);
    });
    set_week_picker(new Date);
    
    
});