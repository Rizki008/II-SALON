<div class="footer">
    <div class="copyright">
        <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
    </div>
</div>
</div>

<script src="<?= base_url() ?>template/plugins/common/common.min.js"></script>
<script src="<?= base_url() ?>template/js/custom.min.js"></script>
<script src="<?= base_url() ?>template/js/settings.js"></script>
<script src="<?= base_url() ?>template/js/gleek.js"></script>
<script src="<?= base_url() ?>template/js/styleSwitcher.js"></script>

<!-- Chartjs -->
<script src="<?= base_url() ?>template/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="<?= base_url() ?>template/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="<?= base_url() ?>template/plugins/d3v3/index.js"></script>
<script src="<?= base_url() ?>template/plugins/topojson/topojson.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="<?= base_url() ?>template/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>template/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="<?= base_url() ?>template/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>template/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="<?= base_url() ?>template/plugins/chartist/js/chartist.min.js"></script>
<script src="<?= base_url() ?>template/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

<script src="<?= base_url() ?>template/js/dashboard/dashboard-1.js"></script>

<script src="<?= base_url() ?>template/plugins/summernote/dist/summernote.min.js"></script>
<script src="<?= base_url() ?>template/plugins/summernote/dist/summernote-init.js"></script>

<script src="<?= base_url() ?>template/plugins/tables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>template/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>template/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

<script src="<?= base_url() ?>template/plugins/sweetalert/js/sweetalert.min.js"></script>
<script src="<?= base_url() ?>template/plugins/sweetalert/js/sweetalert.init.js"></script>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>


</body>

</html>