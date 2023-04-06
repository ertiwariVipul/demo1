<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $("#category-list").DataTable();

    // add category validation
    $('#category_form').validate({
        rules: {
            categoryname: {
                required: true,
                lettersonly: true
            },
            image: {
                required: true,
                extension: "jpg|jpeg|png|ico|bmp|svg|gif"
            },
        },
        messages: {
            category_name: {
                required: "Please enter category name",
                lettersonly: "letters only"
            },
            image: {
                required: "Please Choose Image",
                extension: "Please add in these format only(jpg,jpeg,png,ico,bmp,svg,gif)."
            },
        },
    });

    // add category 
    $('#category_form').on('submit', function(e) {
        e.preventDefault();
        var fd = new FormData(this);
        var url = '{{ URL::to('/admin/setting/category/store') }}';
        // alert(url);
        $.ajax({
            url: url,
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#category').modal('hide');
                location.reload();
            },
            error: function(response) {
                $('.loader').hide();

            }
        });
    });

    // set edit category

    $(document).on('click','.edit',function(e){
        e.preventDefault();
       var id = $(this).data('id');
       var url = '{{URL::to('admin/setting/category/edit')}}';
       $.ajax({
            url:url,
            type:'get',
            data:{
                id:id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                $('#edit_categoryId').val(data.id);
                $('.editcategory').modal('show');
                $('#e_categoryName').val(data.name);
                $('#e_categoryDescription').val(data.description);
                $('#e_categoryQuote').val(data.quote);
                const imageUrl ="{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/models/') }}" + "/" +data.image;
                imageHtml = "<img src='" + imageUrl + "' alt='' height='100px' width='100px'/>";
                if(data.image){

                    $('#e_categoryImage').html(imageHtml);
                }
            }
       })
    });

    // Start edit Category Validation         
    $('#edit_category_form').validate({
        rules: {
            category_name1: {
                required: true,
                lettersonly: true
            },
            image1: {
                required: true,
                extension: "jpg|jpeg|png|ico|bmp|svg|gif"
            },
        },
        messages: {
            category_name1: {
                required: "Please choose category name",
                lettersonly: "letters only"
            },
            image1: {
                required: "Please choose Image",
                extension: "Please add in these format only(jpg,jpeg,png,ico,bmp,svg,gif)."
            },
        },
    });
    // end get Category Validation  

    //update category using ajax start

    $('#edit_category_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#edit_category_form').valid()) {
            var form = $('#edit_category_form')[0];
            var formData = new FormData(form);
            var url = '{{ URL::to('admin/setting/category/update') }}';
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#edit_category').modal('hide');
                    location.reload();
                    if (data.ResponseCode === 1) {
                        toastr.success(data.ResponseText, "Success", {
                            timeOut: 30000
                        });

                    } else {
                        toastr.error(data.ResponseText, "Error", {
                            timeOut: 1000
                        });
                    }
                },
            });
        }
    });

    //update category using ajax end

    // delete category

    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        var url = '{{ URL::to('admin/setting/category/delete') }}';
        Swal.fire({
            title: 'Are you sure?',
            text: "you want to delete this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        "id": id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        location.reload();
                        if (data.ResponseCode === 1) {
                            toastr.success(data.ResponseText, "Success", {
                                timeOut: 1500
                            });

                        } else {
                            toastr.error(data.ResponseText, "Error", {
                                timeOut: 1000
                            });
                        }
                    }

                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });

    // change category status 

    $(document).ready(function() {
        $('.category_status').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var ajaxurl = '{{ URL::to('admin/setting/category/status') }}';
            Swal.fire({
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
                            "id": id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            // alert(data);
                            location.reload();
                        }

                    });
                    Swal.fire(
                        'Changed!',
                        'Your file has been changed.',
                        'success'
                    )
                }
            })
        })
    })

    // image input 
    $('#inuptImage').hide();
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#inuptImage').show();
                $('#inuptImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

</script>
