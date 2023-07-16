 <?php

    if (isset($_GET['uidd'])) {
        $user_idd = $_GET['uidd'];
        $query = "SELECT * FROM users WHERE user_id = $user_idd";
        $all_user_query = mysqli_query($connection, $query);
        if (!$all_user_query) {
            die("CONNECTION FAILED" . " " . mysqli_error($connection));
        }
    }
    ?>
 <style>
     .img-account-profile {
         height: 10rem;
     }

     .rounded-circle {
         border-radius: 50% !important;
     }
 </style>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Profile</h1>
                 </div>
                 <?php updateUserProfile(); ?>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-3">
                     <?php while ($row = mysqli_fetch_assoc($all_user_query)) {

                            $user_id = $row['user_id'];
                            $username = $row['username'];
                            $user_image = $row['user_image'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_email = $row['user_email'];
                            $user_role = $row['user_role'];
                            $user_password = $row['user_password'];
                            $user_date = date("F j, Y, g:i a", strtotime($row["user_date"]));
                        } ?>
                     <!-- Profile Image -->

                     <div class="card card-primary card-outline">

                         <div class="card-body box-profile">
                             <div id="selectedBanner" class="img-account-profile rounded-circle mb-2 text-center">
                                 <img class="img-account-profile rounded-circle mb-2" id="selectedBanner" src="<?php echo $user_image ?>" alt="">
                             </div>


                             <h3 class="profile-username text-center"><?php echo $user_firstname . " " . $user_lastname; ?></h3>

                             <p class="text-muted text-center"><?php echo $user_role; ?></p>

                             <form method="post" enctype="multipart/form-data">


                                 <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                 <!-- Profile picture help block-->
                                 <input type="file" id="img" name="user_image" class="form-control small font-italic text-muted mb-4" value="<?php echo $user_image; ?>" required>
                                 <button class="btn btn-warning" type="submit" name="update_image">Update image</button>
                                 <a class=" btn btn-small btn-outline-secondary" href=""> <i class="fas fa-undo"></i> Refresh</a>
                             </form>


                         </div>
                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <!-- /.col -->
                 <div class="col-md-9">
                     <div class="card">
                         <div class="card-header p-2">
                             <ul class="nav nav-pills">

                                 <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                                 <li class="nav-item"></li>
                             </ul>
                         </div><!-- /.card-header -->
                         <div class="card-body">
                             <div class="tab-content">

                                 <div class="active tab-pane" id="settings">
                                     <form class="form-horizontal" method="POST">
                                         <div class="form-group row">
                                             <label for="inputFName" class="col-sm-2 col-form-label">First Name</label>
                                             <div class="col-sm-10">
                                                 <input type="hidden" value="<?php echo $user_id; ?>" name="user_id" />
                                                 <input type="text" class="form-control" id="inputName" placeholder="First Name" name="user_firstname" value="<?php echo $user_firstname; ?>">
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="inputLName" class="col-sm-2 col-form-label">Last Name</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control" id="inputName" placeholder="Last Name" name="user_lastname" value="<?php echo $user_lastname; ?>">
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                             <div class="col-sm-10">
                                                 <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="user_email" value="<?php echo $user_email; ?>">
                                             </div>
                                         </div>

                                         <div class="form-group row">
                                             <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control" id="inputEmail" placeholder="Username" name="username" value="<?php echo $username; ?>">
                                             </div>
                                         </div>

                                         <div class="form-group row">
                                             <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                             <div class="col-sm-10">
                                                 <input type="password" class="form-control" name="user_password" id="inputName2" placeholder="New Password" onClick="this.setSelectionRange(0, this.value.length)" required>

                                                 <input type="hidden" class="form-control" id="inputEmail" placeholder="Username" name="user_role" value="<?php echo $user_role; ?>">
                                             </div>
                                         </div>
                                         <div class=" form-group row">
                                             <div class="offset-sm-2 col-sm-10">
                                                 <button type="submit" name="update_profile" class="btn btn-danger">Submit</button>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                                 <!-- /.tab-pane -->
                             </div>
                             <!-- /.tab-content -->
                         </div><!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <!-- /.col -->
             </div>
             <!-- /.row -->
         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <!-- DISPLAY SELECTED IMAGE -->
 <script>
     var selDiv = "";
     var storedFiles = [];
     $(document).ready(function() {
         $("#img").on("change", handleFileSelect);
         selDiv = $("#selectedBanner");
     });

     function handleFileSelect(e) {
         var files = e.target.files;
         var filesArr = Array.prototype.slice.call(files);
         filesArr.forEach(function(f) {
             if (!f.type.match("image.*")) {
                 return;
             }
             storedFiles.push(f);

             var reader = new FileReader();
             reader.onload = function(e) {
                 var html =
                     '<img class="img-account-profile rounded-circle mb-2" src="' +
                     e.target.result +
                     "\" data-file='" +
                     f.name +
                     "alt='Category Image'  height='10rem'>";
                 selDiv.html(html);
             };
             reader.readAsDataURL(f);
         });
     }
 </script>