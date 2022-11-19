<?php $__env->startSection('title', 'Pemakaian'); ?>

<?php $__env->startSection('content_header'); ?>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
   
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-header with-border">
            <font style="font-size: 16px;">Manages <b>Pemakaian</b></font>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                   
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                        <i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Pemakaian</button>
                    <span class="pull-right"> 
                    
                        
                    
                        
                        

                        <button type="button" class="tombol1 btn btn-success btn-xs" id="button1"><i class="fa fa-bullhorn"></i> POST</button>
                        <button type="button" class="tombol2 btn btn-warning btn-xs" id="button2"><i class="fa fa-undo"></i> UNPOST</button>
                        <button type="button" class="btn btn-primary btn-xs" id="button3"><i class="fa fa-paperclip"></i> VIEW DETAIL</button>
                        <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#button4">
                        <i class="fa fa-print"></i> PRINT ALL</button>    
                        
                    </span>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                <thead>
                <tr class="bg-success">
                    
                    <th>No Pemakaian</th>
                    
                    <th>Tanggal Pemakaian</th>
                    
                    <th>No Polisi</th>
                    <th>Nama Alat</th>
                    <th>Deskripsi</th>
                    <th>Pemakai</th>
                    <th>Total Item</th>
                    <th>Status</th>
                    <th>Tipe Pemakaian</th>
                    
                    
                    
                    <th>Action</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>

      <!-- /.col -->

<div class="modal fade" id="addform"  role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="row">
                    <div class="col-md-3">
                        <h4>Create Data</h4>   
                        
                    </div>
                  </div>
                </div>
                
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
               
                <?php echo Form::open(['id'=>'ADD']); ?>

                        <div class="modal-body">
                            <div class="row">
                                

                                
                                
                                

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Type', 'Tipe Pemakaian:',['class'=>'control-label'])); ?>

                                        <?php echo e(Form::select('type', ['1'=>'Mobil','2'=>'Alat','3'=>'Jasa','4'=>'Aset'],null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => 'Pilih','required'=>'required','id'=>'type','onchange'=>"pakai();"])); ?>

                                    </div>
                                </div>
        
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Tanggal Pemakaian', 'Tanggal Pemakaian:')); ?>

                                        <?php echo e(Form::date('tanggal_pemakaian', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal1','disabled','required'=>'required'])); ?>

                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('pemakai', 'Pemakai:')); ?>

                                        <?php echo e(Form::text('pemakai', null, ['class'=> 'form-control','id'=>'Pemakai1','disabled','required'=>'required', 'placeholder'=>'Pemakai'])); ?>

                                    </div>
                                </div>

                                
                                    <div class="col-md-4">
                                        <div class="form-group1">
                                            <div id="jasas">
                                            <?php echo e(Form::label('Type', 'Tipe Jasa:',['class'=>'control-label'])); ?>

                                            <?php echo e(Form::select('typejasa', ['Pilih Tipe Jasa' => 'Pilih Tipe Jasa', '1' => 'Mobil','2' => 'Alat',
                                            '3' => 'Umum'], null, ['class'=> 'form-control','id'=>'typejasa','onchange'=>"pakai2();"])); ?>

                                            </div>
                                        </div>
                                    </div>
                                
                                <div class="col-md-8">
                                    <div class="form-group1">
                                        <div id="nopols">
                                            <?php echo e(Form::label('nopol', 'Nomor Polisi:')); ?>

                                            <?php echo e(Form::select('kode_mobil',$Mobil,null, ['class'=>'form-control','id'=>'Nopol1','style'=>'width: 100%','placeholder' => 'Pilih Nomor Polisi','disabled'])); ?>

                                        </div>
                                        <div id="alats">
                                            <?php echo e(Form::label('kode_alat', 'Kode Alat:')); ?>

                                            <?php echo e(Form::select('kode_alat',$Alat,null, ['class'=>'form-control','id'=>'Alat1','style'=>'width: 100%','placeholder' => 'Pilih Alat','disabled'])); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <br>
                                        <?php echo e(Form::label('Deskripsi', 'Deskripsi:')); ?>

                                        <?php echo e(Form::textArea('deskripsi', null, ['class'=> 'form-control','rows'=>'4','id'=>'Deskripsi1','disabled', 'placeholder'=>'Deskripsi'])); ?>

                                    </div>
                                </div>

                                
        
                                
    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <?php echo e(Form::submit('Create data', ['class' => 'btn btn-success crud-submit'])); ?>

                                <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



<div class="modal fade" id="button4"  role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Pilih Bulan</h4>
                </div>
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['route' => ['pemakaian.export'],'method' => 'get','id'=>'form', 'target'=>"_blank"]); ?>

                        <div class="modal-body">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('bulan', 'Bulan:')); ?>

                                    <?php echo e(Form::selectMonth('month', null, ['class'=> 'form-control','id'=>'namabulan','required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tahun', 'Tahun:')); ?>

                                    <?php echo e(Form::selectYear('year', 2000, 2030, null, ['class'=> 'form-control','id'=>'namatahun','required'=>'required'])); ?>

                                    <span class="text-danger">
                                        <strong class="name-error" id="name-error"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <?php echo e(Form::submit('Cetak PDF', ['class' => 'btn btn-success crud-submit'])); ?>

                                <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>



<div class="modal fade" id="chart"  role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Pilih Jenis Pemakaian</h4>
                </div>
                <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::open(['route' => ['pemakaian.chart'],'method' => 'get','id'=>'form', 'target'=>"_blank"]); ?>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('type', 'Tipe Pemakaian:')); ?>

                                    <?php echo e(Form::select('type', ['Semua' => 'Semua', 'Mobil' => 'Mobil','Alat' => 'Alat',
                                'Jasa' => 'Jasa'], null, ['class'=> 'form-control'])); ?>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <?php echo e(Form::submit('View Chart', ['class' => 'btn btn-success crud-submit'])); ?>

                                <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>



