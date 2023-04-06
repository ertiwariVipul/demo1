<script>
        // validation form 
        jQuery.validator.addMethod("user_email", function(value, element) {
            if (/^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value)) {
                return true;
            } else {
                return false;
            };
        });

        jQuery.validator.addMethod("user_name", function(value, element) {
            if (/^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/.test(value)) {
                return true;
            } else {
                return false;
            };
        });

        $('#user_register_form').validate({
            rules: {
                user_name: {
                    required: true,
                    user_name: true,
                },
                user_email: {
                    required: true,
                    user_email: true,
                },
                password: {
                    required: true,
                },
            
            },
            messages: {
                user_name: {
                    required: "This field is required.",
                    user_name: "Please enter full name."
                },
                user_email: {
                    required: "This field is required.",
                    user_email: "Invalid email you entered."
                },
                password: {
                    required: "This field is required.",
                },
            
            },
        });
        
        // submit form 
        $(document).on('submit','#user_register_form',function(event){
            event.preventDefault();
            var formdata = new FormData(this);
            var url = '{{URL::to('/signup')}}';
            $.ajax({
                url:url,
                type:'post',
                data:formdata,
                processData: false,
                contentType: false,
                success:function(data){
                    if(data.ResponseCode==1){
                        console.log(data.ResponseText);
                        var home_url = '{{URL::to('/user')}}';
                        window.location = home_url;
                    }else{
                        toastr.error(data.ResponseText, "Error", {
                            timeOut: 1000
                        });
                    }
                }
            });
        });
</script>