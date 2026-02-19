@php
$user_avatar_settings = $user->user_avatar_settings;
$user_avatar_settings = json_decode($user_avatar_settings);
$avatar_settings = isset( $user_avatar_settings->avatar_settings )? (array) $user_avatar_settings->avatar_settings : array();
$avatar_color_settings = isset( $user_avatar_settings->avatar_color_settings )? (array) $user_avatar_settings->avatar_color_settings : array();
$avatar_settings = json_encode($avatar_settings);
$avatar_color_settings = json_encode($avatar_color_settings);
@endphp

<section>
    <h2 class="section-title font-20 font-weight-bold">Account Settings</h2>
    <div class="row mt-10">
        <div class="col-12 user-profile-block">
            <div class="user-detail mb-30 bg-white panel-border rounded-sm">
                <div class="detail-header mb-15">
                    <div class="info-media d-flex align-items-center flex-wrap">

                        <h2 class="info-title font-weight-500 font-20">
                            {{$user->get_full_name()}}
                        </h2>
                    </div>
                </div>
                <div class="detail-body">
                    <div class="row mb-25">
                        <div class="rurera-hide col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="info-text">
                                <h3 class="font-18 font-weight-500 mb-5">General info</h3>
                                <span class="font-16">Some information we need to know about you, and to process legal matters.</span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="edit-info-list">
                                <h4 class="font-15 font-weight-500 pb-5 d-flex align-items-center">
                                    About you
                                    <button type="button" class="edit-profile-btn">
                                        <span class="edit-icon d-inline-flex align-items-center">
                                            <em class="font-weight-500">Edit</em>
                                        </span>
                                    </button>
                                </h4>
                                <ul>
                                    <li>
                                        <span class="info-list-label font-15">
                                            Full Name
                                            <strong class="d-flex font-weight-normal"><img src="/assets/default/svgs/user-alt-2-svgrepo-com.svg" alt="user-alt-2-svgrepo-com" height="800" width="800"> {{$user->get_full_name()}}</strong>
                                        </span>
                                        <span class="info-list-label font-15">
                                            Contact no
                                            <strong class="d-flex font-weight-normal"><img src="/assets/default/svgs/mobile.svg" alt="mobile" height="800" width="800"> {{$user->mobile}}</strong>
                                        </span>
                                        <span class="info-list-label font-15">
                                            Email
                                            <strong class="d-flex font-weight-normal"><img src="/assets/default/svgs/envelope2.svg" alt="envelope2" height="64" width="64"> parent5000@test.com</strong>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="user-edit-profile rurera-hide">
                                <div class="edit-profile">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-12 rurera-hide test2">
                                            <div class="edit-profile-sidebar">
                                                <div class="user-info d-flex align-items-center flex-wrap mb-30">
                                                    <span class="info-text d-inline-flex flex-column font-weight-500">
                                                        {{$user->get_full_name()}}
                                                    </span>
                                                </div>
                                                <div class="edit-profile-menu">
                                                    <ul class="nav flex-column" id="myTab" role="tablist">
                                                        <li>
                                                            <a class="nav-link active d-flex align-items-center" id="edit-profile-tab" data-toggle="tab" href="#edit-profile" role="tab" aria-controls="edit-profile" aria-selected="true">
                                                                <span class="icon-box d-inline-block"><img src="/assets/default/svgs/edit-menu-user.svg" height="15" width="15" alt="edit-menu-user"></span> General
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="nav-link d-flex align-items-center" id="edit-experience-tab" data-toggle="tab" href="#edit-experience" role="tab" aria-controls="edit-experience" aria-selected="false">
                                                                <span class="icon-box d-inline-block"><img src="/assets/default/svgs/edit-menu-home.svg" height="15" width="15" alt="edit-menu-home"></span>Experience
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="nav-link d-flex align-items-center" id="edit-skills-tab" data-toggle="tab" href="#edit-skills" role="tab" aria-controls="edit-skills" aria-selected="false">
                                                                <span class="icon-box d-inline-block"><img src="/assets/default/svgs/edit-menu-diamond.svg" height="15" width="15" alt="edit-menu-diamond"></span>Skills &amp; Tools
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="nav-link d-flex align-items-center" id="edit-settings-tab" data-toggle="tab" href="#edit-settings" role="tab" aria-controls="edit-settings" aria-selected="false">
                                                                <span class="icon-box d-inline-block"><img src="/assets/default/svgs/edit-menu-setting.svg" height="15" width="15" alt="edit-menu-setting"></span>Settings
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="edit-profile-content-holder tab-content" id="myTabContent">
                                                <div class="edit-profile-content panel-border bg-white rounded-sm p-25 tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                                                    <!-- <div class="edit-profile-top d-flex align-items-center flex-wrap justify-content-between mb-50">
                                                        <div class="top-heading">
                                                            <h5 class="font-16 font-weight-500">
                                                                GENERAL INFO
                                                                <span class="d-block pt-5 font-12">Edit your account's general information</span>
                                                            </h5>
                                                        </div>
                                                    </div> -->
                                                    <div class="edit-profile-body">
                                                        <div class="edit-profile-image">
                                                            <!--<div class="edit-element-title mb-20">
                                                                <h6 class="font-weight-500">
                                                                    Profile picture
                                                                    <span class="d-block pt-5 font-12">This is how others will recognize you</span>
                                                                </h6>
                                                            </div>
                                                            <div class="profile-image text-center">
                                                                <figure class="d-inline-flex position-relative">
                                                                    <img src="{{ (!empty($user)) ? $user->getAvatar(150) : '' }}" height="96" width="96" alt="profile-image">
                                                                    <a href="javascript:;" class="profile-image-btn cancel-btn d-inline-flex align-items-center justify-content-center font-16 bg-white"><img src="/assets/default/svgs/edit-2.svg" alt="" style="width:18px; height:18px"></a>
                                                                </figure>
                                                            </div> -->
                                                        </div>
                                                        <div class="mb-0">
                                                            <div class="row">
                                                                <!-- <div class="col-12">
                                                                    <div class="edit-element-title mb-20">
                                                                        <h6 class="font-weight-600">
                                                                            Profile Info
                                                                            <span class="d-block pt-5 font-12">Others diserve to know you more</span>
                                                                        </h6>
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-6 col-lg-6 col-md-6 form-group">
                                                                    <label>First Name</label>
                                                                    <div class="input-field">
                                                                        <input type="text" name="first_name" class="rurera-req-field" placeholder="What should we call you?" value="{{( $user->first_name != '')? $user->first_name : ''}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-6 col-md-6 form-group">
                                                                    <label>Last Name</label>
                                                                    <div class="input-field">
                                                                        <input type="text" name="last_name" class="rurera-req-field" placeholder="Your family/last name" value="{{( $user->last_name != '')? $user->last_name : ''}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-6 col-md-6 form-group">
                                                                    <label>Contact No</label>
                                                                    <div class="input-field">
                                                                        <input type="text" name="mobile" class="" placeholder="Add your phone number" value="{{( $user->mobile != '')? $user->mobile : ''}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-6 col-md-6 form-group">
                                                                    <label>Email Address</label>
                                                                    <div class="input-field">
                                                                        <input type="text" name="email" class="rurera-req-field" placeholder="Email for important updates" value="{{( $user->email != '')? $user->email : ''}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="edit-profile-footer">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="edit-profile-controls text-right">
                                                                    <a href="javascript:;" class="text-center cancel-edit-button">Cancel</a>
                                                                    <button type="button" id="saveData" class="save-btn text-center ">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="edit-experience" role="tabpanel" aria-labelledby="edit-experience-tab">Experience</div>
                                                <div class="tab-pane fade" id="edit-skills" role="tabpanel" aria-labelledby="edit-skills-tab">Skills</div>
                                                <div class="tab-pane fade" id="edit-settings" role="tabpanel" aria-labelledby="edit-settings-tab">Settings</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="rurera-hide col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="info-text">
                                <h3 class="font-18 font-weight-500 mb-5">Personal info</h3>
                                <span class="font-16">Some information we need to know about you, and to process legal matters.</span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="edit-info-list">
                                <h4 class="font-15 font-weight-500 pb-5 d-flex align-items-center">
                                    Change Password
                                    <a href="javascript:;" class="profile-login-btn">
                                        <span class="edit-icon d-inline-flex align-items-center">
                                            <em class="font-weight-500">Edit</em>
                                        </span>
                                    </a>
                                </h4>
                                <ul>
                                    <li>
                                        <span class="info-list-label font-15">
                                            Password
                                            <strong class="d-flex font-weight-normal align-items-baseline"><img src="/assets/default/svgs/shield.svg" alt="shield" height="24" width="24"> ********</strong>
                                        </span>
                                    </li>
                                    <!-- <li>
                                        <a href="javascript:;" class="d-flex align-items-center profile-login-btn justify-content-between p-15">
                                            <span class="info-list-label font-16">
                                                Email Addres
                                                <strong class="d-block font-weight-500">{{$user->email}}</strong>
                                            </span>
                                            <span class="edit-icon d-inline-flex align-items-center">
                                                <em class="font-weight-500">Edit</em>
                                            </span>
                                        </a>
                                    </li> -->

                                </ul>
                            </div>
                            <div class="user-edit-login rurera-hide">
                                <div class="edit-profile">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-12 rurera-hide">
                                            <div class="edit-profile-sidebar 3">
                                                <div class="user-info d-flex align-items-center flex-wrap mb-30">
                                                    <span class="info-text d-inline-flex flex-column font-weight-500">
                                                        {{$user->get_full_name()}}
                                                    </span>
                                                </div>
                                                <div class="edit-profile-menu">
                                                    <ul class="nav flex-column" id="myTab" role="tablist">
                                                        <li>
                                                            <a class="nav-link active d-flex align-items-center" id="edit-profile-tab" data-toggle="tab" href="#edit-profile" role="tab" aria-controls="edit-profile" aria-selected="true">
                                                                <span class="icon-box d-inline-block"><img src="/assets/default/svgs/edit-menu-user.svg" height="15" width="15" alt="edit-menu-user"></span> General
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="nav-link d-flex align-items-center" id="edit-experience-tab" data-toggle="tab" href="#edit-experience" role="tab" aria-controls="edit-experience" aria-selected="false">
                                                                <span class="icon-box d-inline-block"><img src="/assets/default/svgs/edit-menu-home.svg" height="15" width="15" alt="edit-menu-home"></span>Experience
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="nav-link d-flex align-items-center" id="edit-skills-tab" data-toggle="tab" href="#edit-skills" role="tab" aria-controls="edit-skills" aria-selected="false">
                                                                <span class="icon-box d-inline-block"><img src="/assets/default/svgs/edit-menu-diamond.svg" height="15" width="15" alt="edit-menu-diamond"></span>Skills &amp; Tools
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="nav-link d-flex align-items-center" id="edit-settings-tab" data-toggle="tab" href="#edit-settings" role="tab" aria-controls="edit-settings" aria-selected="false">
                                                                <span class="icon-box d-inline-block"><img src="/assets/default/svgs/edit-menu-setting.svg" height="15" width="15" alt="edit-menu-setting"></span>Settings
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="edit-profile-content-holder tab-content" id="myTabContent">
                                                <div class="edit-profile-content panel-border bg-white rounded-sm p-25 tab-pane fade show active" id="edit-profile2" role="tabpanel" aria-labelledby="edit-profile2-tab">
                                                    <div class="edit-profile-body">
                                                        <div class="row">
                                                            <div class="col-6 col-lg-6 col-md-6 form-group">
                                                                <label>Current Password</label>
                                                                <div class="input-field">
                                                                    <input type="password" class="password" name="password" placeholder="Your current password" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-lg-6 col-md-6 form-group">
                                                                <label>New Password</label>
                                                                <div class="input-field">
                                                                    <input type="password" class="password" name="password" placeholder="Choose a secure password" value="">
                                                                    <div class="password-info">
                                                                        <span class="item rule-length"><i class="info-icon">✔</i> 7+ characters</span>
                                                                        <span class="item rule-number"><i class="info-icon">✔</i> At least one number</span>
                                                                        <span class="item rule-common"><i class="info-icon">✔</i> Not a common password</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="edit-profile-footer">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                                                <div class="edit-profile-controls text-right">
                                                                    <a href="javascript:;" class="text-center cancel-edit-button">Cancel</a>
                                                                    <button type="button" id="saveData" class="save-btn text-center ">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="edit-experience" role="tabpanel" aria-labelledby="edit-experience-tab">Experience</div>
                                                <div class="tab-pane fade" id="edit-skills" role="tabpanel" aria-labelledby="edit-skills-tab">Skills</div>
                                                <div class="tab-pane fade" id="edit-settings" role="tabpanel" aria-labelledby="edit-settings-tab">Settings</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="notifications-wrap mb-30">
                <div class="notifications-header">
                    <h2 class="font-20 font-weight-bold">Alerts & Notifications</h2>
                    <a href="#" class="toggle-all">Toggle all</a>
                </div>

                <div class="notifications-section panel-section-card bg-white panel-border rounded-sm px-25 pt-25 pb-15">
                    <p class="label font-18 font-weight-bold mb-0">Send me:</p>

                    <div class="item">
                        <label class="checkbox">
                            <input type="checkbox">
                            <span></span>
                        </label>
                        <div class="text">
                            <h4>Rurera Communication</h4>
                            <p>Get Rurera news, announcements, and product updates</p>
                        </div>
                    </div>

                    <div class="item">
                        <label class="checkbox">
                            <input type="checkbox">
                            <span></span>
                        </label>
                        <div class="text">
                            <h4>Account Activity</h4>
                            <p>Get important notifications about you or activity you've missed</p>
                        </div>
                    </div>

                    <div class="item disabled">
                        <label class="checkbox">
                            <input type="checkbox" disabled>
                            <span></span>
                        </label>
                        <div class="text">
                            <h4>Draftees</h4>
                            <p>Once you receive invitations, you can get emails of Prospects looking to be drafted</p>
                        </div>
                    </div>

                    <div class="item">
                        <label class="checkbox">
                            <input type="checkbox">
                            <span></span>
                        </label>
                        <div class="text">
                            <h4>Meetups Near You</h4>
                            <p>Get an email when a Dribbble Meetup is posted close to my location</p>
                        </div>
                    </div>

                    <div class="item">
                        <label class="checkbox">
                            <input type="checkbox" checked>
                            <span></span>
                        </label>
                        <div class="text">
                            <h4>Marketing Updates</h4>
                            <p>Stay informed about our latest products, promotions, and special offers</p>
                        </div>
                    </div>

                    <div class="item">
                        <label class="checkbox">
                            <input type="checkbox">
                            <span></span>
                        </label>
                        <div class="text">
                            <h4>Hiring Manager Alerts</h4>
                            <p>Get news & announcements for hiring managers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<div class="modal fade" id="profile-image-modal" tabindex="-1" role="dialog" aria-labelledby="profile-image-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div id="svgAvatars"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="avatarCropModalContainer" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ trans('public.edit_selected_image') }}</h4>
            </div>
            <div class="modal-body">
                <div id="imageCropperContainer">
                    <div class="cropit-preview"></div>
                    <div class="cropit-tools">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="mr-20">
                                <button type="button" class="btn btn-transparent rotate-cw mr-10">
                                    <i data-feather="rotate-cw" width="18" height="18"></i>
                                </button>
                                <button type="button" class="btn btn-transparent rotate-ccw">
                                    <i data-feather="rotate-ccw" width="18" height="18"></i>
                                </button>
                            </div>

                            <div class="d-flex align-items-center justify-content-center">
                                <span>-</span>
                                <input type="range" class="cropit-image-zoom-input mx-10">
                                <span>+</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-transparent" id="cancelAvatarCrop">{{ trans('public.cancel') }}</button>
                        <button class="btn btn-green" id="storeAvatar">{{ trans('public.select') }}</button>
                    </div>
                    <input type="file" class="cropit-image-input">
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var user_avatar_settings = '<?php echo $avatar_settings; ?>';
    var avatar_color_settings = '<?php echo $avatar_color_settings; ?>';

    user_avatar_settings = JSON.parse(user_avatar_settings);
    avatar_color_settings = JSON.parse(avatar_color_settings);

