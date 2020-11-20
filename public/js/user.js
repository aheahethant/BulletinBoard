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
    
    $("#userInfo").on("show.bs.modal", function(e) {
        var id = $(e.relatedTarget).data('id');
        var name = $(e.relatedTarget).data('name');
        var type = $(e.relatedTarget).data('type');
        var email = $(e.relatedTarget).data('email');
        var phone = $(e.relatedTarget).data('phone');
        var dob = $(e.relatedTarget).data('dob');
        var address = $(e.relatedTarget).data('address');
        $.get("{{route('detail_user')}}" + id + name + type + email + phone + dob + address, function(
            data) {
            $(".modal-body").html(data);
        });
    });
});