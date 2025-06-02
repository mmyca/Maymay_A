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
                <!-- /.row -->
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h1 class="m-0">
                            <?php
                                $dir = FCPATH . 'assets/ndvi/';
                                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                                $files = scandir($dir);
                            ?>

                            <div class="row">
                                <?php foreach ($files as $file) :
                                    $file_path = $dir . $file;
                                    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                                    if (is_file($file_path) && in_array($extension, $allowed_extensions)) :
                                        $image_url = base_url('assets/ndvi/' . $file);
                                ?>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <!-- Filename removed from visible header -->
                                            <div class="card-body text-center">
                                                <img src="<?= $image_url ?>" class="img-fluid" alt="NDVI Image" title="<?= $file ?>">
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; endforeach; ?>
                            </div>
                        </h1>
                        <div class="card-tools d-flex">
                          
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
            </div>
        </section>
    </div>