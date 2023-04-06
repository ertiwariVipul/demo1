<!-- form wizard -->
<script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/pages/jquery.steps.min.js') }}"></script>
<!-- form wizard init -->

<!-- Multiple Select -->
<script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/pages/ add ..min.js') }}"></script>
<!-- Multiple Select -->

<script>
    $(document).ready(function() {
        $("#modelList").DataTable();
    });

    // Multiple selection 
    $('.create-model').on('shown.bs.modal', function() {
        $(".select2").select2();
    });

    $('#edit-model-modal').on('shown.bs.modal', function() {
        $(".select2").select2();
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

    // Datatable for lising
    var modelTable = null;
    $.fn.dataTable.ext.errMode = 'none';
    modelTable = $("#modelList").DataTable({
        processing: false,
        pageLength: 10,
        aaSorting: [],
        responsive: true,
        serverSide: true,
        ordering: true,
        searching: true,
        "ajax": "{{ route('admin.model.list') }}",
        "columns": [{
                "data": "index"
            },
            {
                "data": "model_name"
            },
            {
                "data": "email_address"
            },
            {
                "data": "mobile_phone",
                orderable: false
            },
            {
                "data": "country",
            },
            {
                "data": "city",
            },
            {
                "data": "profile_level",
            },
            {
                "data": "status",
            },
            {
                "data": "action",
                orderable: false
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

    jQuery.validator.addMethod("isFullname", function(value, element) {
        if (/^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/.test(value)) {
            return true;
        } else {
            return false;
        };
    });

    jQuery.validator.addMethod("isValidEmail", function(value, element) {
        if (/^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value)) {
            return true;
        } else {
            return false;
        };
    });

    jQuery.validator.addMethod("isValidMobile", function(value, element) {
        if (/^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/.test(value)) {
        
        // if (/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/i.test(value)) {
            return true;
        } else {
            return false;
        };
    });

    $('#form-model').validate({
        rules: {
            fullName: {
                required: true,
                isFullname: true,
            },
            email: {
                required: true,
                isValidEmail: true,
            },
            mobile: {
                required: true,
                isValidMobile: true,
            },
            category: {
                required: true,
            },
            profileLevel: {
                required: true,
            },
            country: {
                required: true,
            },
            city: {
                required: true,
            },
            height: {
                required: true,
            },
            weight: {
                required: true,
            },
            hair: {
                required: true,
            },
            eyecolor: {
                required: true,
            },
            waist: {
                required: true,
            },
            hips: {
                required: true,
            },
            bust: {
                required: true,
            },
            "visa[]": {
                required: true,
            },
            "visa_date[]": {
                required: true,
            },
            "modelImage[]": {
                required: true,
            }
        },
        messages: {
            fullName: {
                required: "Full name is required.",
                isFullname: "Invalid Name you entered."
            },
            email: {
                required: "Email is required.",
                isValidEmail: "Invalid email you entered."
            },
            mobile: {
                required: "Mobile No. is required.",
                isValidMobile: "Invalid mobile no. you entered.",
            },
            category: {
                required: "Category is required.",
            },
            profileLevel: {
                required: "Profile Level is required.",
            },
            country: {
                required: "Country is required.",
            },
            city: {
                required: "Country is required.",
            },
            height: {
                required: "This field is required.",
            },
            weight: {
                required: "This field is required.",
            },
            hair: {
                required: "This field is required.",
            },
            eyecolor: {
                required: "This field is required.",
            },
            waist: {
                required: "This field is required.",
            },
            hips: {
                required: "This field is required.",
            },
            bust: {
                required: "This field is required.",
            },
            "visa[]": {
                required: "This field is required.",
            },
            "visa_date[]": {
                required: "This field is required.",
            },
            "modelImage[]": {
                required: "This field is required.",
            },
        },
    });

    // Tabing for adding model 
    $(function() {
        $("#form-model").steps({
            headerTag: "h3",
            bodyTag: "fieldset",
            transitionEffect: "slide",
            labels: {
                current: "current step:",
                pagination: "Pagination",
                finish: "Submit",
                next: "Next",
                previous: "Previous",
                loading: "Loading ..."
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                if (!$('#form-model').valid()) {
                    return false;
                } else {
                    return true;
                }
            },
            onFinished: function() {
                if ($('#form-model').valid()) {
                    addModel();
                    // location.reload();
                }
            }
        });
    });

    function addModel() {

        // return;
        var fd = new FormData(document.getElementById("form-model"));

        // $('.lds-roller-wrapper').show();
        $.ajax({
            url: "{{ route('admin.model.store') }}",
            method: 'POST',
            data: fd,
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

                    $("#create-model").modal('hide');
                    location.reload();
                    // modelTable.ajax.reload(false);

                } else {
                    toastr.error(data.ResponseText, "Error", {
                        timeOut: 1000
                    });
                }
            }
        });

    }
    // Add visa of model 
    let i = 1;
    $('body').on("click", "#add-visa", function() {
        if ($('#form-model').valid()) {
            let html = `
            <div class="row" id="visa_detail_${i}">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Visa</label>
                        <input type="text" class="form-control" name="visa[]" id="visa_${i}" placeholder="Country" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Expiry Date</label>
                        <input type="date" class="form-control" name="visa_date[]" id="visa_date_${i}"  placeholder="Expiry Date" />
                    </div>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-light mt-4 d-block w-100 remove-visa" id="minus-visa-${i}" data-id="${i}" type="button">Remove</button>
                </div>
            </div>`;
            $('.add-visa-event').append(html)
        }
        i++;
    });


    // Add remove of model 
    $('body').on("click", ".remove-visa", function() {
        let id = $(this).attr('data-id');
        $('#visa_detail_' + id).remove();
    });

    // Delete Model 
    $('body').on("click", ".delete-model", function() {

        slug = $(this).attr('data-slug');
        id = $(this).attr('data-id');
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
                    url: "{{ route('admin.model.delete') }}",
                    method: 'POST',
                    data: {
                        "slug": slug,
                        "id": id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.ResponseCode === 1) {
                            toastr.success(data.ResponseText, "Success", {
                                timeOut: 1500
                            });

                            modelTable.ajax.reload(false);

                        } else {
                            toastr.error(data.ResponseText, "Error", {
                                timeOut: 1000
                            });
                        }
                    },
                    error: function(data) {
                        toastr.error(data.ResponseText, "Error", {
                            timeOut: 1000
                        });
                    }
                });
            }
        });
    });

    // Fetch deatils for edit model
    $('body').on("click", ".edit-model", function() {
       
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: "{{ route('admin.model.edit') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "id": id,
            },
            success: function(data) {

                /* Hide Past Date */
                var dtToday = new Date();
    
                var month = dtToday.getMonth() + 1;
                var day = dtToday.getDate();
                var year = dtToday.getFullYear();
                if(month < 10)
                    month = '0' + month.toString();
                if(day < 10)
                day = '0' + day.toString();
                var maxDate = year + '-' + month + '-' + day;
                $('.visa-date').attr('min', maxDate);
                /* Hide Past Date */
                
                // Tabing for edit model form start 
                $(function() {
                    $("#edit-model-form").steps({
                        headerTag: "h3",
                        bodyTag: "fieldset",
                        transitionEffect: "slide",
                        labels: {
                            current: "current step:",
                            pagination: "Pagination",
                            finish: "Submit",
                            next: "Next",
                            previous: "Previous",
                            loading: "Loading ..."
                        },
                        onStepChanging: function(event, currentIndex, newIndex) {
                            if (!$('#edit-model-form').valid()) {
                                return false;
                            } else {
                                return true;
                            }
                        },
                        onFinished: function() {
                            if ($('#edit-model-form').valid()) {
                                editModel();
                                location.reload();
                            }
                        }
                    });
                });


                // Tabing for edit model form end 
                $("#model_edit_form").html(data.html);
            }
        });

    });

    // Validation for edit model 
    $('#edit-model-form').validate({
        rules: {
            fullName: {
                required: true,
                isFullname: true,
            },
            email: {
                required: true,
                isValidEmail: true,
            },
            mobile: {
                required: true,
                isValidMobile: true,
            },
            category: {
                required: true,
            },
            profileLevel: {
                required: true,
            },
            country: {
                required: true,
            },
            city: {
                required: true,
            },
            height: {
                required: true,
            },
            weight: {
                required: true,
            },
            hair: {
                required: true,
            },
            eyecolor: {
                required: true,
            },
            waist: {
                required: true,
            },
            hips: {
                required: true,
            },
            bust: {
                required: true,
            },
            "visa[]": {
                required: true,
            },
            "visa_date[]": {
                required: true,
            },
            "modelImage[]": {
                required: true,
            }
        },
        messages: {
            fullName: {
                required: "Full name is required.",
                isFullname: "Invalid Name you entered."
            },
            email: {
                required: "Email is required.",
                isValidEmail: "Invalid email you entered."
            },
            mobile: {
                required: "Mobile No. is required.",
                isValidMobile: "Invalid mobile no. you entered.",
            },
            category: {
                required: "Category is required.",
            },
            profileLevel: {
                required: "Profile Level is required.",
            },
            country: {
                required: "Country is required.",
            },
            city: {
                required: "Country is required.",
            },
            height: {
                required: "This field is required.",
            },
            weight: {
                required: "This field is required.",
            },
            hair: {
                required: "This field is required.",
            },
            eyecolor: {
                required: "This field is required.",
            },
            waist: {
                required: "This field is required.",
            },
            hips: {
                required: "This field is required.",
            },
            bust: {
                required: "This field is required.",
            },
            "visa[]": {
                required: "This field is required.",
            },
            "visa_date[]": {
                required: "This field is required.",
            },
            "modelImage[]": {
                required: "This field is required.",
            },
        },
    });

    function editModel() {

        var fd = new FormData(document.getElementById("edit-model-form"));

        $.ajax({
            url: "{{ route('admin.model.update') }}",
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            success: function(data) {
                if (data.ResponseCode === 1) {
                    toastr.success(data.ResponseText, "Success", {
                        timeOut: 1500
                    });

                    $("#edit-model-modal").modal('hide');
                    modelTable.ajax.reload(false);

                } else {
                    toastr.error(data.ResponseText, "Error", {
                        timeOut: 1000
                    });
                }
            }
        });
    }

    var count=0;
    function handleFileSelect(evt) {
        var $fileUpload = $("input#upload[type='file']");
        count = count+parseInt($fileUpload.get(0).files.length);
        
        if (count < $fileUpload.get(0).files.length) {
            alert("You can only upload a maximum of 5 files");
            count = count-parseInt($fileUpload.get(0).files.length);
            evt.preventDefault();
            evt.stopPropagation();
            return false;
        }
    

        var files = evt.target.files;
        for (var j = 0, f; f = files[j]; j++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();

            reader.onload = (function (theFile) {
                return function (e) {
                    var span = document.createElement('span');
                    var innerHTML = [`<div class='model-images'>
                                        <img src='${e?.target?.result}' title='${escape(theFile.name)}'/>
                                        <input type="button" class="btn-close img-delete" id="`+ j +`" data-name="${escape(theFile.name)}" value="X">
                                    </div>`].join('');
                    // document.getElementById('upload-span').insertBefore(span, null);
                    $('#model-image').append(innerHTML);
                };
            })(f);

            reader.readAsDataURL(f);
        }
    }
	
	$('body').on("change", "#upload", function(evt) {       
		handleFileSelect(evt);
	});	
    
    $('body').on('click', '.img-delete',function () {
		$(this).parent('.model-images').remove();
        var imageName = $(this).data("name");
        var removeImage = `<input type="hidden" name="removeValue[]" value="${imageName}"/>`;
        $(".removeValue").append(removeImage);
        // alert(imageName);
        count--;        
        console.log(count);
	});

    var count1=0;
    function handleFileSelect_edit(evt1) {
        var $fileUpload = $("input#editModelImage[type='file']");
        count1 = count1+parseInt($fileUpload.get(0).files.length);
        
        if (count1 < $fileUpload.get(0).files.length) {
            alert("You can only upload a maximum of 5 files");
            count1 = count1-parseInt($fileUpload.get(0).files.length);
            evt1.preventDefault();
            evt1.stopPropagation();
            return false;
        }
    

        var files = evt1.target.files;
        for (var k = 0, f; f = files[k]; k++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();

            reader.onload = (function (theFile) {
                return function (e1) {
                    var span = document.createElement('span');
                    var innerHTML = [`<div class='model-images'>
                                        <img src='${e1?.target?.result}' title='${escape(theFile.name)}'/>
                                        <input type="button" class="btn-close img-delete" id="`+ k +`" data-name="${escape(theFile.name)}" value="X">
                                    </div>`].join('');
                    // document.getElementById('upload-span').insertBefore(span, null);
                    $('#model-image-edit').append(innerHTML);
                };
            })(f);

            reader.readAsDataURL(f);
        }
    }

    $('body').on("change", "#editModelImage", function(evt1) {       
		handleFileSelect_edit(evt1);
	});	 

    // Start Change Status
    $(document).on('click','.changeModelStatus',function(e) {
        e.preventDefault();
        var ajaxurl = '{{ URL::to('admin/model/status') }}';
        var id = $(this).data('id');
        var value = $(this).data('value');
        Swal.fire({
            title: 'Select Type',
            input: 'select',
            inputOptions: {
            '0': 'Pending',
            '1': 'Accepted',
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
                        // alert(data);
                        location.reload();
                        swal.close();
                    }

                });
                
            }
        })
    });

    // delete edit model preview image 
    $(function(){
        $(document).on('click','.deleteImage',function () {
		$(this).parent('.model-images').remove();
        var imageName = $(this).data("name");
        var removeImage = `<input type="hidden" name="removeValue[]" value="${imageName}"/>`;
        $(".removeValue").append(removeImage);
	});
    })
</script>
