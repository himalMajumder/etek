@extends('frontend.user_master')
@section('content')
<div class="col-lg-12 col-xl-9 col-12">

    <div class="dashboard-product-review mgTop24 mb-4">
        <div class="dashboard-head-widget style-2" style="margin-bottom: 32px">
            <h5 class="dashboard-head-widget-title">Product reviews</h5>
        </div>
        <div class="product-review-card-inner">

            @if(count($productReviews) > 0)
            @foreach ($productReviews as $productReview)
            <div class="single-product-review-card">
                <div class="product-review-card-info">
                    <div class="product-review-card-img">
                        <img alt="" src="{{ url(env('ADMIN_URL') . '/' . $productReview->image) }}">
                    </div>
                    <h6>{{ $productReview->name }}</h6>
                </div>
                <div class="product-review-main text-center">
                    <ul class="product-review-list">
                        @for ($i = 1; $i <= $productReview->rating; $i++)
                            <li>
                                <img src="{{asset('user/assets/img/icons/star.svg')}}" alt="#">
                            </li>
                            @endfor
                            @for ($i = 1; $i <= 5 - $productReview->rating; $i++)
                                <li>
                                    <img src="{{asset('user/assets/img/icons/star-light.svg')}}" alt="#">
                                </li>
                                @endfor
                    </ul>
                    @if ($productReview->rating == 5)
                    <span>Excellent</span>
                    @elseif($productReview->rating == 4)
                    <span>Great</span>
                    @elseif($productReview->rating == 3)
                    <span>Average</span>
                    @elseif($productReview->rating = 2)
                    <span>Poor</span>
                    @else
                    <span>Very Bad</span>
                    @endif
                </div>
                <div class="product-review-text">
                    <p>
                        {{ $productReview->review }}
                    </p>
                    @if($productReview->status == 0)
                    <p class="text-info">Review Status: Pending</p>
                    @else
                    <p class="text-success">Review Status: Published</p>
                    @endif
                </div>
                <div class="product-review-buttons-group">

                    <!-- <button type="button" class="my-button product-review-btn edit-btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fi-ss-pencil"></i>
                    </button> -->

                    <button type="button" class="my-button product-review-btn edit-btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-review-id="{{$productReview->id}}" data-review-rating="{{$productReview->rating}}" data-review-text="{{$productReview->review}}">
                        <i class="fi-ss-pencil"></i>
                    </button>


                    <a href="{{url('delete/product/review')}}/{{$productReview->id}}" class="product-review-btn delete-btn d-inline-block"><i class="fi-ss-trash"></i></a>
                </div>


            </div>
            @endforeach
            @else
            <h5 class="text-center">No Review Found</h5>
            @endif


        </div>
    </div>

    {{$productReviews->links()}}

</div>



<div class="write-review-modal modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="write-review-modal-header modal-header">
                <div class="btn-close write-review-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fi-rr-cross-small"></i>
                </div>
            </div>
            <div class="write-review-modal-body modal-body">
                <form action="{{url('update/product/review')}}" method="post" class="write-review-form">
                    @csrf
                    <input type="hidden" name="product_review_id" id="product_review_id">
                    <div class="form-group">
                        <label>Product Ratings</label>
                        <div class="write-review-rating star">
                            <label>
                                ★
                                <input type="radio" name="note" value="1" />
                            </label>
                            <label>
                                ★
                                <input type="radio" name="note" value="2" />
                            </label>
                            <label>
                                ★
                                <input type="radio" name="note" value="3" />
                            </label>
                            <label>
                                ★
                                <input type="radio" name="note" value="4" />
                            </label>
                            <label>
                                ★
                                <input type="radio" name="note" value="5" />
                            </label>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label>Add Photos</label>
                        <div class="write-review-add-photo">
                            <div class="create-ticket-form-upload-image">
                                <div class="library-photo-input">
                                    <input type="file" accept="image/*" id="library-photo-input" class="hidden" multiple onchange="uploadLibraryPhoto(event)" />
                                    <label for="library-photo-input">
                                        <i class="fi fi-rr-camera"></i>
                                        <span>Upload photo</span>
                                    </label>
                                </div>
                                <div class="upload-image-list upload-img-input" id="upload-image-list">
                                    <div style="position: relative">
                                        <div class="remove-icon" id="remove-icon" style="display: none" onclick="removeImage()">
                                            <i class="fi fi-rr-cross"></i>
                                        </div>
                                        <img id="uploaded-image" style="display: none" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group write-review-message">
                        <label>Add Written Review</label>
                        <textarea name="review" id="review_text" required></textarea>
                        <span>Max 250 characters</span>
                    </div>
                    <div class="write-review-form-btn">
                        <button type="submit" class="theme-btn">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- <div class="write-review-modal modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="write-review-modal-haed modal-header">
                <div class="btn-close write-review-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fi-rr-cross-small"></i>
                </div>
            </div>
            <div class="write-review-modal-body modal-body">
                <form action="#" method="post" class="write-review-form">
                    <div class="form-group">
                        <label>Product Rattings</label>
                        <div class="write-review-ratting star">
                            <label>
                                ★
                                <input type="radio" name="note" value="1" id="aze" />
                            </label>

                            <label>
                                ★
                                <input type="radio" name="note" value="2" />
                            </label>
                            <label>
                                ★
                                <input type="radio" name="note" value="3" />
                            </label>
                            <label>
                                ★
                                <input type="radio" name="note" value="4" />
                            </label>
                            <label>
                                ★
                                <input type="radio" name="note" value="5" />
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Add Photos</label>
                        <div class="write-review-add-photo">
                            <div class="create-ticket-form-upload-image">
                                <div class="library-photo-input">
                                    <input type="file" accept="image/*" id="library-photo-input" class="hidden" multiple onchange="uploadLibraryPhoto(event)" />
                                    <label for="library-photo-input">
                                        <i class="fi fi-rr-camera"></i>
                                        <span>Upload photo</span>
                                    </label>
                                </div>
                                <div class="upload-image-list upload-img-input" id="upload-image-list">
                                    <div style="position: relative">
                                        <div class="remove-icon" id="remove-icon" style="display: none" onclick="removeImage()">
                                            <i class="fi fi-rr-cross"></i>
                                        </div>
                                        <img id="uploaded-image" style="display: none" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group write-review-message">
                        <label>Add Written Review</label>
                        <textarea name="review" required></textarea>
                        <span>Max 250 characters</span>
                    </div>
                    <div class="write-review-form-btn">
                        <button type="submit" class="theme-btn">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

@endsection

@section('js')
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        // Get all elements with the class 'my-button' and all elements with the class 'widget-box'
        var buttons = document.querySelectorAll(".my-button");
        var widgets = document.querySelectorAll(".widget-box");

        // Add click event listener to each button
        buttons.forEach(function(button) {
            button.addEventListener("click", function() {
                // Hide all widgets
                widgets.forEach(function(widget) {
                    widget.style.display = "none";
                });

                // Get the widget associated with the clicked button
                var widgetId = button.getAttribute("data-widget-id");
                var targetWidget = document.getElementById(widgetId);

                // Toggle the visibility of the target widget
                if (
                    targetWidget.style.display === "none" ||
                    targetWidget.style.display === ""
                ) {
                    targetWidget.style.display = "block";
                } else {
                    targetWidget.style.display = "none";
                }
            });
        });
    });

    function hideWidget(id) {
        $("#widget" + id).css('display', 'none');
    }
</script>
@endsection