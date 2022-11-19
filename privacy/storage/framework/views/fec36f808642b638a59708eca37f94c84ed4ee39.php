<?php $__env->startSection('title', 'Laporan Produk Bulanan'); ?>

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
                  <h4 class="modal-title">Laporan <b>Produk Bulanan</b> [ <button type="button" class="btn btn-primary btn-xs" style="font-size: 10px">GUNAKAN KERTAS UKURAN <b>LEGAL</b></button> ]</h4>
                </div>
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['route' => ['laporanprodukbulanan.export'],'method' => 'get','id'=>'form', 'target'=>"_blank"]); ?>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('bulan', 'Bulan:')); ?>

                                        <?php echo e(Form::selectMonth('month', null, ['class'=> 'form-control select2','id'=>'namabulan','required'=>'required', 'placeholder'=>'','style'=>'width: 100%'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('tahun', 'Tahun:')); ?>

                                        <?php echo e(Form::selectYear('year', 2000, 2030, null, ['class'=> 'form-control select2','id'=>'namatahun','required'=>'required', 'placeholder'=>'','style'=>'width: 100%'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('item', 'Pilih Field:')); ?>

                                        <?php echo e(Form::select('item', ['SEMUA' => 'SEMUA', 'Amount' => 'Amount', 'Stock' => 'Stock'], null, ['class'=> 'form-control select2','id'=>'item','required'=>'required', 'placeholder'=>'','style'=>'width: 100%'])); ?>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"> 
                                        <?php echo e(Form::label('kategori', 'Kategori Produk:')); ?>              
                                        <?php echo e(Form::select('kategori', ['SEMUA'=>'SEMUA',$kategori], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'kategori1','required'=>'required'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('format_cetak', 'Format Cetak:')); ?>

                                        <?php echo e(Form::select('format_cetak', ['PDF' => 'PDF', 'Excel' => 'Excel'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'format1','required'=>'required'])); ?>

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

        function load(){
            $('#button4').modal('show');
        }

        function panggil(){
            load();
            startTime();
        }

        $('.select2').select2({
            placeholder: "Pilih",
            allowClear: true,
        });

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