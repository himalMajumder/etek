@extends('frontend.user_master')
@section('content')
    <div class="col-lg-12 col-xl-9 col-12">
        <div class="dashboard-mange-profile mgTop24">
            <div class="dashboard-head-widget style-2 m-0">
                <h5 class="dashboard-head-widget-title">Manage profile</h5>
            </div>
            <div class="dashboard-mange-profile-inner">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-12">
                        <div class="manage-profile-tab">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Tab Menu -->
                                    <div class="mp-tab-menu tab-menu">
                                        <div class="list-group" id="list-tab" role="tablist">
                                            <a class="list-group-item active" data-bs-toggle="list" href="#tab1"
                                                role="tab">
                                                Edit profile
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#tab2" role="tab">
                                                Change password
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <!-- Tab Details -->
                                    <div class="mp-tab-details tab-details">
                                        <div class="tab-content" id="nav-tabContent">
                                            <!-- Tab One -->
                                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                                <div class="manage-profile-card">
                                                    <div class="manage-profile-cover">
                                                        <img src="./assets/img/user-hero-bg.png" alt="#" />
                                                        <div class="manage-profile-img-btn mp-cover-btn">
                                                            <button type="button"
                                                                class="theme-btn secondary-btn icon-right btn btn-primary">
                                                                <i class="fi-rr-camera"></i>Change
                                                                cover
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="manage-profile-img">
                                                        <img alt="#" src="./assets/img/user-profile-img-2.png" />
                                                        <div class="manage-profile-img-btn">
                                                            <button type="button"
                                                                class="theme-btn secondary-btn icon-right btn btn-primary">
                                                                <i class="fi-rr-camera"></i>Change
                                                                photo
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <form action="#" method="post" class="manage-profile-form">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="firstName">First
                                                                        Name</label><input name="firstName"
                                                                        placeholder="Jahedul" type="text" id="firstName"
                                                                        class="form-control" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="lastName">Last
                                                                        Name</label><input name="lastName"
                                                                        placeholder="Islam" type="text" id="lastName"
                                                                        class="form-control" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="phoneNumber">Phone
                                                                        Number</label>
                                                                    <div class="form-input-with-input-text">
                                                                        <input name="phoneNumber" placeholder="01234567890"
                                                                            type="tel" id="phoneNumber"
                                                                            class="form-control" required />
                                                                        <button type="button"
                                                                            class="my-button manage-profile-form-input-text btn btn-primary"
                                                                            data-widget-id="widget1">
                                                                            Change number
                                                                        </button>
                                                                    </div>

                                                                    <!-- Type New Number Form -->
                                                                    <div id="widget1"
                                                                        class="widget-box manage-profile-form-widget"
                                                                        style="display: none">
                                                                        <div class="form-group">
                                                                            <label class="form-label"
                                                                                for="emailAddress">Type a new
                                                                                number</label><input name="phone-number"
                                                                                placeholder="01234567890" type="tel"
                                                                                id="emailAddress" class="form-control"
                                                                                required />
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="theme-btn btn btn-primary">
                                                                            Next
                                                                        </button>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="emailAddress">Email
                                                                        Address</label>
                                                                    <div class="form-input-with-input-text">
                                                                        <input name="emailAddress"
                                                                            placeholder="your-email@mail.com" type="email"
                                                                            id="emailAddress" class="form-control"
                                                                            required /><button type="button"
                                                                            class="my-button manage-profile-form-input-text btn btn-primary"
                                                                            data-widget-id="widget2">
                                                                            Change email
                                                                        </button>
                                                                    </div>
                                                                    <div id="widget2"
                                                                        class="widget-box manage-profile-form-widget"
                                                                        style="display: none">
                                                                        <div class="form-group">
                                                                            <label class="form-label"
                                                                                for="emailAddress">Type a new email
                                                                                address</label><input name="email"
                                                                                placeholder="xyz@gmail.com" type="email"
                                                                                id="emailAddress" class="form-control"
                                                                                required />
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="theme-btn btn btn-primary">
                                                                            Next
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="manage-profile-form-bottom">
                                                            <span class="manage-profile-form-btm-title">Third-party linked
                                                                account</span>
                                                            <div class="manage-profile-form-btm-widget">
                                                                <div class="manage-profile-form-btm-widget-icon">
                                                                    <img alt="#"
                                                                        src="./assets/img/icons/google.svg" />
                                                                    <p>Google</p>
                                                                </div>
                                                                <a class="manage-profile-form-btm-widget-btn"
                                                                    href="/dashboard/manage-profile">Rebroke</a>
                                                            </div>
                                                        </div>
                                                        <div class="manage-profile-form-button">
                                                            <button type="submit" class="theme-btn btn btn-primary">
                                                                Save Changes
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Tab Two -->




                                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                                <div class="change-password-card">


                                                    {{-- <form action="#" method="post" id="changePasswordForm"
                                                        class="change-password-form">
                                                        <div class="form-group">
                                                            <label for="oldPassword">Type old password</label>
                                                            <div class="form-group-password">
                                                                <input type="password" class="form-control"
                                                                    id="oldPassword" required />
                                                                <div class="input-group-append">
                                                                    <div onclick="togglePasswordVisibility('oldPassword')">
                                                                        <i id="oldPasswordIcon"
                                                                            class="fi-rr-eye-crossed"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="newPassword">Set a new password</label>
                                                            <div class="form-group-password">
                                                                <input type="password" class="form-control"
                                                                    id="newPassword" required />
                                                                <div class="input-group-append">
                                                                    <div onclick="togglePasswordVisibility('newPassword')">
                                                                        <i id="newPasswordIcon"
                                                                            class="fi-rr-eye-crossed"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="confirmPassword">Confirm password</label>
                                                            <div class="form-group-password">
                                                                <input type="password" class="form-control"
                                                                    id="confirmPassword" required />
                                                                <div class="input-group-append">
                                                                    <div
                                                                        onclick="togglePasswordVisibility('confirmPassword')">
                                                                        <i id="confirmPasswordIcon"
                                                                            class="fi-rr-eye-crossed"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="change-password-form-btn theme-btn btn btn-primary"
                                                            onclick="updatePassword()">
                                                            Update Password
                                                        </button>
                                                    </form> --}}

                                                    <form action="{{ url('update/password') }}" method="post"
                                                        id="changePasswordForm" class="change-password-form">
                                                        @csrf

                                                        @if (!Auth::user()->provider_id)
                                                            <div class="form-group">
                                                                <label for="oldPassword">Type old password</label>
                                                                <div class="form-group-password">
                                                                    <input type="password" class="form-control"
                                                                        id="oldPassword" name="old_password" required />
                                                                    <div class="input-group-append">
                                                                        <div
                                                                            onclick="togglePasswordVisibility('oldPassword')">
                                                                            <i id="oldPasswordIcon"
                                                                                class="fi-rr-eye-crossed"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <div class="form-group">
                                                            <label for="newPassword">Set a new password</label>
                                                            <div class="form-group-password">
                                                                <input type="password" class="form-control"
                                                                    id="newPassword" name="new_password" required />
                                                                <div class="input-group-append">
                                                                    <div onclick="togglePasswordVisibility('newPassword')">
                                                                        <i id="newPasswordIcon"
                                                                            class="fi-rr-eye-crossed"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="confirmPassword">Confirm password</label>
                                                            <div class="form-group-password">
                                                                <input type="password" class="form-control"
                                                                    id="confirmPassword" name="confirm_password"
                                                                    required />
                                                                <div class="input-group-append">
                                                                    <div
                                                                        onclick="togglePasswordVisibility('confirmPassword')">
                                                                        <i id="confirmPasswordIcon"
                                                                            class="fi-rr-eye-crossed"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="change-password-form-btn theme-btn btn btn-primary">
                                                            Update Password
                                                        </button>
                                                    </form>



                                                </div>
                                            </div>





                                        </div>
                                    </div>
                                    <!-- End Tab Details -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</script>

