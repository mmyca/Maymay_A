<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Account</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User List</h3>
                            <div class="card-tools">
                                <!-- Add User Button (Triggers Modal) -->
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addUserModal">
                                    <i class="fas fa-user-plus"></i> Add User
                                </button>
                            </div>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $idCounter = 1;
                                        foreach($users as $user) { 
                                    ?>
                                    <tr>
                                        <td><?= $idCounter++; ?></td>
                                        <td><?= $user->firstname ." ". $user->middlename ." ". $user->lastname ?></td>
                                        <td><?= $user->address ?></td>
                                        <td><?= $user->gender ?></td>
                                        <td><?= $user->bod ?></td>
                                        <td><?= $user->email_add ?></td>
                                        <td><?= $user->usertype ?></td>
                                        <td>
                                            <?php
                                                $path = 'assets/qr_images/qr_'.$user->id.'_'.$user->firstname.'.png';
                                                // var_dump(file_exists(FCPATH.$path));
                                                if(file_exists(FCPATH.$path)) {?>
                                                    <img src="<?= base_url($path)?>" style="width: 100%">
                                                <?php } else { ?>
                                                    <a href="<?= base_url('admin/generateQR/'.$user->id) ?>" class="btn btn-primary">Generate QR Code</a>
                                                <?php } ?>
                                        </td>
                                        <td>
                                            <!-- Edit Button (Triggers Modal) -->
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $user->id ?>">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>

                                            <!-- Delete Button with Alert -->
                                            <a href="<?= base_url('admin/delete/'.$user->id) ?>" 
                                               class="btn btn-danger btn-sm" 
                                               onclick="return confirm('Are you sure you want to delete this user?');">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Edit User Modal -->
                                    <div class="modal fade" id="editModal<?= $user->id ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit User</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('admin/update/'.$user->id) ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" name="firstname" class="form-control" value="<?= $user->firstname ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Middle Name</label>
                                                            <input type="text" name="middlename" class="form-control" value="<?= $user->middlename ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" name="lastname" class="form-control" value="<?= $user->lastname ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" name="address" class="form-control" value="<?= $user->address ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <select name="gender" class="form-control">
                                                                <option value="Male" <?= ($user->gender == 'Male') ? 'selected' : '' ?>>Male</option>
                                                                <option value="Female" <?= ($user->gender == 'Female') ? 'selected' : '' ?>>Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Birth of Date</label>
                                                            <input type="text" class="form-control" value="<?= $user->bod ?>" disabled>
                                                            <input type="hidden" name="bod" value="<?= $user->bod ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email Address</label>
                                                            <input type="text" class="form-control" value="<?= $user->email_add ?>" disabled>
                                                            <input type="hidden" name="email_add" value="<?= $user->email_add ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email Address</label>
                                                            <input type="text" class="form-control" value="<?= $user->email_add ?>" disabled>
                                                            <input type="hidden" name="email_add" value="<?= $user->email_add ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Edit Modal -->
                                    <?php } ?>
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

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/registration_process') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Birth of Date</label>
                        <input type="date" name="bod" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email_add" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Retype Password</label>
                        <input type="password" class="form-control" required name="retype"  value="<?= @$this->session->flashdata('retype');?>">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="usertype" value="admin">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add User Modal -->