$(document).ready(function () {
    $(document).on('click', '.regenerate-emoji', function (e) {
        rurera_loader($("#userSettingForm"), 'div');
        var login_emoji = $(".emoji-password-field").val();

        jQuery.ajax({
           type: "POST",
           url: '/panel/users/generate-emoji',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {'login_emoji':login_emoji},
           success: function (return_data) {
               rurera_remove_loader($("#userSettingForm"), 'div');
               Swal.fire({
                  icon: 'success',
                  html: return_data,
                  showCloseButton: true,
                   allowOutsideClick: false,
                   allowEscapeKey: false,
                  showConfirmButton: !1
              });
           }
       });

    });

    var imageClicked = false;
    $(document).on('click', '.profile-image-btn', function (e) {
        $("#profile-image-modal").modal('show');
        if( imageClicked == false) {
            var start_id = '{{$user->user_preference}}';
            start_id = (start_id == 'female') ? 'girls' : 'boys';
            $("#svga-start-" + start_id).click();
            imageClicked = true;
        }
    });


    $(document).on('click', '.edit-profile-btn', function (e) {
        $(this).closest('.detail-body .row').find('.edit-info-list').addClass('rurera-hide');
        $(".user-edit-profile").addClass('rurera-active');
    });

    $(document).on('click', '.cancel-edit-button', function (e) {
        $(".edit-info-list").removeClass('rurera-hide');
        $(".user-edit-profile").removeClass('rurera-active');
    });

    // User Loging Detail Function Start
    $(document).on('click', '.profile-login-btn', function (e) {
        $(this).closest('.detail-body .row').find('.edit-info-list').addClass('rurera-hide');
        $(".user-edit-login").addClass('rurera-active');
    });

    $(document).on('click', '.cancel-edit-button', function (e) {
        $(".user-edit-login").removeClass('rurera-active');
    });
    // User Login Detail Function End

    function refresh_preference_field() {
        $('.preference_field option').removeAttr('disabled');
        $('.preference_field').each(function () {
            var current_value = $(this).val();
            if( current_value != '') {
                $('.preference_field option[value="' + current_value + '"]').attr('disabled', 'disabled');
                $(this).find('option[value="' + current_value + '"]').removeAttr('disabled');
            }
        });
    }

    $(document).on('change', '.preference_field', function (e) {
        refresh_preference_field();
    });
    refresh_preference_field();

    $(document).on('click', '.regenerate-pin', function (e) {
        rurera_loader($("#userSettingForm"), 'div');
        jQuery.ajax({
           type: "POST",
           url: '/panel/users/generate-pin',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data: {},
           success: function (return_data) {
               rurera_remove_loader($("#userSettingForm"), 'div');
               Swal.fire({
                  icon: 'success',
                  html: return_data,
                  showCloseButton: true,
                   allowOutsideClick: false,
                   allowEscapeKey: false,
                  showConfirmButton: !1
              });
           }
       });

    });
});
</script>
<script>
    $(document).ready(function () {

    $(".password").on("click", function () {
        let wrapper = $(this).closest(".input-field");
        wrapper.find(".password-info").css("display", "flex");
    });

    $(".password").on("keyup", function () {

        let $this = $(this);
        let val = $this.val();
        let wrapper = $this.closest(".input-field");

        let hasNumber = /\d/.test(val);
        let commonPasswords = ["123456", "password", "qwerty", "111111"];

        // Rule 1 — Length
        if (val.length >= 7) {
            wrapper.find(".rule-length")
                .removeClass("error").addClass("success")
                .find(".info-icon").text("✔");
        } else {
            wrapper.find(".rule-length")
                .removeClass("success").addClass("error")
                .find(".info-icon").text("⚠");
        }

        // Rule 2 — Number
        if (hasNumber) {
            wrapper.find(".rule-number")
                .removeClass("error").addClass("success")
                .find(".info-icon").text("✔");
        } else {
            wrapper.find(".rule-number")
                .removeClass("success").addClass("error")
                .find(".info-icon").text("⚠");
        }

        // Rule 3 — Not common password
        if (!commonPasswords.includes(val)) {
            wrapper.find(".rule-common")
                .removeClass("error").addClass("success")
                .find(".info-icon").text("✔");
        } else {
            wrapper.find(".rule-common")
                .removeClass("success").addClass("error")
                .find(".info-icon").text("⚠");
        }

        // Input error border
        if (
            val.length < 7 ||
            !hasNumber ||
            commonPasswords.includes(val)
        ) {
            $this.addClass("input-error");
        } else {
            $this.removeClass("input-error");
        }
    });

});

</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const toggleAllBtn = document.querySelector(".toggle-all");
    const checkboxes = document.querySelectorAll(
        '.item:not(.disabled) input[type="checkbox"]'
    );

    let allChecked = false;

    toggleAllBtn.addEventListener("click", function (e) {
        e.preventDefault();

        allChecked = !allChecked;

        checkboxes.forEach(cb => {
            cb.checked = allChecked;
        });

        // Optional: change button text
        this.textContent = allChecked ? "Untoggle all" : "Toggle all";
    });
});
</script>

