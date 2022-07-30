

<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <form id="userRegistrationForm">
            <div class="input-group mb-3">
                <input id="userName" type="text" class="form-control pl-2" placeholder="Your name">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input id="userEmail" type="email" class="form-control pl-2" placeholder="email" autocomplete="on">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input id="userPhone" type="text" class="form-control pl-2" placeholder="Phone">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-mobile"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input id="userPassword" type="password" class="form-control pl-2" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="input-group">
                <input id="userConfirmPassword" type="password" class="form-control  pl-2" placeholder="Retype password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <!-- <button id="userRegistrationBtn"   class="btn btn-primary">
                    SignUp <span class="spinner-border spinner-border-sm signUpSpinner" style="display:none;"></span> 
                    </button> -->

                    <button id="userRegistrationBtn" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm signUpSpinner" style="opacity:0;"></span>
                        Loading..
                    </button>
                </div>
            </div>
    </form>
</div>