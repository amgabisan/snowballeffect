$(document).ready(function() {
    $('#users-list').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": [2, 3, 4] },
        ],
    });
} );
