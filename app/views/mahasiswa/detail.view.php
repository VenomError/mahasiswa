 <?php
  foreach ($data['mahasiswa'] as $d) {
  ?>
   <div class="col-12 col-sm-12 col-lg-5">
     <div class="card profile-widget">
       <div class="profile-widget-header">
         <img alt="image" src="<?= BASE_ASSETS ?>assets/avatars/<?= $d['avatars'] ?>" class="rounded-circle profile-widget-picture">
         <div class="profile-widget-items">
           <div class="profile-widget-item">
             <div class="profile-widget-item-label">Posts</div>
             <div class="profile-widget-item-value">187</div>
           </div>
           <div class="profile-widget-item">
             <div class="profile-widget-item-label">Followers</div>
             <div class="profile-widget-item-value">6,8K</div>
           </div>
           <div class="profile-widget-item">
             <div class="profile-widget-item-label">Following</div>
             <div class="profile-widget-item-value">2,1K</div>
           </div>
         </div>
       </div>
       <div class="profile-widget-description pb-0">
         <div class="profile-widget-name"><?= $d['nama_mahasiswa'] ?><div class="text-muted d-inline font-weight-normal">
             <div class="slash"></div><?= $d['nama_jurusan'] ?>
           </div>
         </div>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat.</p>
       </div>
       <div class="card-footer text-center pt-0">
         <div class="font-weight-bold mb-2 text-small">Follow Hasan On</div>
         <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
           <i class="fab fa-facebook-f"></i>
         </a>
         <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
           <i class="fab fa-twitter"></i>
         </a>
         <a href="#" class="btn btn-social-icon mr-1 btn-github">
           <i class="fab fa-github"></i>
         </a>
         <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
           <i class="fab fa-instagram"></i>
         </a>
       </div>
     </div>
     <div class="card mt-4">
       <div class="card-header">
         <h4>Authors</h4>
       </div>
       <div class="card-body pb-0">
         <div class="row">
           <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
             <div class="avatar-item">
               <img alt="image" src="assets/img/avatar/avatar-1.png" class="img-fluid" data-toggle="tooltip" title="Syahdan Ubaidillah">
               <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
             </div>
           </div>
           <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
             <div class="avatar-item">
               <img alt="image" src="assets/img/avatar/avatar-2.png" class="img-fluid" data-toggle="tooltip" title="Danny Stenvenson">
               <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
             </div>
           </div>
           <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
             <div class="avatar-item">
               <img alt="image" src="assets/img/avatar/avatar-3.png" class="img-fluid" data-toggle="tooltip" title="Riko Huang">
               <div class="avatar-badge" title="Author" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></div>
             </div>
           </div>
           <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
             <div class="avatar-item">
               <img alt="image" src="assets/img/avatar/avatar-4.png" class="img-fluid" data-toggle="tooltip" title="Luthfi Hakim">
               <div class="avatar-badge" title="Author" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></div>
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
             <div class="avatar-item">
               <img alt="image" src="assets/img/avatar/avatar-5.png" class="img-fluid" data-toggle="tooltip" title="Alfa Zulkarnain">
               <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
             </div>
           </div>
           <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
             <div class="avatar-item">
               <img alt="image" src="assets/img/avatar/avatar-4.png" class="img-fluid" data-toggle="tooltip" title="Egi Ferdian">
               <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
             </div>
           </div>
           <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
             <div class="avatar-item">
               <img alt="image" src="assets/img/avatar/avatar-1.png" class="img-fluid" data-toggle="tooltip" title="Jaka Ramadhan">
               <div class="avatar-badge" title="Author" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></div>
             </div>
           </div>
           <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
             <div class="avatar-item">
               <img alt="image" src="assets/img/avatar/avatar-2.png" class="img-fluid" data-toggle="tooltip" title="Ryan">
               <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

 <?php } ?>