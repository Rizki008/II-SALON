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

<script src="<?= base_url() ?>template/plugins/select2/js/select2.full.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>

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

<script>
    $(document).ready(function() {
        $('#select2').select2();
    });
</script>


<script type="text/javascript">
    $(function() {
        $("#btn_send_chat").click(function() {
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?= site_url('pesan/send_mgs_chat') ?>',
                data: {
                    'msg': $('#text_message_chat').val(),
                    'id_pelanggan': $('#text_id_pelanggan').val()
                },
                success: function(msg) {
                    console.log(msg);
                    //alert('wow' + msg);
                    $('.direct-chat-messages').append('<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">' + msg.username + ' </span><span class="direct-chat-timestamp float-left">' + msg.time_chatting + '</span ></div><div class="direct-chat-text">' + msg.balas + '</div></div>');
                }
            });
            $('#text_message_chat').val('');
            $('#text_message_chat').focus();
        });
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>

</body>

</html>