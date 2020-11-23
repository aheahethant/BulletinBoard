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
 * ready function for user list
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

/**
 * user details
 */
$(document).ready(function () {
    $("#userInfo").modal({
        keyboard: true,
        backdrop: "static",
        show: false,

    }).on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget); // button the triggered modal
        var userId = button.data("id"); //data-id of button which is equal to id (primary key) of user
        var Name = button.data("name");
        var Type = button.data("type");
        var Email = button.data("email");
        var Phone = button.data("phone");
        var dob = button.data("dob");
        var Address = button.data("address");

        var modal = $(this);
        modal.find('#user_id').val(userId);
        modal.find('#user_name').val(Name);
        if(Type == 0){
            modal.find('#user_type').val("Admin");
        }else{
            modal.find('#user_type').val("User");
        }
        modal.find('#user_email').val(Email);
        modal.find('#user_phone').val(Phone);
        modal.find('#user_dob').val(dob);
        modal.find('#user_address').val(Address);
    }).on("hide.bs.modal", function (event) {
        $(this).find("#userDetails").html("");
    });
});
