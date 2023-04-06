<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Rixeragency.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block">
                    Design & Develop by Rixeragency
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- edit profile model -->
    <div class="modal fade text-left" id="userProfile" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="RditProduct">Edit Profile</label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="errors" style="color: red;"></div>
                <form method="post" id="editProfileForm" action="{{route('admin.profileEdit')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label>Full Name</label>
                        <div class="form-group">
                            <input type="text" placeholder="Enter your Name" class="form-control" name="userFullName"
                             value="{{@Auth::user()->fullName}}"   id="userFullName">
                        </div>
                        <label>Email</label>
                        <div class="form-group">
                            <input type="email" placeholder="Enter your email" class="form-control" name="userEmail"
                            value="{{@Auth::user()->email}}"   id="userEmail">
                        </div>
                        <label>Phone</label>
                        <div class="form-group">
                            <input type="number" placeholder="Enter your phone Number" class="form-control" name="userPhone"
                            value="{{@Auth::user()->phone}}"   id="userPhone">
                        </div>
                        <label>Image</label>
                        <div class="form-group">
                            <input class="form-control form-control-lg" name="image" id="imgInp"  type="file">
                        </div>
                        @if(@Auth::user()->profile)
                        <img id="inuptImage" class="inuptImage" src="{{ asset(env('USER_ASSETS_URL') . '/uploads/user/').'/'.@Auth::user()->profile }}" alt="your image" height="100px" width="100px"/>
                        @endif
                    </div>
                    <div id="errors"></div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-secondary " data-dismiss="modal" value="close">
                        <input type="submit" class="btn btn-primary " value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end edit profile model -->