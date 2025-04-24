
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RBIS | Registration Page</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>/dist/css/adminlte.min.css?v=3.2.0">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/')?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <style type="text/css">
    .swal2-popup.swal2-toast .swal2-title {
        font-size: 2rem!important;
        color: black!important;
    }
  </style>

  <style type="text/css">
    /*.select2-container--default .select2-selection--single .select2-selection__rendered {
          line-height: 20px!important;
      }*/
    .select2-container .select2-selection--single {
      height: 39px!important;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url()?>" class="h1"><b>RBIS </b> 📨</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>
      <form action="<?= base_url('users/registration_process/')?>" method="post">
        <label>First Name</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="First Name" name="firstname" required value="<?= @$this->session->flashdata('firstname');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <label>Middle Name</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Middle Name" name="middlename" required value="<?= @$this->session->flashdata('middlename');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <label>Last Name</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Last Name" name="lastname" required value="<?= @$this->session->flashdata('lastname');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <label>Address</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Address" name="address" required value="<?= @$this->session->flashdata('address');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>

        <label>Gender</label>
        <div class="form-group clearfix ml-3">
          <select class="select2" style="width: 100%;" required name="gender">
            <option <?= @$this->session->flashdata('gender') == "Male" ? "selected" : "";?>>Male</option>
            <option <?= @$this->session->flashdata('gender') == "Female" ? "selected" : "";?>>Female</option>
          </select>
        </div>

        <label>Birth of Date</label>
        <div class="input-group mb-3">
          <input type="date" class="form-control" placeholder="Birth of Date" name="bod" required value="<?= @$this->session->flashdata('bod');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>

        <label>Email</label>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email_add" required value="<?= @$this->session->flashdata('email_add');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <label>Password</label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" required name="password" value="<?= @$this->session->flashdata('password');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <label>Retype Password</label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" required name="retype"  value="<?= @$this->session->flashdata('retype');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="<?= base_url()?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= base_url('assets/')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/')?>/dist/js/adminlte.min.js?v=3.2.0"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/')?>/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/')?>plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
  $(function () {
    $('.select2').select2();

    var message = '<?= @$this->session->flashdata('message');?>';
    var icon = '<?= @$this->session->flashdata('icon');?>';
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 10000
    });
    if(message != ""){
      Toast.fire({
        icon: icon,
        title: message
      })
    }
  })
</script>

<?php
  $this->session->set_flashdata('firstname', '');
  $this->session->set_flashdata('middlename','');
  $this->session->set_flashdata('lastname', '');
  $this->session->set_flashdata('address', '');
  $this->session->set_flashdata('gender', '');
  $this->session->set_flashdata('bod', '');
  $this->session->set_flashdata('email_add', '');
  $this->session->set_flashdata('password', '');
  $this->session->set_flashdata('retype', '');
  $this->session->set_flashdata('message', '');
  $this->session->set_flashdata('icon', '');
?>
</body>
</html>
