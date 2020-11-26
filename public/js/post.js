/**
 * ready function
 */
$(document).ready(function () {
    var table = $('#post_list').DataTable({
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "bSearch": false,
        sDom: 'lrtip'
    });

    /**
     * search data in the Post list
     */
    $('#btnSearch').click(function () {
        var searchKey = $('#post_search').val();
        table.search(searchKey).draw();
    });
});

/**
 * delete for post
 */
$(document).ready(function () {
    $("#postInfo").modal({
        keyboard: true,
        backdrop: "static",
        show: false,

    }).on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget); // button the triggered modal
        var postId = button.data("id"); //data-id of button which is equal to id (primary key) of post
        var title = button.data("title");
        var description = button.data("description");
        var status = button.data("status");

        var modal = $(this);
        modal.find('#post_id').val(postId);
        modal.find('#post_title').val(title);
        modal.find('#post_description').val(description);
        if (status == 1) {
            modal.find('#post_status').val("Active");
        }else{
            modal.find('#post_status').val("NotActive");
        }
    });
});

/**
 * show the post details
 */
$(document).ready(function () {
    $("#post_details").modal({
        keyboard: true,
        backdrop: "static",
        show: false,

    }).on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget); // button the triggered modal
        var postId = button.data("id"); //data-id of button which is equal to id (primary key) of post
        var title = button.data("title");
        var description = button.data("description");
        var status = button.data("status");
        var created_at = button.data("created_at");
        var create_user_id = button.data("create_user_id");
        var updated_at = button.data("updated_at");
        var updated_user_id = button.data("updated_user_id");

        var modal = $(this);
        modal.find('#post_id').val(postId);
        modal.find('#post_title').val(title);
        modal.find('#post_description').val(description);
        if (status == 1) {
            modal.find('#post_status').val("Active");
        }else{
            modal.find('#post_status').val("NotActive");
        }
        modal.find('#post_created_date').val(created_at);
        if(create_user_id == 0){
            modal.find('#post_created_user').val("Admin");
        }else{
            modal.find('#post_created_user').val("User");
        }
        modal.find('#post_updated_date').val(updated_at);
        if(updated_user_id == 0){
            modal.find('#post_updated_user').val("Admin");
        }else{
            modal.find('#post_updated_user').val("User");
        }
    });
});

/**
 * clear input field in post edit blade
 */
$(document).ready(function (){
    document.getElementById("btn_clear").onclick = function() {
        myFunction()
    };

    function myFunction() {
        document.getElementById("title").value = "";
        document.getElementById("description").value = "";
    };
});
