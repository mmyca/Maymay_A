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
                  <div class="col-8">
                    <div class="card">
                      <div class="card-header">
                        <!-- <h3 class="card-title">User List</h3> --><!-- 
                        <div class="card-tools d-flex"> -->
                         	<div class="card card-primary mt-4">
							    <div class="card-header">
							        <h3 class="card-title">Upload NDVI Images</h3>
							    </div>
							    <form action="<?= base_url('users/upload_ndvi_process') ?>" method="post" enctype="multipart/form-data">
							        <div class="card-body">
							            <div class="form-group">
							                <label for="nir_image">NIR Image</label>
							                <input type="file" class="form-control-file" name="nir_image" id="nir_image" accept=".jpg,.jpeg,.png,.gif" required>
							            </div>
							            <div class="form-group">
							                <label for="red_image">Red Image</label>
							                <input type="file" class="form-control-file" name="red_image" id="red_image" accept=".jpg,.jpeg,.png,.gif" required>
							            </div>
							        </div>
							        <div class="card-footer">
							            <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Upload</button>
							        </div>
							    </form>
							</div>

                      <!-- </div> -->
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