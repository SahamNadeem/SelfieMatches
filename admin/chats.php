<?php
include('./components/navbar.php')
?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <?php
        if (!isset($_GET['result']) && !isset($_GET['view'])) {
      ?>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">26 New Messages!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">View User Data</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">Update Adds</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">13 New Alerts</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
      <!-- Area Chart Example-->
      <div class="row">
        <div class="col-lg-12">
          <!-- Example Bar Chart Card-->
          <!-- Card Columns Example Social Feed-->
          
      <!-- Example DataTables Card-->
      <?php
      if (!isset($_GET['result']) && !isset($_GET['view'])) {
      $users = new Messages();
      $t = $users->unnread();
      ?>
      <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bell-o"></i>Messages From</div>
            <div class="list-group list-group-flush small">
              <?php 
                if (mysqli_num_rows($t)>0) {
                  while ($row = mysqli_fetch_array($t)) {
                    echo '<a class="list-group-item list-group-item-action" href="chats.php?view='.$row['id'].'">
                            <div class="media">
                              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                              <div class="media-body">
                                <i class="fa fa-code-fork"></i>
                                <strong>Password Reset Request</strong> from
                                <strong>'.$row['email'].'</strong>Click to responce on
                                <strong>Reset</strong>
                                <div class="text-muted smaller">Today at '.$row['date'].'</div>
                              </div>
                            </div>
                          </a>';
                  }
                }
                 echo '<a class="list-group-item list-group-item-action" href="chats.php?result=all">View all activity...</a>
                           </div>
                            <div class="card-footer small text-muted">
                            Updated yesterday at 11:59 PM
                            </div>';
              }
              if (isset($_GET['view'])) {
                $users = new Messages();
                $t = $users->getone($_GET['view']);
                $k = $users->view($_GET['view']);
                if (mysqli_num_rows($t)>0) {
                  while ($row = mysqli_fetch_array($t)) {
                      $uObj = new UserController();
                      $ret = $uObj->getemailuser($row['email']);
                      echo '<div class="card-body">
                      <h3 class="card-title mb-1">Request To forget Password</h3>
                      <p class="card-text small">'.$row['msg'].'
                      </p>
                      <div class="row">
                        <div class="col-md-4">
                          <input class="form-control" readonly value="'.$ret['password'].'"/>
                        </div>
                      </div>
                      <br/>
                    </div>';
                  }
                }
              }
              if (isset($_GET['result']))
              {
                $users = new Messages();
                $t = $users->read(); 
                if (mysqli_num_rows($t)>0) {
                  while ($row = mysqli_fetch_array($t)) {
                    echo '<a class="list-group-item list-group-item-action" href="chats.php?view='.$row['id'].'">
                            <div class="media">
                              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                              <div class="media-body">
                                <i class="fa fa-code-fork"></i>
                                <strong>Password Reset Request</strong> from
                                <strong>'.$row['email'].'</strong>Click to responce on
                                <strong>Reset</strong>
                                <div class="text-muted smaller">Today at '.$row['date'].'</div>
                              </div>
                            </div>
                          </a>';
                  }
                }  
              }
              ?>
          </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
