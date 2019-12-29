$(document).ready(function() {

    $(".date-picker").datepicker({
        dateFormat: "yy-mm-dd"
    });
    $(".date-picker").change(function () {
        var startDate = $('input[name="start_date"]').val();
        var endDate = $('input[name="end_date"]').val();

        if ((Date.parse(endDate) < Date.parse(startDate))) {
            alert("End date should be greater or equal than Start date");
            $(this) .val('');
        }
    });
});
