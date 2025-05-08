    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">TOTAL</span>
                        <span class="info-box-number"><?= $admin_count + $user_count ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">ADMIN</span>
                          <span class="info-box-number"><?= $admin_count ?></span>
                      </div>

                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->

                  <!-- fix for small devices only -->
                  <div class="clearfix hidden-md-up"></div>

                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">USERS</span>
                        <span class="info-box-number"><?= $user_count ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                </div>
                <!-- /.row -->
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Accounts</h1>
                    </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">User List</h3>
                        <div class="card-tools d-flex">
                          <!-- Search Form -->
                          <form action="<?= base_url('admin/search') ?>" method="get">
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Gender</th>
                              <th>Birth of Date</th>
                              <th>Email Address</th>
                              <th>User Type</th>
                              <th>QR Code</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $idCounter = 1;
                                foreach($users as $user){
                            ?>
                            <tr>
                                <td><?= $idCounter++; ?></td>
                                <td><?= $user->firstname ." ". $user->middlename ." ". $user->lastname ?></td>
                                <td><?= $user->address ?></td>
                                <td><?= $user->gender ?></td>
                                <td><?= $user->bod ?></td>
                                <td><?= $user->email_add ?></td>
                                <td><?= $user->usertype?></td>
                                <td>
                                  <?php
                                    $path = 'assets/qr_images/qr_'.$user->id.'_'.$user->firstname.'.png';
                                    // var_dump(file_exists(FCPATH.$path));
                                    if(file_exists(FCPATH.$path)) {?>
                                        <img src="<?= base_url($path)?>" style="width: 80%">
                                    <?php } else { ?>
                                        <a href="<?= base_url('admin/generateQR/'.$user->id) ?>"></a>
                                    <?php } 
                                  ?>
                                </td>

                            </tr>
                            <?php }?>

                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
            </div>
        </section>
    </div>