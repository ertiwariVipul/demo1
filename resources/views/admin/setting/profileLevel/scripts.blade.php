<!-- form wizard -->
<script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/pages/jquery.steps.min.js') }}"></script>
<!-- form wizard init -->

{{-- <script src="{{ asset(env('ADMIN_ASSETS_URL') . '/js/pages/datatables.init.js') }}"></script> --}}

<script>
    $(document).ready(function() {
      
        
        var profileLevelTable = null;
        $.fn.dataTable.ext.errMode = 'none';
        profileLevelTable = $("#profileLevelList").DataTable({
            processing: false,
            pageLength: 10,
            aaSorting: [],
            responsive: true,
            serverSide: true,
            ordering: true,
            searching: true,
            "ajax": "{{ route('admin.profileLevelList') }}",
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "profile_name"
                },
                {
                    "data": "profile_desc"
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

        $(document).on('click', '.add_profile', function() {
            $("#AddProfileLevelModal").modal('show');
        });

        $('#add_profile_form').on('submit', function(e) {
            e.preventDefault();
            var form = $('#add_profile_form')[0];
            var formData = new FormData(form);
            $.ajax({
                type: 'post',
                url: "{{ route('admin.profile.add') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.ResponseCode === 1) {
                        toastr.success(data.ResponseText, "", {
                            timeOut: 1500
                        });
                        $("#AddProfileLevelModal").modal('hide');
                        profileLevelTable.ajax.reload(false);

                    } else {
                        toastr.error(data.ResponseText, "Error", {
                            timeOut: 1000
                        });
                    }
                }
            });
        });

        $(document).on('click', '.edit_profile', function() {
            var slug = $(this).data('slug');
            $.ajax({
                type: 'post',
                url: "{{ route('admin.profile.edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "slug": slug
                },
                success: function(data) {
                    var profileName = data.ResponseData.name;
                    var profileDesc = data.ResponseData.description;
                    var slug = data.ResponseData.slug;

                    $("#e_pl_name").val(profileName);
                    $("#e_pl_desc").val(profileDesc);
                    $("#e_pl_slug").val(slug);
                    $("#profileEditModal").modal('show');
                }
            });
        });

        $(document).on('click', '.deleteProfileLavel', function(e) {
            e.preventDefault();
            var slug = $(this).attr('data-slug');
            console.log(slug);
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
                        type: 'post',
                        url: "{{ route('admin.profile.delete') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: "json",
                        data: {
                            'slug': slug
                        },
                        success: function(data) {
                            location.reload();
                            toastr.clear();
                            if (data.ResponseCode === 1) {
                                toastr.success(data.ResponseText, "", {
                                    timeOut: 1500
                                });
                                profileLevelTable.ajax.reload(false);

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

        $('#edit_profile_form').on('submit', function(e) {
            e.preventDefault();
            var form = $('#edit_profile_form')[0];
            var formData = new FormData(form);
            $.ajax({
                type: 'post',
                url: "{{ route('admin.profile.update') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    if (data.ResponseCode === 1) {
                        toastr.success(data.ResponseText, "", {
                            timeOut: 1500
                        });
                        $("#profileEditModal").modal('hide');
                        profileLevelTable.ajax.reload(false);
                    } else {
                        toastr.error(data.ResponseText, "Error", {
                            timeOut: 1000
                        });
                    }
                }
            });
        });
    });
</script>