<div class="modal fade" id="editform" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::open(['id'=>'EDIT']); ?>

                    
                            <div class="modal-body">
                                <div class="row">

                                    
                                           
                                            <?php echo e(Form::hidden('no_pemakaian', null, ['class'=> 'form-control','id'=>'Pemakaian','readonly'])); ?>

                                       
                                    
                                    

                                    

                               

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('Type', 'Tipe Pemakaian:')); ?>

                                            <?php echo e(Form::text('type', null, ['class'=> 'form-control','id'=>'typeedit','readonly'])); ?>

                                        </div>
                                    </div>
            
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('Tanggal Pemakaian', 'Tanggal Pemakaian:')); ?>

                                            <?php echo e(Form::date('tanggal_pemakaian', null,['class'=> 'form-control','id'=>'Tanggal'])); ?>

                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('pemakai', 'Pemakai:')); ?>

                                            <?php echo e(Form::text('pemakai', null, ['class'=> 'form-control','id'=>'Pemakai'])); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group2">
                                            <div id="nopols1">
                                            <?php echo e(Form::label('nopol', 'Nomor Polisi:')); ?>

                                            <?php echo e(Form::select('kode_mobil',$Mobil,null, ['class'=>'form-control','id'=>'Nopol','style'=>'width: 100%'])); ?>

                                            </div>
                                      
                                              <div id="alats1">
                                                <?php echo e(Form::label('kode_alat', 'Nama Alat:')); ?>

                                                <?php echo e(Form::select('kode_alat',$Alat,null, ['class'=>'form-control','id'=>'Alat','style'=>'width: 100%'])); ?>                                      
                                              </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <?php echo e(Form::label('Deskripsi', 'Deskripsi:')); ?>

                                            <?php echo e(Form::textArea('deskripsi', null, ['class'=> 'form-control','rows'=>'4','id'=>'Deskripsi'])); ?>

                                        </div>
                                    </div>

                                    

                                    

                                    
        
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success crud-submit'])); ?>

                                    <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                                </div>
                            </div>
                        <?php echo Form::close(); ?>

                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    
    <script type="text/javascript">
        function load(){
            $('.form-group1').hide();
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.form-group2').hide();
            // $('.form-group3').hide();
        }




        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            // scrollY: true,
            // scrollX: true,
            ajax: '<?php echo route('pemakaian.data'); ?>',
           
            columns: [
                // {
                //     "className":'details-control',
                //     "orderable":false,
                //     "data":null,
                //     "defaultContent":''
                // },
                { data: 'no_pemakaian', name: 'no_pemakaian' },
                { data: 'tanggal_pemakaian', name: 'tanggal_pemakaian' },
                { data: 'mobil.nopol', name: 'mobil.nopol',defaultContent:''},
                { data: 'alat.nama_alat', name: 'alat.nama_alat',defaultContent:''},
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'pemakai', name: 'pemakai' },
                { data: 'pemakaiandetail_count', name: 'pemakaiandetail_count'},
                // { data: 'company.nama_company', name: 'company.nama_company' },
                // { data: 'created_at', name: 'created_at' },
                // { data: 'updated_at', name: 'updated_at' },
                // { data: 'created_by', name: 'created_by' },
                // { data: 'updated_by', name: 'updated_by' },
                { data: 'status', name: 'status' },
                { data: 'type', name: 'type' },
                { data: 'action', name: 'action' }
            ]
            });
        });


        function pakai() {
            var type = $("#type").val();
            console.log(type)
            if (type == 0) {
                // document.getElementById("Tanggal1").disabled = true;
                // document.getElementById("Jenis1").disabled = true;
                //  document.getElementById("Nopol1").disabled = true;
                //  document.getElementById("Alat1").disabled = true;
                //  document.getElementById("Pemakai1").disabled = true;
                // document.getElementById("Deskripsi1").disabled = true;
            }else if(type == 1){
                $('.form-group1').show();
                $('#ADD :input').attr('disabled', false);
                document.getElementById("Tanggal1").disabled = false;
                // document.getElementById("Jenis1").style.display="block";
                 document.getElementById("nopols").style.display="block";
                 document.getElementById("alats").style.display="none";
                 document.getElementById("jasas").style.display="none";
                 document.getElementById("Pemakai1").disabled = false;
                document.getElementById("Deskripsi1").disabled = false;
            }else if(type == 2){
                $('.form-group1').show();
                $('#ADD :input').attr('disabled', false);
                document.getElementById("Tanggal1").disabled = false;
                // document.getElementById("Jenis1").style.display="none";
                 document.getElementById("nopols").style.display="none";
                 document.getElementById("alats").style.display="block";
                 document.getElementById("jasas").style.display="none";
                 document.getElementById("Pemakai1").disabled = false;
                document.getElementById("Deskripsi1").disabled = false;
            }else if(type == 3){
                $('.form-group1').show();
                $('#ADD :input').attr('disabled', false);
                document.getElementById("Tanggal1").disabled = false;
                // document.getElementById("Jenis1").style.display="none";
                 document.getElementById("nopols").style.display="none";
                 document.getElementById("alats").style.display="none";
                 document.getElementById("jasas").style.display="block";
                 document.getElementById("Pemakai1").disabled = false;
                document.getElementById("Deskripsi1").disabled = false;
            }
            else if(type == 4){
                $('.form-group1').show();
                $('#ADD :input').attr('disabled', false);
                document.getElementById("Tanggal1").disabled = false;
                // document.getElementById("Jenis1").style.display="none";
                 document.getElementById("nopols").style.display="none";
                 document.getElementById("alats").style.display="none";
                 document.getElementById("jasas").style.display="none";
                 document.getElementById("Pemakai1").disabled = false;
                document.getElementById("Deskripsi1").disabled = false;
            }
        }

         function pakai2() {
            var typejasa = $("#typejasa").val();
            console.log(typejasa)
            if (typejasa == 1) {
                        document.getElementById("nopols").style.display="block";
                        document.getElementById("alats").style.display="none";
                    }
            else if (typejasa == 2) {
                        document.getElementById("nopols").style.display="none";
                        document.getElementById("alats").style.display="block";
                    }
            else if (typejasa == 3) {
                        document.getElementById("nopols").style.display="none";
                        document.getElementById("alats").style.display="none";
                    }
        }


        $(function() {
            $('#child-table').DataTable({
                scrollY: 200,
                scrollX: true
            
            });
        });


        function formatRupiah(angka, prefix='Rp'){
            var number_string = angka.toString(),
                sisa    = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                    
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return rupiah;
        }

        function createTable(result){

        var total_qty = 0;
        var total_pakai = 0;
        var total_harga = 0;
        var grand_total = 0;

        $.each( result, function( key, row ) {
            total_qty += row.qty;
            harga = row.harga;
            qty = row.qty;
            total_pakai = harga * qty;
            total_harga += total_pakai;
            grand_total = formatRupiah(total_harga);

        });

        var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.produk+"</td>";
                    my_table += "<td>"+row.satuan+"</td>";
                    my_table += "<td>"+row.qty+"</td>";
                    my_table += "<td>Rp "+formatRupiah(row.harga)+"</td>";
                    my_table += "<td>Rp "+row.subtotal+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px;">'+ 
                        '<thead>'+
                           ' <tr class="bg-success">'+
                                '<th>Produk</th>'+
                                '<th>Satuan</th>'+
                                '<th>Qty</th>'+
                                '<th>Harga</th>'+
                                '<th>Subtotal</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                       ' <tfoot>'+
                            '<tr class="bg-success">'+
                                '<th class="text-center" colspan="2">Total</th>'+
                                '<th>'+total_qty+'</th>'+
                                '<th></th>'+
                                '<th>Rp '+grand_total+'</th>'+
                            '</tr>'+
                            '</tfoot>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }

 //FUNGSI BREAKDOWN
        $(document).ready(function() {
                    var table = $('#data-table').DataTable();
                
                    $('#data-table tbody').on( 'click', 'td.details-control', function () {
                        var tr = $(this).closest('tr');
                        var kode = tr.find('td:eq(1)').text();
                        var row = table.row( tr );
                        if ( $(this).hasClass('selected bg-gray') ) {
                            $(this).removeClass('selected bg-gray');
                        } else {
                            table.$('tr.selected').removeClass('selected bg-gray');
                            $(this).addClass('selected');
                        }
                        $.ajax({
                            url: '<?php echo route('pemakaian.showdetail'); ?>',
                            type: 'POST',
                            data : {
                                'id': kode
                            },
                            success: function(result) {
                                console.log(result);
                                if(result.title == 'Gagal'){
                                    $.notify(result.message);
                                }else{
                                    if ( row.child.isShown() ) {
                                    row.child.hide();
                                    tr.removeClass('shown');
                                }
                                else {
                                // Open this row
                                // $.each(result, function (index, value) {
                                    
                                //         console.log(index + " :: " + value);
                                    
                                // });
                                    var len = result.length;
                                    for (var i = 0; i < len; i++) {
                                        console.log(result[i].produk,result[i].satuan,result[i].qty,result[i].harga);
                                        // alert(result[i].produk);
                                    }

                                    row.child( createTable(result) ).show();
                                    // row.child( format(result) ).show();
                                    tr.addClass('shown');
                                }
                            }
                            }
                        });

                        
                    } );
        } );


        $('#editform').on('show.bs.modal', function () {
              var optionVal = $("#typeedit").val();
              var optionValmobil = $("#Nopol").val();
              var optionValalat = $("#Alat").val();
               // console.log(typeedit)
               if(optionVal == 'Mobil')
               {
                  // $('.form-group2').show();
                  // $('.form-group3').hide();
                  // $('.form-group4').hide();
                  $('.form-group2').show();
                  document.getElementById("Tanggal").disabled = false;
                  document.getElementById("nopols1").style.display="block";
                  document.getElementById("alats1").style.display="none";
                  document.getElementById("Pemakai").disabled = false;
                  document.getElementById("Deskripsi").disabled = false;
               } 
               else if(optionVal == 'Alat') 
               {
                  // $('.form-group2').hide();
                  // $('.form-group3').show();
                  // $('.form-group4').hide();
                  $('.form-group2').show();
                  document.getElementById("Tanggal").disabled = false;
                  document.getElementById("nopols1").style.display="none";
                  document.getElementById("alats1").style.display="block";
                  document.getElementById("Pemakai").disabled = false;
                  document.getElementById("Deskripsi").disabled = false;
               }
               else if(optionVal == 'Jasa') 
               {
                    if(optionValmobil == null){
                        $('.form-group2').show();
                        document.getElementById("nopols1").style.display="none";
                        document.getElementById("alats1").style.display="block";
                       
                    }
                    else if(optionValalat == null){
                        $('.form-group2').show();
                        document.getElementById("nopols1").style.display="block";
                        document.getElementById("alats1").style.display="none";
                        
                    }
               }
               else if(optionVal == 'Aset') 
               {
                  $('.form-group2').show();
                  document.getElementById("Tanggal").disabled = false;
                  document.getElementById("nopols1").style.display="none";
                  document.getElementById("alats1").style.display="none";
                  document.getElementById("Pemakai").disabled = false;
                  document.getElementById("Deskripsi").disabled = false;
               }    
            })

        // function pakai4() {
        //     var typejasa2 = $("#typejasa2").val();
        //     if (typejasa2 == 1) {
        //                   $('.form-group2').show();
        //                   $('.form-group3').hide();
        //                   $('.form-group4').show();
        //             }
        //     else if (typejasa2 == 2) {
        //                   $('.form-group2').hide();
        //                   $('.form-group3').show();
        //                   $('.form-group4').show();
        //             }
        //     else if (typejasa2 == 3) {
        //                 $('.form-group2').hide();
        //                 $('.form-group3').hide();
        //                 $('.form-group4').hide();
        //             }
        // }

        // $(document).ready(function(){
        //        var optionVal = $("#typeedit").val();
        //        // console.log(typeedit)
        //        if(optionVal == 'Mobil')
        //        {
        //           $('.form-group2').show();
        //           $('.form-group3').hide();
        //        } 
        //        else if(optionVal == 'Alat') 
        //        {
        //           $('.form-group2').hide();
        //           $('.form-group3').show();
        //        }
        //        else if(optionVal == 'Jasa' || optionVal == 'Aset') 
        //        {
        //           $('.form-group2').hide();
        //           $('.form-group3').hide();
        //        }
        // });

        // Fungsi POST-UNPOST,VIEW DETAIL,DAN PRINT
        $(document).ready(function() {
            var table = $('#data-table').DataTable();
            var post = document.getElementById("button1");
            var unpost = document.getElementById("button2");

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var colom = select.find('td:eq(7)').text();
                    var colom2 = select.find('td:eq(6)').text();
                    // var colom3 = select.find('td:eq(1)').text();
                    var no_pemakaian = select.find('td:eq(0)').text();
                    var status = colom;
                    var item = colom2;
                    var print = $("#button3").attr("href","http://localhost/inventory_baru/admin/pemakaian/cetakPDF?id="+no_pemakaian);
                    if(status == 'POSTED' && item > 0){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                    }else if(status =='UNPOSTED' && item > 0){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                    }else if(item == 0){
                        $('.tombol1').hide();
                        $('.tombol2').hide();
                    }else{
                        $('.tombol1').show();
                        $('.tombol2').hide();
                    }
                }
            } );
           
        
            $('#button1').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_pemakaian = colom;
                console.log(no_pemakaian);
                swal({
                    title: "Post?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, post it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                    }).then(function (e) {
                        if (e.value === true) {
                    // alert( table.rows('.selected').data().length +' row(s) selected' );
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo route('pemakaian.posting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pemakaian
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Posted!',
                                    'Your file has been posted.',
                                    'success'
                                    )
                                    refreshTable();
                                }
                                else{
                                  swal({
                                      title: 'Error',
                                      text: result.message,
                                      type: 'error',
                                  })
                                }
                            },
                            error : function () {
                              swal({
                                  title: 'Oops...',
                                  text: 'Post Gagal!',
                                  type: 'error',
                                  timer: '1500'
                              })
                            }
                        });
                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                })
            });

            $('#button2').click( function () {
                var select = $('.selected').closest('tr');
                var colom = select.find('td:eq(0)').text();
                var no_pemakaian = colom;
                console.log(no_pemakaian);
                swal({
                    title: "Unpost?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, unpost it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: !0
                    }).then(function (e) {
                        if (e.value === true) {
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo route('pemakaian.unposting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_pemakaian
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Unposted!',
                                    'Your file has been unposted.',
                                    'success'
                                    )
                                    refreshTable();
                                }
                                else{
                                  swal({
                                      title: 'Error',
                                      text: result.message,
                                      type: 'error',
                                  })
                                }
                            },
                            error : function () {
                              swal({
                                  title: 'Oops...',
                                  text: 'Unpost Gagal!',
                                  type: 'error',
                                  timer: '1500'
                              })
                            }
                        });
                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                })
            });

            $('#button3').click( function () {
                var select = $('.selected').closest('tr');
                var no_pemakaian = select.find('td:eq(0)').text();
                var row = table.row( select );
                console.log(no_pemakaian);
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                $.ajax({
                    url: '<?php echo route('pemakaian.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_pemakaian
                    },
                    success: function(result) {
                        console.log(result);
                        if(result.title == 'Gagal'){
                            $.notify(result.message);
                        }else{
                            if ( row.child.isShown() ) {
                            row.child.hide();
                            tr.removeClass('shown');
                        }
                        else {
                        // Open this row
                        // $.each(result, function (index, value) {
                            
                        //         console.log(index + " :: " + value);
                            
                        // });
                            var len = result.length;
                            for (var i = 0; i < len; i++) {
                                console.log(result[i].produk,result[i].satuan,result[i].qty,result[i].harga);
                                // alert(result[i].produk);
                            }

                            row.child( createTable(result) ).show();
                            // row.child( format(result) ).show();
                            select.addClass('shown');
                        }
                     }
                    }
                });
            } );
            
        } );

        $('.select2').select2({
            placeholder: "Silahkan Pilih",
            allowClear: true,
        });

        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function refreshForm() {
             $('addform').reset();
        }

        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);;
        }

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({
    
        });


        $('#ADD').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            // var kode = $.trim($('#Kode1').val());
            // var tipe = $.trim($('#Tipe1').val());
            var tanggal = $.trim($('#Tanggal1').val());
            var pemakai = $.trim($('#Pemakai1').val());
            // var mobil = $.trim($('#Jenis1').val());
            var nopol = $.trim($('#Nopol1').val());
            var alat = $.trim($('#Alat1').val());
            var type = $.trim($('#type').val());
            var deskripsi = $.trim($('#Deskripsi1').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

            if (tanggal === ''|| pemakai === ''|| type === '') {
                    if(tanggal === ''){
                        $( '.tanggal-error' ).html('Mohon di Isi');
                    }
                    if(pemakai === ''){
                        $( '.kode-jenis-error' ).html('Mohon di Isi');
                    }
                    if(type === ''){
                        $( '.noasset-error' ).html('Mohon di Isi');
                    }
            }else{
                $.ajax({
                    url:'<?php echo route('pemakaian.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#Kode1').val('');
                        // $('#Tipe1').val('');
                        $('#Tanggal1').val('');
                        $('#Pemakai1').val('');
                        // $('#Jenis1').val('');
                        $('#Nopol1').val('');
                        $('#Alat1').val('');
                        $('#type').val('');
                        $('#Deskripsi1').val('');
                        $( '.kode-error' ).html('');
                        $( '.name-error' ).html('');
                        $('#addform').modal('hide');
                        $('.form-group1').hide();
                        refreshTable();

                        if (data.success === true) {
                            swal("Done!", data.message, "success");
                            // $('#myModal form :input').val("");
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    },
                });
            }
        });

        $('#EDIT').submit(function (e) {
            e.preventDefault();
            // Get the Login Name value and trim it
            var type = $.trim($('#typeedit').val());
            var tanggal = $.trim($('#Tanggal').val());
            var pemakai = $.trim($('#Pemakai').val());
            var nopol = $.trim($('#Nopol').val());
            var alat = $.trim($('#Alat').val());
            var deskripsi = $.trim($('#Deskripsi').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('pemakaian.updateajax'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#editform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Done!", data.message, "success");
                        } else {
                            swal("Error!", data.message, "error");
                        }
                    },
                });
            }
        );

        function edit(id, url) {
            swal({
            title: "Edit?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, edit it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {

                        console.log(results);
                        
                        $('#Pemakaian').val(results.no_pemakaian);
                        $('#Pemakai').val(results.pemakai);
                        $('#typeedit').val(results.type);
                        // $('#Permintaan').val(result.no_permintaan);
                        $('#Tanggal').val(results.tanggal_pemakaian);
                        $('#Alat').val(results.kode_alat);
                        $('#Nopol').val(results.kode_mobil);
                        $('#Status').val(results.status);
                        $('#Type').val(results.type);
                        $('#Deskripsi').val(results.deskripsi);
                        $('#editform').modal('show');
                        },
                        error : function() {
                        swal("GAGAL!<br><b>Status POSTED</b>");
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })

        }


        //     var result = swal({
        //                   title: 'Anda Ingin Edit Data?',
        //                   type: 'success',
        //               }).then(function () {
        //     if (result) {
        //         // console.log(id)
        //         $.ajax({
        //             url: url,
        //             type: 'GET',
        //             success: function(result) {
        //                 console.log(result);
        //                 $('#Pemakaian').val(result.no_pemakaian);
        //                 // $('#Permintaan').val(result.no_permintaan);
        //                 $('#Tanggal').val(result.tanggal_pemakaian);
        //                 $('#Status').val(result.status);
        //                 $('#Type').val(result.type);
        //                 $('#Deskripsi').val(result.deskripsi);
        //                 $('#editform').modal('show');
        //             }
        //         });
        //     }
        //     });
        // }

        function del(id, url) {
            swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                

                $.ajax({
                    type: 'DELETE',
                    url: url,
                    
                    success: function (results) {
                    console.log(results);
                        if (results.success === true) {
                            swal("Done!", results.message, "success");
                        } else {
                            swal("GAGAL!<br><b>Status POSTED/Periode CLOSED/Detail Belum Kosong</b>");
                        }
                          
                        // $.notify(result.message, "success");
                        refreshTable();
                    }
                });
            }
            });
        }


        //     var result = confirm("Want to delete?");

        //     if (result) {
        //         // console.log(id)
        //         $.ajax({
        //             url: url,
        //             type: 'DELETE',
        //             success: function(result) {
        //                 console.log(result);
        //                 swal({
        //                   title: 'Data Berhasil Di-Hapus',
        //                   type: 'success',
        //                   timer: '1500'
        //               })
        //                 // $.notify(result.message, "success");
        //                 refreshTable();
        //             }
        //         });
        //     }
        //     });
        // }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>