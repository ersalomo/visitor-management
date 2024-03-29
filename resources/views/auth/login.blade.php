 <x-app-layout pageTitle="Login">
     <div class="main-wrapper account-wrapper bg-wrapper">
         <div class="account-page">
             <div class="account-center">
                 <div class="account-logo">
                     <a href="index.html"><img src="assets/img/logo.png" alt="Logo"></a>
                 </div>
                 <div class="account-box">
                     <div class="login-header">
                         <h3>Let's Get Started</h3>
                         <p>Sign in to continue to Crypto</p>
                     </div>
                     <form action="/api/login" method="post" class="form-signin" id="sing-in">
                         <div class="form-group">
                             <input type="text" autofocus="true" v-model="email" name="email" class="form-control"
                                 placeholder="Username">
                             <span class="profile-views">
                                 <img src="assets/img/icon/lock-icon-01.svg" alt="">
                             </span>
                         </div>
                         <span class="text-danger email_error error-text"></span>
                         <div class="form-group">
                             <input type="password" v-model="password" class="form-control" name="password"
                                 placeholder="Password">
                             <span class="profile-views"><img src="assets/img/icon/lock-icon-02.svg" alt="">
                             </span>
                         </div>
                         <span class="text-danger password_error error-text "></span>
                         <div class="forgotpass">
                             <div class="remember-me">
                                 <label class="custom_check me-2 mb-0 d-inline-flex remember-me"> Remember me
                                     <input type="checkbox" name="radio">
                                     <span class="checkmark"></span>
                                 </label>
                             </div>
                             <a href=""><img src="assets/img/icon/lock-icon.svg" class="me-1"
                                     alt="">Forgot
                                 your password?</a>
                         </div>
                         <div class="form-group text-center">
                             <button type="submit" class="btn btn-primary account-btn">Sign In <i
                                     class="fas fa-arrow-right ms-1"></i></button>
                         </div>
                         <div class="text-center register-link">
                             Don't have an account?
                             <a href="{{ route('login.register') }}">Sign Up</a>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>
 @push('scripts')
     <script>
         $(document).ready(function() {
             $("#sing-in").on("submit", function(e) {
                 e.preventDefault();
                 e.stopPropagation();
                 const o = "rtl" === $("html").attr("data-textdirection");
                 $.ajax({
                     url: e.target["action"],
                     method: e.target["method"],
                     processData: false,
                     contentType: false,
                     dataType: "json",
                     data: new FormData(e.target),
                     beforeSend: function(res) {
                         $(e.target).find("span.error-text").text("");
                     },
                     success: function(res) {
                         if (!res.status) {
                             $.each(res.errors, (prefix, val) => {
                                 // $("span." + prefix + "_error").text(val[0]);
                                 toastr.warning(prefix + ":" + val, {
                                     positionClass: "toast-top-center",
                                     closeButton: !0,
                                     tapToDismiss: !1,
                                     rtl: o,
                                 });
                             });
                             return;
                         }
                         toastr.success("Berhasil Login", {
                             positionClass: "toast-top-center",
                             closeButton: !0,
                             tapToDismiss: !1,
                             rtl: o,
                         });
                         $(e.target)[0].reset();
                         localStorage.setItem("acces_token", res.access_token);
                         window.location.href = "/home?token=" + res.access_token;
                     },
                     error: function({
                         responseJSON
                     }) {
                         toastr.warning(responseJSON.error, {
                             positionClass: "toast-top-center",
                             closeButton: !0,
                             tapToDismiss: !1,
                             rtl: o,
                         });
                         console.log(responseJSON, "eerpr");
                     },
                 });
             });
         });
     </script>
 @endpush
