
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <form id="userLoginForm">
        <div class="input-group mb-3">
            <input id="userLogin_Email" type="email" class="form-control pl-2" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <div class="input-group">
            <input id="userLogin_Password" type="password" class="form-control pl-2" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
               <div class="d-flex align-items-center justify-content-between pr-2 pl-4">
                
               <span class="spinner-border spinner-border-md loginSpinner" style="opacity:0;"></span>
                <button id="userLoginBtns" class="btn btn-primary text-center mb-2">
                    Login
                </button>
               </div>
            </div>
        </div>
    </form>
</div>