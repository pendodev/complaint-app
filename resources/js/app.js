require('alpinejs');
/** Global Install jQuery **/
import $ from 'jquery';
import moment from 'moment';

window.jQuery = window.$ = $;
import DataTable from  'datatables.net';

$(document).ready(function() {
    let table = $('#example').DataTable({
        "sDom": '<"top"i>rt<"bottom"lp><"clear">',
        "ajax": '/complaints',
        "scrollY": "600px",
        'columns': [
            { data: "date", title: 'Date', render: function (data, type, row) {
                return moment(data).calendar(null);
            }},
            { data: "client_name", title: 'Client Name' },
            { data: "type", title: 'Complaint Type' },
            { data: "person", title: 'Complaint Person' },
            { data: "job_title", title: 'Job Title' },
            { data: "author", title: 'Complaint Person Name' },
            { data: "message", title: 'Complaint', width: '30%'},
            { data: "submitted_by", title: 'Submitted By' },
            { data: "created_at", title: 'Submitted At', render: function (data, type, row) {
                return moment(data).calendar(null);
            }}
        ]
    });
    $('body').on('keyup', '#search-input', function () {
        console.log('Search', $(this).val());
        table.search($(this).val()).draw();
    });
} );
