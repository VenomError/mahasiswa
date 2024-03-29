<!-- General JS Scripts -->
<script src="<?= BASE_ASSETS ?>assets/modules/jquery.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/popper.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/tooltip.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/moment.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= BASE_ASSETS ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/cleave-js/dist/cleave.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/izitoast/js/iziToast.min.js"></script>
<script src="<?= BASE_ASSETS ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>



<!-- Page Specific JS File -->
<script src="<?= BASE_ASSETS ?>assets/js/page/modules-datatables.js"></script>
<script src="<?= BASE_ASSETS ?>assets/js/page/forms-advanced-forms.js"></script>
<script src="<?= BASE_ASSETS ?>assets/js/page/modules-toastr.js"></script>
<script src="<?= BASE_ASSETS ?>assets/js/page/components-user.js"></script>




<!-- Template JS File -->
<script src="<?= BASE_ASSETS ?>assets/js/scripts.js"></script>
<script src="<?= BASE_ASSETS ?>assets/js/custom.js"></script>

<?php
function toaster($type = 'success', $title = '', $pesan = '')
{
  echo '?>
    <script>
        $(document).ready(function() {
            iziToast.' . $type . '({
                title: "' . $title . '",
                message: "' . $pesan . '",
                position: "topRight"
            });
        });
    </script>
    ';
}

if (isset($_SESSION['success'])) {
  toaster('success', 'Success', $_SESSION['success']);
  unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
  toaster('error', 'Error', $_SESSION['error']);
  unset($_SESSION['error']);
} ?>

<!-- <script>
  $(document).ready(function() {
    // Cek apakah session 'redirect' ada
    if (<?php echo isset($_SESSION['redirect']) ? 'true' : 'false'; ?>) {
      // Tunggu 3 detik, lalu hapus session 'redirect'
      setTimeout(function() {
        <?php unset($_SESSION['redirect']); ?>
      }, 3000);
    }
  });
</script> -->