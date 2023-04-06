<!-- form wizard -->
<script src="{{ asset(env('USER_ASSETS_URL') . '/js/pages/jquery.steps.min.js') }}"></script>
<script src="{{ asset(env('USER_ASSETS_URL') . '/js/pages/select2.min.js') }}"></script>
<script src="{{ asset(env('USER_ASSETS_URL') . '/libs/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- form wizard init -->
<script>

    $('#create-event-user').on('shown.bs.modal', function() {
        $(".storeMultiple").select2();
    });

    $(function(){
        var dtToday = new Date();
    
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
        day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('.event-date').attr('min', maxDate);
    });

    
    $('#create-event-user').on('hidden.bs.modal', function () {
        location.reload();
    });

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
        fixedColumns: true,
        "ajax": "{{ route('user.event.list') }}",
        "columns": [{
                "data": "eventIndex",
                orderable: false,
            }, {
                "data": "name",
            },
            {
                "data": "location",
                render: function(data) {
                    return '<span class="max-w-s">' + data + '</span>';
                }
            },
            {
                "data": "noOfGirls",
                render: function(data) {
                    return '<span class="max-w-s">' + data + '</span>';
                }
            },
            {
                "data": "date"
            },
            {
                "data": "typeOfEvent",
                render: function(data) {
                    return '<span class="max-w-s">' + data + '</span>';
                }
            },
            {
                "data": "description",
                orderable: false,
                render: function(data) {
                    return '<span class="max-w-l">' + data + '</span>';
                }
            },
            {
                "data": "status",
                orderable: false,
                render: function(data, type, row) {
                    let displayClass = '';
                    let displayText = '';
                    switch (row.status) {
                        case 0:
                            displayClass = 'badge-soft-warning';
                            displayText = 'Pending';                                                  
                            break;
                        case 1:
                            displayClass = 'badge-soft-success';
                            displayText = 'Approved';                                                  
                            break;
                        case 2:
                            displayClass = 'badge-soft-danger'
                            displayText = 'Rejected';    
                            break;
                        case 3:
                            displayClass = 'badge-soft-success'
                            displayText = 'Completed';    
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
            {
                "data": "action",
                orderable: false,
                render: function(data, type, row) {
                    let renderHtml = '<div class="d-flex">';
                    renderHtml +=
                        '<a class="btn btn-success btn-sm editEvent" id="editEvent" data-id=' + row.id +
                        '><i class="bx bx-pencil text-white"></i></a>';
                    renderHtml +=
                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteEvent" data-id=' +
                        row?.id + '><i class="bx bx-trash-alt"></i></a>'
                    renderHtml += "</div>";
                    return renderHtml;
                }
            }
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


    // start form validation
    $('#form-event').validate({
        rules: {
            name: {
                required: true,
            },
            typeOfEvent: {
                required: true,
            },
            date: {
                required: true,
            },
            startTime: {
                required: true,
            },
            endTime: {
                required: true,
            },
            location: {
                required: true,
            },
            description: {
                required: true,
            },
            category: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Event Name is required.",
            },
            typeOfEvent: {
                required: "Type of event is required.",
            },
            date: {
                required: "Event Name is required.",
            },
            startTime: {
                required: "Start time is required.",
            },
            endTime: {
                required: "End time is required.",
            },
            location: {
                required: "Location is required.",
            },
            description: {
                required: "Description is required.",
            },
            category: {
                required: "Category is required.",
            },
        },
    });
    // end form validation

    // Start store event
    function storeEvent() {
        var formData = new FormData(document.getElementById("form-event"));
        $.ajax({
            url: "{{ route('user.event.store') }}",
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.ResponseCode === 1) {
                    toastr.success(data.ResponseText, "Success", {
                        timeOut: 1500
                    });
                    // $('#form-event')[0].reset();
                    // eventTable.ajax.reload(false);
                    $("#create-event-user").modal('hide');
                } else {
                    toastr.error(data.ResponseText, "Error", {
                        timeOut: 1000
                    });
                }
            }
        });
    }
    // End store event
    
    // start step wizard initialed
    $(function() {
        renderStepWizard()
    });

    function renderStepWizard() {
        $("#form-event").steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slide",
            saveState: false,
            labels: {
                current: "current step:",
                pagination: "Pagination",
                finish: "Save",
                next: "Go to Model Selection",
                previous: "Previous",
                loading: "Loading ..."
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                if (!$('#form-event').valid()) {
                    return false;
                } else {
                    return true;
                }
            },
            onFinished: function() {
                if ($('#form-event').valid()) {
                    storeEvent();
                    location.reload();                }
            }
        });
    }
    // end step wizard initialed


    // Start On change Category
    $(document).on('change', '#category', function(e) {
        e.preventDefault();
        const id = $(this).val();
        if (id?.length == 0) {
            $('#model_image').html('');
            return;
        }
        $.ajax({
            url: "{{ route('user.event.modelByCategory') }}",
            type: 'GET',
            data:{
                categoryId:id,
            },
            success: function(response) {
                let imageHtml = '';
                for (let index = 0; index < response?.length; index++) {

                    var userId = response[index]?.user?.id ;

                    const url = "{{route('modelProfile','')}}"+"/"+userId;

                    const imageUrl =
                        "{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/models/') }}" + "/" +
                        response[index]['user']['model_images']?.image;
                    imageHtml += '<div>';
                    imageHtml += "<div class='image-wrapper'>";
                    imageHtml += '<div class="custom-checkbox-wrap">';
                    imageHtml += '<div class="custom-checkbox">';
                    imageHtml +=
                        `<input type="checkbox" class="custom-checkbox-input modelCheckBox" id="model-${index}" value="${response[index]?.user?.id}">`
                    imageHtml +=
                        `<label class="custom-checkbox-label" for="model-${index}"></label>`
                    imageHtml += '</div>';
                    imageHtml += '</div>';
                    imageHtml +=
                        `<img src='${imageUrl}' alt='${response[index]?.user?.fullName}'/>`
                        imageHtml += '<div class="view-details-wrap">';
                     imageHtml += '<span>';
                     imageHtml += '<i class="bx bx-info-circle"></i>';
                    imageHtml += '</span>';
                     imageHtml += `<a href="${url}" target="_blank">View Details</a>`
                     imageHtml += '</div>';
                     imageHtml += '</div>';
                    imageHtml +=
                        `<span class="text-break"> ${response[index]?.user?.fullName}</span>`
                    imageHtml += '</div>';
                }
                $('#model_image').html(imageHtml);
            }
        })
    });
    // End On change Category

    // Start on change model checkbox
    $('body').on('change', '.modelCheckBox', function(e) {
        e.preventDefault();
        let selectedValue = [];
        $(".modelCheckBox:checked").each(function() {
            selectedValue.push($(this).val());
        });
        $('#event-no-of-girls').val(selectedValue?.length);
        const models = selectedValue.filter((value, index, self) => self.indexOf(value) === index);
        $('#model-ids').val(models);
    })
    // End on change model checkbox

    // start delete Event
     $('body').on('click', '.deleteEvent', function(e) {
        const id = $(this).data('id');
        // alert(id);
        Swal.fire({
            title: 'Are you sure?',
            text: `You want to Delete?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!',
            cancelButtonText: 'No, Cancel it!',
            reverseButtons: true
        }).then(async (result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('user.event.destroy', '') }}" + "/" + id,
                    method: 'DELETE',
                    success: function(data) {
                        if (data.success) {
                            toastr.success(data.success);
                        } else if (data.error) {
                            toastr.error(data.error);
                        }
                        eventTable.ajax.reload(false);
                    }
                })
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                toastr.error('You have decline to delete');
            }

        })
    })
    // end delete Event

        // start range slider initiatied
        $(document).ready(function() {
        $("#age-range").ionRangeSlider({
            // skin: "big",
            type: "double",
            grid: false,
            min: 0,
            max: 100,
            from: 10,
            to: 50,
            onChange: function(data) {
                var v1 = data.from;
                var v2 = data.to;
                var id = $(this).data('id');
                var categoryId = $('#category').val();
                let url = "{{ route('admin.event.modelByCategory') }}";
                $.ajax({
                    url: url,
                    type: 'get',
                    data: {
                        categoryId:categoryId,
                        value1: v1,
                        value2: v2,
                    },
                    success: function(response) {
                        let imageHtml = '';
                for (let index = 0; index < response?.length; index++) {

                    var userId = response[index]?.user?.id ;

                    const url = "{{route('modelProfile','')}}"+"/"+userId;

                    const imageUrl =
                        "{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/models/') }}" + "/" +
                        response[index]['user']['model_images']?.image;
                    imageHtml += '<div>';
                    imageHtml += "<div class='image-wrapper'>";
                    imageHtml += '<div class="custom-checkbox-wrap">';
                    imageHtml += '<div class="custom-checkbox">';
                    imageHtml +=
                        `<input type="checkbox" class="custom-checkbox-input modelCheckBox" id="model-${index}" value="${response[index]?.user?.id}">`
                    imageHtml +=
                        `<label class="custom-checkbox-label" for="model-${index}"></label>`
                    imageHtml += '</div>';
                    imageHtml += '</div>';
                    imageHtml +=
                        `<img src='${imageUrl}' alt='${response[index]?.user?.fullName}'/>`
                        imageHtml += '<div class="view-details-wrap">';
                     imageHtml += '<span>';
                     imageHtml += '<i class="bx bx-info-circle"></i>';
                    imageHtml += '</span>';
                     imageHtml += `<a href="${url}" target="_blank">View Details</a>`
                     imageHtml += '</div>';
                     imageHtml += '</div>';
                    imageHtml +=
                        `<span class="text-break"> ${response[index]?.user?.fullName}</span>`
                    imageHtml += '</div>';
                }
                $('#model_image').html(imageHtml);
                }
                });
            }
        });
    });
    // end range slider initiatied

    // start open edit form 
    $('body').on('click', '.editEvent', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        $.ajax({
            url: "{{ route('user.event.edit', '') }}" + "/" +
                id,
            method: 'GET',
            success: function(response) {
                $('#create-title-event').html('Update Event');
                $('#event-edit').html(response);
                $('#create-event-user').modal('show');

                 /* Hide past date */
                var dtToday = new Date();
    
                var month = dtToday.getMonth() + 1;
                var day = dtToday.getDate();
                var year = dtToday.getFullYear();
                if(month < 10)
                    month = '0' + month.toString();
                if(day < 10)
                day = '0' + day.toString();
                var maxDate = year + '-' + month + '-' + day;
                $('.event-date').attr('min', maxDate);
                 /* Hide past date */

                renderStepWizard();
                renderRangeSlider();
                // location.reload();
            },
            error: function(request, status, error) {
                toastr.error(error);
            }
        })

    });
    // end open edit form 

    $('body').on('click', '#create-event-btn', function(e) {
        $('#form-event')[0].reset();
        $('#create-event-user').modal('show');

    })

   

    // start range slider initiatied
    // $(document).ready(function() {
    //     renderRangeSlider()
    // });
</script>