<div class="card">
    <div class="card-body">      
        <form id="form-event" class="form-horizontal form-wizard-wrapper formEvent" method="POST" enctype="multipart/form-data">
            @if (@$event->id)
                <input type="hidden" name="eventId" value="{{ @$event->id }}" />
            @endif
            <h3>Event Information</h3>
            <fieldset class="position-relative">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Event Name</label>
                            <input type="text" class="form-control" name="name" id="event-name" placeholder="Your Event Name" value="{{ @$event->name }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Type Of Event</label>
                            <input type="text" class="form-control" name="typeOfEvent" id="event-type" placeholder="Enter Event Type" value="{{ @$event->typeOfEvent }}" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control event-date" name="date" id="event-date" placeholder="Event Date" value="{{ @$event->date }}" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Starting Time</label>
                            <input type="time" class="form-control" name="startTime" id="event-start-time" placeholder="Select Event Start Time" value="{{ @$event->startTime }}" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Ending Time</label>
                            <input type="time" class="form-control" name="endTime" id="event-ending-time" placeholder="Select Event Ending Time" value="{{ @$event->endTime }}" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="location" id="event-location" placeholder="You Event Location" value="{{ @$event->location }}" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Event Description</label>
                            <textarea type="text" class="form-control" placeholder="Write Event Description here" rows="5" cols="5" name="description" id="description">{{ @$event->description }}</textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
            <h3>Model Selection</h3>
            <fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <?php
                            // get model event category id
                            $modelEventCategoryId = [];
                            foreach (@$modelEventCategory as $modelEventCategoryList) {
                                $modelEventCategoryId[] = @$modelEventCategoryList->categoryId;
                            }
                            ?>
                            <select class="form-control storeMultiple select2-multiple" style="width: 350px" name="category[]" id="category" multiple data-placeholder="Choose..">
                                <optgroup label="Model Category">
                                    @foreach ($category as $categorylist)
                                        <option value="{{ $categorylist->id }}"
                                            {{ in_array(@$categorylist->id, @$modelEventCategoryId) ? 'selected' : '' }}>
                                            {{ @$categorylist->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Number Of Girls</label>
                            <input type="text" class="form-control" name="noOfGirls" id="event-no-of-girls" placeholder="Enter Number Of Girls" readonly 
                            value="{{ @$event->noOfGirls ? @$event->noOfGirls : '0' }}" />
                            @if (@$userIds)
                                @php
                                    $userId = implode(',', $userIds);
                                @endphp
                            @endif
                            <input type="hidden" value="{{ @$userId }}" id="model-ids" name="modelIds" />

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="custom-input-label">Age Range</label>
                            <div class="range-picker">
                                <input type="text" id="age-range" name="ageRange" data-hide-min-max='true'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="model_image" class="model_image">
                            @if (@$modelList)
                                @foreach ($modelList as $modelKey => $modelItem)
                                    <div class='image-wrapper'>
                                        <div class="custom-checkbox-wrap">
                                            <div class="custom-checkbox">
                                                <input type="checkbox" class="custom-checkbox-input modelCheckBox"
                                                    id="model-{{ @$modelItem['users']['id'] }}"
                                                    value="{{ @$modelItem['users']['id'] }}"
                                                    @if (in_array(@$modelItem['users']['id'], @$userIds)) checked @endif />
                                                <label class="custom-checkbox-label"
                                                    for="model-{{ @$modelItem['users']['id'] }}"></label>
                                            </div>
                                        </div>
                                        <img src="{{ asset(env('ADMIN_ASSETS_URL') . '/uploads/models/' . @$modelItem['users']['model_images']->image) }}"
                                            alt="{{ @$modelItem['users']['fullName'] }}" />
                                        <div class="view-details-wrap">
                                            <span><i class="bx bx-info-circle"></i></span>
                                            <a href="{{route('modelProfile','').'/'.@$modelItem['users']['id']}}">View Details</a>
                                        </div>  
                                        {{ @$modelItem['users']['fullName'] }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

@if(@$event)
<script>
    function renderRangeSlider() {
        const event = {!! json_encode(@$event->toArray()) !!};
        const eventAgeRange = event?.ageRange?.split(';');
        let minFrom = eventAgeRange && eventAgeRange[0] ? eventAgeRange[0] : 20;
        let maxTo = eventAgeRange && eventAgeRange[1] ? eventAgeRange[1] : 40

        $("#age-range").ionRangeSlider({
            type: "double",
            grid: false,
            min: 0,
            max: 100,
            from: minFrom,
            to: maxTo,
        })
    }
</script>   
@endif