<!-- Verify OTP -->
<script type="text/javascript">
    const otpInput = document.getElementById("otp-input");
    const inputs = otpInput.querySelectorAll("input");
    const verifyBtn = document.getElementById("verify-btn");
    const resultMessage = document.getElementById(
        "verification-result"
    );

    // Function to handle input in the OTP fields
    function handleOtpInput(e, index) {
        const input = e.target;
        const value = input.value;

        if (value.length > 1) {
            input.value = value.charAt(0);
            return;
        }

        if (value) {
            if (index < inputs.length - 1) {
                inputs[index + 1].focus();
            } else {
                verifyBtn.removeAttribute("disabled");
                verifyBtn.focus();
            }
        } else if (index > 0) {
            inputs[index - 1].focus();
        }
    }

    // Add event listeners to OTP input fields
    inputs.forEach((input, index) => {
        input.addEventListener("input", (e) =>
            handleOtpInput(e, index)
        );
    });

    // Function to handle OTP verification
    function verifyOtp() {
        const enteredOtp = Array.from(inputs)
            .map((input) => input.value)
            .join("");

        if (enteredOtp === "123456") {
            // Replace with your actual OTP
            resultMessage.textContent = "Verification successful!";
            resultMessage.style.color = "green";
        } else {
            resultMessage.textContent =
                "Verification failed. Please try again.";
            resultMessage.style.color = "red";
            clearOtp();
        }
    }

    // Function to clear OTP input fields
    function clearOtp() {
        inputs.forEach((input) => (input.value = ""));
        verifyBtn.setAttribute("disabled", true);
        inputs[0].focus();
    }

    verifyBtn.addEventListener("click", verifyOtp);
</script>

<!-- Show/Hidden Password JS -->
<script type="text/javascript">
    function togglePasswordVisibility(inputId) {
        const inputElement = document.getElementById(inputId);
        const iconElement = document.getElementById(inputId + "Icon");
        if (inputElement.type === "password") {
            inputElement.type = "text";
            iconElement.classList.remove("fi-rr-eye-crossed");
            iconElement.classList.add("fi-rr-eye");
        } else {
            inputElement.type = "password";
            iconElement.classList.remove("fi-rr-eye");
            iconElement.classList.add("fi-rr-eye-crossed");
        }
    }

    function updatePassword() {
        // Add your password update logic here
        console.log("Password updated!");
    }
</script>
@endsection
