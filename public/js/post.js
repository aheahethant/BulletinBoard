/**
 * ready function
 */
$(document).ready(function () {
    var table = $('#post_list').DataTable({
        "bPaginate": false,
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
 * post details
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
    }).on("hide.bs.modal", function (event) {
        $(this).find("#postDetails").html("");
    });
});
