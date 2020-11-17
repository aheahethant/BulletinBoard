var created_date_column = 8;
var name_column = 1;
var email_column = 2;

/**
 * Date Filter
 */
$.fn.dataTableExt.afnFiltering.push(
    function (oSettings, aData, iDataIndex) {
        if (!$("#from_date").val() && !$("#to_date").val()) {
            return true;
        }
        var dateStart = moment($("#from_date").val(), "YYYY-MM-DD").valueOf();
        var dateEnd = moment($("#to_date").val(), "YYYY-MM-DD").valueOf();
        var evalDate = moment(aData[created_date_column], "YYYY/MM/DD").valueOf();
        if (evalDate >= dateStart && evalDate <= dateEnd) {
            return true;
        } else {
            return false;
        }
    }
);

/**
 * ready function
 */
$(document).ready(function () {
    var table = $('#user_list').DataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "bSearch": false,
        sDom: 'lrtip'
    });

    /**
     * btn click function
     * 
     * search name & email in user list
     */
    $('#btnSearch').click(function () {
        var searchName = $('#name').val();
        var searchEmail = $('#email').val();
        table.columns(name_column).search(searchName).draw();
        table.columns(email_column).search(searchEmail).draw();
    });
});