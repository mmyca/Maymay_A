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

<!-- Required Scripts -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
<script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>

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
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Show the QR code result in the modal
        document.getElementById('qr-result').innerHTML = `<p>Scanned QR Code: <strong>${decodedText}</strong></p>`;

        // Optionally, send data to the server
        // You can send the decodedText to the server using an AJAX request
        $.ajax({
            url: '<?= base_url("admin/handleQRScan"); ?>', // Your server URL for handling the scan
            type: 'POST',
            data: {qrData: decodedText},
            success: function(response) {
                console.log(response);
                // Handle the server response here
            }
        });

        // Stop the QR scanner after successful scan
        html5QrcodeScanner.clear();
    }

    // Initialize the QR scanner
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", 
        {
            fps: 10, 
            qrbox: 250
        },
        true
    );

    html5QrcodeScanner.render(onScanSuccess);
</script>
</body>
</html>
