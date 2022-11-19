<?php $__env->startSection('title', 'Laporan Pemakaian'); ?>

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
                  <h4 class="modal-title">Laporan <b>Pemakaian</b></h4>
                </div>
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['route' => ['laporanpemakaian.export'],'method' => 'get','id'=>'form', 'target'=>"_blank"]); ?>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tanggal_awal', 'Dari Tanggal:')); ?>

                                        <?php echo e(Form::date('tanggal_awal',\Carbon\Carbon::now(), ['class'=> 'form-control','id'=>'tanggal1'])); ?>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tanggal_akhir', 'Sampai Tanggal:')); ?>

                                        <?php echo e(Form::date('tanggal_akhir',\Carbon\Carbon::now(), ['class'=> 'form-control','id'=>'tanggal2','placeholder'=>'Periode Baru'])); ?>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"> 
                                        <?php echo e(Form::label('kategori', 'Kategori Produk:')); ?>              
                                        <?php echo e(Form::select('kategori', $kategori, null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'kategori1'])); ?>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"> 
                                        <?php echo e(Form::label('tipe', 'Tipe Pemakaian:')); ?>              
                                        <?php echo e(Form::select('tipe', ['Alat' => 'Alat', 'Mobil' => 'Mobil', 'Semua' => 'Semua'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'tipe1','required'=>'required'])); ?>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">  
                                        <?php echo e(Form::label('pilih', 'Status:')); ?>              
                                        <?php echo e(Form::select('status', ['SEMUA' => 'SEMUA', 'OPEN' => 'OPEN', 'POSTED' => 'POSTED'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'status1','required'=>'required'])); ?>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"> 
                                        <?php echo e(Form::label('pilih', 'Format Laporan:')); ?>              
                                        <?php echo e(Form::select('jenis_report', ['PDF' => 'PDF', 'excel' => 'Excel'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'report1','required'=>'required'])); ?>

                                    </div>
                                </div>   
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <?php echo e(Form::submit('Cetak', ['class' => 'btn btn-success crud-submit'])); ?>

                                <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

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
            placeholder: "Pilih",
            allowClear: true,
        });

        function cetakpdf() {
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

            swal({
            title: "Cetak PDF?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, Cetak!",
            cancelButtonText: "Batal",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url:'<?php echo route('laporanpemakaian.export'); ?>',
                    type:'GET',
                    data:formData,
                    success:function(result) {
                            swal("Berhasil!<br><b>PDF berhasil dicetak</b>");
                    },
                error : function() {
                        swal("GAGAL!<br><b>PDF gagal dicetak</b>");
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })

        }

        function load(){
            $('#button4').modal('show');
        }

        function panggil(){
            load();
            startTime();
        }

        // function load(){
        //      var open = $("#tanggal1").val();

        //      var newdate = new Date(open);
        //      var dd = newdate.getDate();
        //      var mm = newdate.getMonth() + 1;
        //      var y = newdate.getFullYear();

        //      var dd_new = '01';

        //      if(mm<12){
        //          var mm_new = mm+1;

        //          var someFormattedDate = y + '-' + mm_new + '-' + dd_new;
        //          console.log(someFormattedDate)
        //          document.getElementById('tanggal2').value = someFormattedDate;
        //      }
        //      else if(mm==12){
        //          var mm_new = '01';
        //          var y_new = y+1;

        //          var someFormattedDate = y_new + '-' + mm_new + '-' + dd_new;
        //          console.log(someFormattedDate)
        //          document.getElementById('tanggal2').value = someFormattedDate;
        //      }
             
        // }

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