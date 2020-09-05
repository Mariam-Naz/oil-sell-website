<?php require_once('../resources/config.php'); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
      <div class="text-center">
                    <h1 class="login-heading">Login</h1>
                </div>
    
        <div>         
            <form class="login" action="" method="post" enctype="multipart/form-data" autocomplete="off"> 
                <?php login_user(); ?>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group">
                 <label>Password</label>
                 <input type="password" name="password" class="form-control"></label>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>  
     
    <!-- /.container -->