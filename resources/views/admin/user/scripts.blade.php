<!-- form wizard -->
<script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/pages/jquery.steps.min.js') }}"></script>
<script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/pages/select2.min.js') }}"></script>

<!-- form wizard init -->

<script>
    $(document).ready(function() {
        $("#userList").DataTable();
    });
    var eventTable = null;
    eventTable = $("#userList").DataTable({
        processing: false,
        pageLength: 10,
        aaSorting: [],
        responsive: true,
        serverSide: true,
        ordering: true,
        searching: true,
        "ajax": "{{ route('admin.userList') }}",
        "columns": [{
                "data": "index"
            },
            {
                "data": "user_name"
            },
            {
                "data": "user_email"
            },
            {
                "data": "phone_number"
            },
            {
                "data": "user_country"
            },
            {
                "data": "user_city"
            },
            {
                "data": "subscriptionPlan"
            },
            {
                "data": "action"
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

    // edit category 
    $(function(){
        $(document).on('click','#editUserDetail',function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var url = '{{route('admin.user.edit')}}';
            $.ajax({
                url:url,
                data:{
                    id:id,
                },
                type:'get',
                success:function(data){
                    $('#editUserId').val(data.id);
                    $('#editUserName').val(data.fullName);
                    $('#editUserEmail').val(data.email);
                    $('#editUserPhone').val(data.phone);
                    $('#editUserCountry').val(data.country);
                    $('#editUserCity').val(data.city);
                    $('#editUserProfile').val(data.subscriptionPlan);
                }
            });
        });

        // update user details 
        $('#editUserForm').on('submit',function(event){
            event.preventDefault();
            var formData = new FormData(this);
            var url = '{{route('admin.user.update')}}';
            $.ajax({
                url:url,
                data:formData,
                type:'post',
                processData:false,
                contentType:false,
                success:function(data){
                $('.edit-user').modal('hide');
                if (data.ResponseCode === 1) {
                        toastr.success(data.ResponseText, "Success", {
                            timeOut: 1500
                        });
                    location.reload();

                    } else {
                        toastr.error(data.ResponseText, "Error", {
                            timeOut: 1000
                        });
                    }
                }
            });
        });
    });

    
    // delete user 
$('body').on("click", ".delete-user", function() {

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
                url: "{{ route('admin.user.delete') }}",
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

                       location.reload();

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

</script>
