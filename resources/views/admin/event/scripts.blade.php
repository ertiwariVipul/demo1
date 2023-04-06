<!-- form wizard -->
<script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/pages/jquery.steps.min.js') }}"></script>
<!-- Multiple Select -->
<script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/pages/select2.min.js') }}"></script>
<!-- Multiple Select -->
<script src="{{ asset(env('ADMIN_ASSETS_URL') . '/libs/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!-- form wizard init -->
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=MY_KEY&libraries=places&callback=initAutocomplete"></script>
<!-- Google Map -->


<script>
    // multiple value
    $('.create-event').on('shown.bs.modal', function() {
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
        $('.visa_date').attr('min', maxDate);
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
        "ajax": "{{ route('admin.event.list') }}",
        "columns": [{
                "data": "eventIndex",
                orderable: false,
            }, {
                "data": "name",
                render: function(data, type, row) {
                    var url = "{{ route('admin.event.eventDetails', '') }}" + "/" + row?.id;
                    return '<a href="' + url + '" class="max-w-s">' + row?.name + '</a>';
                }
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
                    var dt = new Date();
                    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
                    var date = dt.getDate()+"-"+(dt.getMonth() + 1)+"-"+dt.getFullYear()
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
    // $("#eventList").DataTable();


    // start form validation
    $('#form-event-admin').validate({
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
                required: "Event date is required.",
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

    // start step wizard initialed
    $(function() {
        renderStepWizard()
    });

    function renderStepWizard() {
        $("#form-event-admin").steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slide",
            saveState: false,
            labels: {
                current: "current step:",
                pagination: "Pagination",
                finish: "Save",
                next: "Next",
                previous: "Previous",
                loading: "Loading ..."
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                if (!$('#form-event-admin').valid()) {
                    return false;
                } else {
                    return true;
                }
            },
            onFinished: function() {
                if ($('#form-event-admin').valid()) {
                    storeEvent();
                    location.reload();
                    
                }
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
            url: "{{ route('admin.event.modelByCategory') }}",
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


    // Start store event
    function storeEvent() {
        var formData = new FormData(document.getElementById("form-event-admin"));
        $.ajax({
            url: "{{ route('admin.event.store') }}",
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
                    // $('#form-event-admin')[0].reset();                    
                    $("#create-event").modal('hide');
                    // eventTable.ajax.reload(false);
                } else {
                    toastr.error(data.ResponseText, "Error", {
                        timeOut: 1000
                    });
                }
            }
        });
    }
    // End store event

    // // Start Change Status
    // $('body').on('click', '.changeStatus', function(e) {
        
    //     const status = $(this).data('status');
    //     const id = $(this).data('id');
        
    //     var myArrayOfThings = [
    //         {
    //             id: 1,
    //             name: 'Approved'
    //         },
    //         {
    //             id: 2,
    //             name: 'Rejected'
    //         },
    //     ];

    //     var options = {};
    //     $.map(myArrayOfThings,
    //         function(o) {
    //             options[o.id] = o.name;
    //         });

    //     const {
    //         value: eventStatus
    //     } = Swal.fire({
    //         title: 'Select Status',
    //         // text: `You want to changes status?`,
    //         // icon: 'warning',
    //         input: 'select',
    //         inputPlaceholder: 'Select Event Status',
    //         inputOptions: options,
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, Change it!',
    //         cancelButtonText: 'Cancel',
    //         reverseButtons: true,
    //         inputValidator: function(response) {
    //             return new Promise(function(resolve, reject) {
    //                 if (response) {
    //                     changeStatus(id, response)
    //                 } else {
    //                     reject('You need to select event status');
    //                 }
    //             });
    //         },
    //     });
    //     // }
    // })
    
    // function changeStatus(id, response) {
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: "{{ route('admin.event.status') }}",
    //         method: 'POST',
    //         data: {
    //             'status': response,
    //             'id': id
    //         },
    //         success: function(data) {
    //             if (data.success) {
    //                 toastr.success(data.success);
    //                 swal.close();
    //             } else if (data.error) {
    //                 toastr.error(data.error);
    //             }
    //             eventTable.ajax.reload(false);
    //         }
    //     });
    // }
    // // End Change Status


    // start delete Event
    $('body').on('click', '.deleteEvent', function(e) {
        const id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: `You want to Delete?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!',
            cancelButtonText: 'No, Cancel it!',
            reverseButtons: true,
        }).then(async (result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.event.destroy', '') }}" + "/" + id,
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

        });
    });
    // end delete Event


    // start open edit form 
    $('body').on('click', '.editEvent', function(e) {
        const id = $(this).data('id');
        $.ajax({
            url: "{{ route('admin.event.edit', '') }}" + "/" +
                id,
            method: 'GET',
            success: function(response) {
                $('#create-title-event').html('Update Event');
                $('#event-edit').html(response);
                $('#create-event').modal('show');

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
                $('.visa_date').attr('min', maxDate);
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
        $('#form-event-admin')[0].reset();
        $('#create-event').modal('show');

    })

    // start range slider initiatied
    // $(document).ready(function() {
    //     renderRangeSlider()
    // });

    // Event Moedel Category 
    $(function() {
        $('.eventModelCategory').on('click', function(e) {
            e.preventDefault();
            let categoryId = $(this).data('id');
            let eventId = $(this).data('event');
            let url = "{{ route('admin.event.modelEventCategory', '') }}";
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: categoryId,
                    eventId: eventId,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log({
                        response
                    });
                    $('#modelDetails').html(response);
                }
            })
        })
    });

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

     // Start Change Status
     $(document).on('click','.changeStatus',function(e) {
        e.preventDefault();
        var ajaxurl = '{{ URL::to('admin/event/status') }}';
        var id = $(this).data('id');
        var value = $(this).data('value');
        // alert(id);
        Swal.fire({
            title: 'Select Type',
            input: 'select',
            inputOptions: {
            '0': 'Pending',
            '1': 'Approved',
            '2': 'Rejected'
            },
            inputPlaceholder: 'Please select status',
            title: 'Are you sure?',
            text: "you want to chnage this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Change it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        "id": id,
                        'status':result.value,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if(data.ResponseCode==0){
                            alert(data.ResponseText);
                        }else{

                            location.reload();
                            swal.close();
                        }
                    }

                });
                
            }
        })
    });
</script>
