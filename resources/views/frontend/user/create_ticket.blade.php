@extends('frontend.user_master')
@section('content')
    <div class="col-lg-12 col-xl-9 col-12">
        <div class="dashboard-create-ticket mgTop24">
            <div class="dashboard-head-widget style-2 m-0">
                <h5 class="dashboard-head-widget-title">Create ticket</h5>
                <div class="dashboard-head-widget-btn">
                    <a class="theme-btn secondary-btn icon-right" href="{{ route('support.ticket') }}"><i
                            class="fi fi-rr-arrow-left"></i>Back to tickets</a>
                </div>
            </div>
            <div class="create-ticket-inner">
                <form action="{{ route('save.support.ticket') }}" method="post" class="create-ticket-form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="ticketTitle">Ticket title</label><input name="ticketTitle"
                            placeholder="Ticket title here" required="" type="text" id="ticketTitle"
                            class="form-control" value="" />
                    </div>
                    <div class="row">


                        {{-- <div class="col-lg-6 col-12">
                        <div class="form-group select-form">
                            <label class="form-label" for="selectTopic">Select Order</label>
                            <div class="select-form-inner">

                                <select name="selectTopic" required="" id="selectTopic" class="form-control">
                                    <option value="#98487933">
                                        #98487933 (August 6, 2023 10:50 AM)
                                    </option>
                                    <option value="#98487933">
                                        #98487933 (August 6, 2023 10:50 AM)
                                    </option>
                                    <option value="#98487933">
                                        #98487933 (August 6, 2023 10:50 AM)
                                    </option>
                                    <option value="#98487933">
                                        #98487933 (August 6, 2023 10:50 AM)
                                    </option>
                                </select>

                            </div>
                        </div>
                        </div> --}}


                        <div class="col-lg-12 col-12">
                            <div class="form-group select-form">
                                <label class="form-label" for="topic">Select topic</label>
                                <div class="select-form-inner">
                                    <select name="topic" required="" id="topic" class="form-control">
                                        <option value="Select">Select</option>
                                        <option value="General Support">General Support</option>
                                        <option value="Technical Issue">Technical Issue</option>
                                        <option value="Order Issue">Order Issue</option>
                                        <option value="Payment Issue">Payment Issue</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="description">Ticket description</label>
                        <textarea name="description" rows="3" placeholder="Describe your issues.." required="" id="description"
                            class="form-control"></textarea>
                    </div>


                    <div class="form-group">
                        <label class="form-label">Upload attachment</label>
                        <div class="create-ticket-form-upload-image">
                            <div class="library-photo-input">
                                <input type="file" name="image" accept="image/*" id="library-photo-input"
                                    class="hidden" onchange="uploadLibraryPhoto()">
                                <label for="library-photo-input">
                                    <i class="fi fi-rr-upload"></i>
                                    <span>Upload photo</span>
                                </label>
                            </div>
                            <div class="upload-image-list upload-img-input">
                                <div style="position: relative">
                                    <div class="remove-icon" id="remove-icon" style="display: none" onclick="removeImage()">
                                        <i class="fi fi-rr-cross"></i>
                                    </div>
                                    <img id="uploaded-image" style="display: none">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create-ticket-form-btn">
                        <button type="submit" class="theme-btn icon-right btn btn-primary">
                            <i class="fi-br-plus"></i>Create ticket
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    function uploadLibraryPhoto() {
        const fileInput = document.getElementById("library-photo-input");
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                const imageElement = document.getElementById("uploaded-image");
                const removeIcon = document.getElementById("remove-icon");
                imageElement.src = reader.result;
                imageElement.style.display = "block";
                removeIcon.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    }

    function removeImage() {
        const imageElement = document.getElementById("uploaded-image");
        const removeIcon = document.getElementById("remove-icon");
        imageElement.style.display = "none";
        imageElement.src = "";
        removeIcon.style.display = "none";
        const fileInput = document.getElementById("library-photo-input");
        fileInput.value = "";
    }
</script>
