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