<?php $__env->startSection('title', 'Endofmonth'); ?>

<?php $__env->startSection('content_header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="panggil()">
    <div class="box box-solid">

        <div class="modal fade" id="button4"  role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">End of <b>Month</b></h4>
                </div>
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['id'=>'ADD']); ?>

                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <?php echo e(Form::label('tanggal_awal', 'Tutup Periode:')); ?>

                                        <?php echo e(Form::select('tanggal_awal',$tanggal,null, ['class'=> 'form-control','id'=>'tanggal1','onchange'=>'load();'])); ?>

                                    </div>
                                    <div class="col-sm-4">
                                        <?php echo e(Form::label('tanggal_akhir', 'Buka Periode:')); ?>

                                        <?php echo e(Form::text('tanggal_akhir',null, ['class'=> 'form-control','id'=>'tanggal2','placeholder'=>'Periode Baru','readonly'])); ?>

                                    </div>
                                </div>   
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <button type="button" class="tombol1 btn btn-success btn-md" id="button1">Submit</button>
                                <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>

</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.select2').select2({
            placeholder: "Periode Baru",
            allowClear: true,
        });

        function load(){
            $('#button4').modal('show');

            var open = $("#tanggal1").val();
            
            if(open == null){
                swal("Gagal!", "Silahkan Re-Open Close Terlebih Dahulu");
                button1.disabled = true;
            }
            else{
                 var newdate = new Date(open);
                 var dd = newdate.getDate();
                 var mm = newdate.getMonth() + 1;
                 var y = newdate.getFullYear();

                 var dd_new = '01';

                 if(mm<12){
                     var mm_new = mm+1;

                     var someFormattedDate = y + '-' + mm_new + '-' + dd_new;
                     console.log(someFormattedDate)
                     document.getElementById('tanggal2').value = someFormattedDate;
                 }
                 else if(mm==12){
                     var mm_new = '01';
                     var y_new = y+1;

                     var someFormattedDate = y_new + '-' + mm_new + '-' + dd_new;
                     console.log(someFormattedDate)
                     document.getElementById('tanggal2').value = someFormattedDate;
                 }
            }  
        }

        function panggil(){
            load();
            startTime();
        }


        $('#button1').click( function () {
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

            swal({
                    title: "<b>Proses Sedang Berlangsung</b>",
                    type: "warning",
                    showCancelButton: false,
                    showConfirmButton: false
                })

                        $.ajax({
                            url: '<?php echo route('endofmonth.change'); ?>',
                            type: 'POST',
                            data:formData,
                            success: function(data) {
                                console.log(data);
                                if (data.success === true) {
                            swal("Done!", data.message, "success");
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    },
                });
            }
        );

        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);;
        }

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({
    
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>