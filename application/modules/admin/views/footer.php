<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>
</div>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/')?>plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
  $(function(){
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
</body>
</html>
