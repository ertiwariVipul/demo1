
<script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/jquery.smartWizard.min.js') }}"></script>
<script>

// form validation 
$('#modelApplyForm').validate({
    rules: {
            fullName: {
                required: true,
                // isFullname: true,
            },
            email: {
                required: true,
                // isValidEmail: true,
            },
            mobile: {
                required: true,
                // isValidMobile: true,
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
            'language[]':{
                required:true,
            },
            dress_size:{
                required: true,
            }
        },
        messages: {
            fullName: {
                required: "Full name is required.",
                // isFullname: "Invalid Name you entered."
            },
            email: {
                required: "Email is required.",
                // isValidEmail: "Invalid email you entered."
            },
            mobile: {
                required: "Mobile No. is required.",
                // isValidMobile: "Invalid mobile no. you entered.",
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
                required: "City is required.",
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
            'language[]':{
                required: "This field is required.",
            },
            dress_size:{
                required: "This field is required.",
            }
        },
});

$(function() {
    // SmartWizard initialize
    $("#smartwizard").smartWizard({
        theme: "dots",
        lang: {
            // Language variables for button
            next: "Go to body details",
            previous: "Go back"
        },
        toolbar: {
            showNextButton: false,
            showPreviousButton: false
        }
    });
});

$(".smartWizardNext").click(function(e) {
    e.preventDefault();
    if ($('#modelApplyForm').valid()) {
        $("#smartwizard").smartWizard("next");
    }
});

$("#smartwizardPrev").click(function(e) {
    e.preventDefault();
    $("#smartwizard").smartWizard("prev");
});

// aply form submition 
$('body').on('click', '#sendApplication', function(e) { 
    e.preventDefault();
    var fd = new FormData(document.getElementById("modelApplyForm"));
    if ($('#modelApplyForm').valid()) {
        $.ajax({
            url: "{{ route('front.model.add') }}",
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
                    
                        let successPage = document.getElementById("successPage");
                        let Wizard = document.getElementById("smartwizard");
                        let title = document.getElementById("ModelTitle");

                        Wizard.style.display = "none";
                        title.style.display = "none";
                        successPage.style.display = "block";
                         
                //    alert("Thank you for registration.");
                }else{
                    toastr.error(data.ResponseText, "Error", {
                        timeOut: 1000
                    });
                }
            }
        });
    }
});

$(function(){
    $(document).on('click','.pdfDownload',function(e){
        e.preventDefault();
        var data = "";
        var url = '{{route('front.model.pdf')}}';
        // alert(url);
        
        $.ajax({
            data:data,
            url: url,
            type:'get',
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response){
                var blob = new Blob([response]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = "Contract.pdf";
                link.click();
                
            },
            error: function(blob){
                console.log(blob);
            }
        });
    });
});

// add model in event 
$(function(){
    $('.addModelEventForm').on('submit',function(e){
        e.preventDefault();
       var formData = new FormData(this);
        var url = '{{route('front.model.store.modelEvent')}}';

        $.ajax({
            url:url,
            type:'post',
            data:formData,
            processData:false,
            contentType:false,
            success:function(data){
              if(data.ResponseCode==1){
                $('#success').html(data.ResponseText);
              }else{
                $('#error').html(data.ResponseText);
              }
            }
        });
    });
});

$('body').on("click", "#frontEventListBtn", function() {
    $('#frontEventList').modal('show');
    return false;
});
</script>