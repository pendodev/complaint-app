require('alpinejs');

/** Global Install jQuery **/
import $ from 'jquery';

window.jQuery = window.$ = $;
import DataTable from  'datatables.net';

$(document).ready(function() {
    let table = $('#example').DataTable({
        "sDom": '<"top"i>rt<"bottom"lp><"clear">',
        "ajax": '/complaints',
        'columns': [
            { data: "date" },
            { data: "client_name" },
            { data: "type" },
            { data: "person" },
            { data: "job_title" },
            { data: "author" },
            { data: "message" },
        ]
    });
    $('body').on('keyup', '#search-input', function () {
        console.log('Search', $(this).val());
        table.search($(this).val()).draw();
    });
} );
