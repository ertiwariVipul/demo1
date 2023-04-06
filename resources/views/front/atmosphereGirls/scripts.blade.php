<script src="{{ asset(env('FRONTEND_ASSETS_URL') . '/scripts/ion.rangeSlider.min.js') }}"></script>
<script>
    // model filter 
    $(function(){
         // Start On change Country
        $(document).on('change', '.modelValue', function(e) {
            e.preventDefault();
            const categoryId = $('#modelCategory').val();
            const CountryId = $('#modelCountry').val();
            $.ajax({
                url: "{{ route('front.atmosphereGirls.modelByCountry') }}",
                type: 'GET',
                data:{
                    categoryId:categoryId,
                    CountryId:CountryId,
                },
                success: function(response) {
                    // alert(response);
                    $('.model-profile-image').hide();
                    let imageHtml = '';
                    for (let index = 0; index < response?.length; index++) {
                        console.log(response[index]);
                        var userId = response[index]?.user?.id ;

                        const url = "{{route('modelProfile','')}}"+"/"+userId;

                        const imageUrl =
                            "{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/models/') }}" + "/" +
                            response[index]['user']['model_images']?.image;

                        // imageHtml += '<div class="atomosphere-girls-images-wrap">';
                        imageHtml +=`<a href='${ url }' class="atomosphere-girls-images">`;
                        imageHtml += "<div class='models-profile-gallery-img d-align'>";
                            imageHtml +=
                                `<img src='${imageUrl}' alt='${response[index]?.user?.fullName}'  class="cover-img" />`
                        imageHtml += '</div>';
                        imageHtml += '<div class="card-overlay text-white">';
                        imageHtml += 
                            ` <h4 class="h4 mb-3 secondary-font fw-600 text-break">${response[index]?.user?.fullName}</h4>`;

                        imageHtml += `<div class="d-flex flex-wrap modal-body-content-items">`;
                        imageHtml += `<div class="d-flex flex-column card-overlay-text">`;
                        imageHtml += ` <span class="small-content mb-1 opacity-7">Height</span>`;
                        imageHtml += `<span class="text-white">${response[index]?.height}</span>`;
                        imageHtml += '</div>';
                        imageHtml += `<div class="d-flex flex-column card-overlay-text">`;
                        imageHtml += ` <span class="small-content mb-1 opacity-7">Weight</span>`;
                        imageHtml += `<span class="text-white">${response[index]?.weight}</span>`;
                        imageHtml += `</div>`;
                        imageHtml += `<div class="d-flex flex-column card-overlay-text">`
                        imageHtml += ` <span class="small-content mb-1 opacity-7">Hair</span>`
                        imageHtml += ` <span class="text-white">${response[index]?.hair}</span>`
                        imageHtml += ` </div>`
                        imageHtml += ` </div>`
                        imageHtml += ` </div>`
                        imageHtml += ` </a>`
                        // imageHtml += '</div>';
                            
                    
                    }
                    if(imageHtml){

                        $('#model_image').html(imageHtml);
                    }else{
                        $('#model_image').html("<span class='data-not-dound-txt'>Data Not Found</span>");
                    }
                }
            })
        });
    });

    // start range slider initiatied
    $(document).ready(function() {
        $("#AgeRangeSlider").ionRangeSlider({
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
                const categoryId = $('#modelCategory').val();
                const CountryId = $('#modelCountry').val();
                $.ajax({
                    url: "{{ route('front.atmosphereGirls.modelByCountry') }}",
                    type: 'get',
                    data: {
                        categoryId:categoryId,
                        CountryId:CountryId,
                        value1: v1,
                        value2: v2,
                    },
                    success: function(response) {
                    // alert(response);
                    $('.model-profile-image').hide();
                    let imageHtml = '';
                    for (let index = 0; index < response?.length; index++) {
                        console.log(response[index]);
                        var userId = response[index]?.user?.id ;

                        const url = "{{route('modelProfile','')}}"+"/"+userId;

                        const imageUrl =
                            "{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/models/') }}" + "/" +
                            response[index]['user']['model_images']?.image;

                        // imageHtml += '<div class="atomosphere-girls-images-wrap">';
                        imageHtml +=`<a href='${ url }' class="atomosphere-girls-images">`;
                        imageHtml += "<div class='models-profile-gallery-img d-align'>";
                            imageHtml +=
                                `<img src='${imageUrl}' alt='${response[index]?.user?.fullName}'  class="cover-img" />`
                        imageHtml += '</div>';
                        imageHtml += '<div class="card-overlay text-white">';
                        imageHtml += 
                            ` <h4 class="h4 mb-3 secondary-font fw-600 text-break">${response[index]?.user?.fullName}</h4>`;

                        imageHtml += `<div class="d-flex flex-wrap modal-body-content-items">`;
                        imageHtml += `<div class="d-flex flex-column card-overlay-text">`;
                        imageHtml += ` <span class="small-content mb-1 opacity-7">Height</span>`;
                        imageHtml += `<span class="text-white">${response[index]?.height}</span>`;
                        imageHtml += '</div>';
                        imageHtml += `<div class="d-flex flex-column card-overlay-text">`;
                        imageHtml += ` <span class="small-content mb-1 opacity-7">Weight</span>`;
                        imageHtml += `<span class="text-white">${response[index]?.weight}</span>`;
                        imageHtml += `</div>`;
                        imageHtml += `<div class="d-flex flex-column card-overlay-text">`
                        imageHtml += ` <span class="small-content mb-1 opacity-7">Hair</span>`
                        imageHtml += ` <span class="text-white">${response[index]?.hair}</span>`
                        imageHtml += ` </div>`
                        imageHtml += ` </div>`
                        imageHtml += ` </div>`
                        imageHtml += ` </a>`
                        // imageHtml += '</div>';
                            
                    
                    }
                    if(imageHtml){

                        $('#model_image').html(imageHtml);
                    }else{
                        $('#model_image').html("Data Not Found");
                    }
                }
                });
            }
        });
    });
    // end range slider initiatied
  
</script>