 <div class="row">
   <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
     <div class="login-brand">
       <a href="index.html"> Forgot<i class="fas fa-id-card" style="font-size: 30px; margin-right: 10px;"></i></a>
     </div>

     <div class="card card-primary">
       <div class="card-header">
         <h4>Forgot Password</h4>
       </div>

       <div class="card-body">
         <p class="text-muted">Please field your ID</p>
         <form method="post" action="<?= BASE_PATH ?>login/forgotChack">
           <div class="form-group">
             <label for="email">Username or ID</label>
             <input id="email" type="text" class="form-control" name="user_id" tabindex="1" required autofocus>
           </div>

           <div class="form-group">
             <button type="submit" name="forgot" class="btn btn-primary btn-lg btn-block" tabindex="4">
               Forgot Password
             </button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>