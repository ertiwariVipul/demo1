<!-- Pagination -->
<script>
     var eventTable = null;
    eventTable = $("#eventList").DataTable({
        processing: true,
        pageLength: 10,
        aaSorting: [],
        responsive: true,
        serverSide: true,
        "autoWidth": true,
        ordering: true,
        searching: true,
        "ajax": "{{ route('admin.event.list') }}",
        "columns": [{
                "data": "eventIndex",
                orderable: false,
            }, {
                "data": "name",
                render: function(data,type,row) {
                    var url = "{{route('admin.event.eventDetails', '')}}"+ "/" + row?.id;
                    return '<a href="'+url+'" class="max-w-s">' + row?.name + '</a>';
                }
            },
            {
                "data": "location"
            },
            {
                "data": "noOfGirls",
                "width": "8%"
            },
            {
                "data": "date",
                "width": "8%"
            },
            {
                "data": "typeOfEvent",
                "width": "10%"
            },
            {
                "data": "status",
                orderable: false,
                render: function(data, type, row) {
                    let displayClass = '';
                    let displayText = '';
                    switch (row.status) {                        
                        case 1:
                            displayClass = 'badge-soft-success';
                            displayText = 'Approved';
                            break;
                        case 2:
                            displayClass = 'badge-soft-danger'
                            displayText = 'Rejected';
                            break;
                        default:
                            break;
                    }
                    return '<span class="badge ' + displayClass +
                        ' font-size-12 p-2 cursor-pointer changeStatus" data-id=' + row?.id +
                        ' data-status=' + row.status + '>' +
                        displayText +
                        '</span>';
                }

            },
        ],
        "initComplete": function(settings, json) {

        },
        columnDefs: [{
                responsivePriority: 1,
                targets: 0
            },
            {
                responsivePriority: 2,
                targets: -1
            }
        ]
    });
    $("#eventList").DataTable();
</script>
<!-- Pagination -->
