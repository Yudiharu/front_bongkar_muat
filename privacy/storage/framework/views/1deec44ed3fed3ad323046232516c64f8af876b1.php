

<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box ">
                <div class="box-body">
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                            <i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Penjualan</button>
                        <span class="pull-right"> 
                            <button type="button" class="tombol1 btn btn-success btn-xs" id="button1"><i class="fa fa-bullhorn"></i> POST</button>
                            <button type="button" class="tombol2 btn btn-warning btn-xs" id="button2"><i class="fa fa-undo"></i> UNPOST</button>
                            <button type="button" class="btn btn-primary btn-xs" id="button5"><i class="fa fa-paperclip"></i> VIEW DETAIL</button>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-primary">
                        <th>No Penj</th>
                        <th>Tgl Penj</th>
                        <th>Nama Customer</th>
                        <th>No JO/SP</th>
                        <th>No SPJB</th>
                        <th>No BAST</th>
                        <th>Type Ar</th>
                        <th>Total Item</th>
                        <th>PPN</th>
                        <th>Disc</th>
                        <th>Disc(Rp)</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addform" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['id'=>'ADD']); ?>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tanggal_penjualan', 'Tanggal Penjualan:')); ?>

                                    <?php echo e(Form::date('tanggal_penjualan', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_customer', 'Kode Customer:')); ?>

                                    <?php echo e(Form::select('kode_customer',$Customer->sort(),null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Customer','required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_josp', 'No JO/SP:')); ?>

                                    <?php echo e(Form::text('no_josp', null, ['class'=> 'form-control','id'=>'Josp', 'placeholder'=>'No. JO/SP', 'autocomplete'=>'off'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_spjb', 'No SPJB:')); ?>

                                    <?php echo e(Form::text('no_spjb', null, ['class'=> 'form-control','id'=>'Spjb', 'placeholder'=>'No. SPJB', 'autocomplete'=>'off'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tgl_spjb', 'Tanggal SPJB:')); ?>

                                    <?php echo e(Form::date('tgl_spjb', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggalspjb' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_bast', 'No BAST:')); ?>

                                    <?php echo e(Form::text('no_bast', null, ['class'=> 'form-control','id'=>'Bast', 'placeholder'=>'No. BAST', 'autocomplete'=>'off'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tgl_bast', 'Tanggal BAST:')); ?>

                                    <?php echo e(Form::date('tgl_bast', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggalbast' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('type_ar', 'Type AR:')); ?>

                                    <?php echo e(Form::select('type_ar', ['Sparepart' => 'Sparepart','Unit' => 'Unit'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'Typear','required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('seri_faktur', 'Seri Faktur:')); ?>

                                    <?php echo e(Form::text('seri_faktur', null, ['class'=> 'form-control','id'=>'Seri', 'placeholder'=>'Seri Faktur', 'autocomplete'=>'off'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('top', 'TOP:')); ?>

                                    <?php echo e(Form::text('top', null, ['class'=> 'form-control','id'=>'Top','onchange'=>"hitung();",'required'=>'required', 'placeholder'=>'Term Of Payment', 'autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('due_date', 'Due Date:')); ?>

                                    <?php echo e(Form::text('due_date', null, ['class'=> 'form-control','id'=>'Due','required'=>'required', 'placeholder'=>'Tanggal Tenggat'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_sertifikat', 'Sertifikat:')); ?>

                                    <?php echo e(Form::text('no_sertifikat', null, ['class'=> 'form-control','id'=>'Sertifikat', 'placeholder'=>'No Sertifikat', 'autocomplete'=>'off'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tgl_sertifikat', 'Tanggal Sertifikat:')); ?>

                                    <?php echo e(Form::date('tgl_sertifikat', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggalsertifikat' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('PPN', 'PPN(%):')); ?>

                                    <?php echo e(Form::text('ppn', 0, ['class'=> 'form-control','id'=>'PPN1','placeholder'=>'%', 'autocomplete'=>'off','required'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('Diskon', 'Diskon(%):')); ?>

                                    <?php echo e(Form::text('diskon_persen', 0, ['class'=> 'form-control','id'=>'Diskon1','placeholder'=>'%', 'autocomplete'=>'off','required'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Diskon', 'Diskon(Rp):')); ?>

                                        <?php echo e(Form::text('diskon_rp', 0, ['class'=> 'form-control','id'=>'Diskonrp1', 'autocomplete'=>'off','required'])); ?>

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

    <div class="modal fade" id="editform" role="dialog">
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
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('no_penjualan', 'No Penjualan:')); ?>

                                        <?php echo e(Form::text('no_penjualan', null, ['class'=> 'form-control','id'=>'Penjualan1','readonly'])); ?>

                                    </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tanggal_penjualan', 'Tanggal Penjualan:')); ?>

                                    <?php echo e(Form::date('tanggal_penjualan', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggal1' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_customer', 'Kode Customer:')); ?>

                                    <?php echo e(Form::select('kode_customer',$Customer->sort(),null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'Customer1','required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_josp', 'No JO/SP:')); ?>

                                    <?php echo e(Form::text('no_josp', null, ['class'=> 'form-control','id'=>'Josp1', 'placeholder'=>'No. JO/SP', 'autocomplete'=>'off'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_spjb', 'No SPJB:')); ?>

                                    <?php echo e(Form::text('no_spjb', null, ['class'=> 'form-control','id'=>'Spjb1', 'placeholder'=>'No. SPJB', 'autocomplete'=>'off'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tgl_spjb', 'Tanggal SPJB:')); ?>

                                    <?php echo e(Form::date('tgl_spjb', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggalspjb1' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_bast', 'No BAST:')); ?>

                                    <?php echo e(Form::text('no_bast', null, ['class'=> 'form-control','id'=>'Bast1', 'placeholder'=>'No. BAST', 'autocomplete'=>'off'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tgl_bast', 'Tanggal BAST:')); ?>

                                    <?php echo e(Form::date('tgl_bast', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggalbast1' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('type_ar', 'Type AR:')); ?>

                                    <?php echo e(Form::text('type_ar', null, ['class'=> 'form-control','style'=>'width: 100%','id'=>'Typear1','required'=>'required','readonly'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('seri_faktur', 'Seri Faktur:')); ?>

                                    <?php echo e(Form::text('seri_faktur', null, ['class'=> 'form-control','id'=>'Seri1', 'placeholder'=>'Seri Faktur', 'autocomplete'=>'off'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('top', 'TOP:')); ?>

                                    <?php echo e(Form::text('top', null, ['class'=> 'form-control','id'=>'Top1','onchange'=>"hitung2();",'required'=>'required', 'placeholder'=>'Term Of Payment', 'autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('due_date', 'Due Date:')); ?>

                                    <?php echo e(Form::text('due_date', null, ['class'=> 'form-control','id'=>'Due1','required'=>'required', 'placeholder'=>'Tanggal Tenggat'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_sertifikat', 'Sertifikat:')); ?>

                                    <?php echo e(Form::text('no_sertifikat', null, ['class'=> 'form-control','id'=>'Sertifikat1', 'placeholder'=>'No Sertifikat', 'autocomplete'=>'off'])); ?>

                                 </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('tgl_sertifikat', 'Tanggal Sertifikat:')); ?>

                                    <?php echo e(Form::date('tgl_sertifikat', \Carbon\Carbon::now(),['class'=> 'form-control','id'=>'Tanggalsertifikat1' ,'required'=>'required'])); ?>

                                </div>
                            </div>
                             <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('PPN', 'PPN(%):')); ?>

                                        <?php echo e(Form::text('ppn', null, ['class'=> 'form-control','id'=>'PPN', 'autocomplete'=>'off','required'])); ?>

                                     </div>
                            </div> 
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Diskon', 'Diskon(%):')); ?>

                                        <?php echo e(Form::text('diskon_persen', null, ['class'=> 'form-control','id'=>'Diskon', 'autocomplete'=>'off','required'])); ?>

                                     </div>
                            </div> 
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Diskon', 'Diskon(Rp):')); ?>

                                        <?php echo e(Form::text('diskon_rp', null, ['class'=> 'form-control','id'=>'Diskonrp', 'autocomplete'=>'off','required'])); ?>

                                     </div>
                                </div> 
                    </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success'])); ?>

                    <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                </div>
            </div>
            <?php echo Form::close(); ?>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-map-marker" style="color: #fff"></i> <i>PT. SELARAS UNGGUL BERSAMA</i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

        <style type="text/css">
            #back2Top {
                width: 400px;
                line-height: 27px;
                overflow: hidden;
                z-index: 999;
                display: none;
                cursor: pointer;
                position: fixed;
                bottom: 0;
                text-align: left;
                font-size: 15px;
                color: #000000;
                text-decoration: none;
            }
            #back2Top:hover {
                color: #fff;
            }
        </style>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script type="text/javascript">   

        $(window).scroll(function() {
            var height = $(window).scrollTop();
            if (height > 1) {
                $('#back2Top').show();
            } else {
                $('#back2Top').show();
            }
        });
        
        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

        });

        function load(){
            startTime();
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.back2Top').show();
        }

    function formatRupiah(angka, prefix='Rp'){
           
            var rupiah = angka.toLocaleString(
                undefined, // leave undefined to use the browser's locale,
                // or use a string like 'en-US' to override it.
                { minimumFractionDigits: 0 }
            );
            return rupiah;
           
        }

    function hanyaAngka(e, decimal) {
        var key;
        var keychar;
         if (window.event) {
             key = window.event.keyCode;
         } else
         if (e) {
             key = e.which;
         } else return true;
      
        keychar = String.fromCharCode(key);
        if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
            return true;
        } else
        if ((("0123456789").indexOf(keychar) > -1 || ("-").indexOf(keychar) > -1 || (".").indexOf(keychar) > -1 )) {
            return true;
        } else
        if (decimal && (keychar == ".")) {
            return true;
        } else return false;
    }   

    $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });

    function pulsar(e,obj) {            
              tecla = (document.all) ? e.keyCode : e.which;
              //alert(tecla);
              if (tecla!="8" && tecla!="0"){
                obj.value += String.fromCharCode(tecla).toUpperCase();
                return false;
              }else{
                return true;
              }
    }
    
        function hitung() {
             var tgl_awal = $('#Tanggal').val();
             var hari = $('#Top').val();

             var hasil = new Date(new Date().getTime()+(hari*24*60*60*1000)); 

             var newdate = new Date(hasil);
             var dd = newdate.getDate();
             var mm = newdate.getMonth() + 1;
             var y = newdate.getFullYear();

             var someFormattedDate = y + '-' + mm + '-' + dd;
             document.getElementById('Due').value = someFormattedDate;
        }

        function hitung2() {
             var tgl_awal = $('#Tanggal1').val();
             var hari = $('#Top1').val();

             var hasil = new Date(new Date().getTime()+(hari*24*60*60*1000)); 

             var newdate = new Date(hasil);
             var dd = newdate.getDate();
             var mm = newdate.getMonth() + 1;
             var y = newdate.getFullYear();

             var someFormattedDate = y + '-' + mm + '-' + dd;
             document.getElementById('Due1').value = someFormattedDate;
        }

        $(function() {          
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('penjualan.data'); ?>',
            columns: [
                { data: 'no_penjualan', name: 'no_penjualan' },
                { data: 'tanggal_penjualan', name: 'tanggal_penjualan' },
                { data: 'customer.nama_customer', name: 'customer.nama_customer' },
                { data: 'no_josp', name: 'no_josp' },
                { data: 'no_spjb', name: 'no_spjb' },
                { data: 'no_bast', name: 'no_bast' },
                { data: 'type_ar', name: 'type_ar' },
                { data: 'total_item', name: 'total_item' },
                { data: 'ppn', name: 'ppn' },
                { data: 'diskon_persen', name: 'diskon_persen' },
                { data: 'diskon_rp', name: 'diskon_rp' },
                { data: 'grand_total', 
                    render: function( data, type, full ) {
                    return formatNumber(data); }
                },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        function formatNumber(n) {
            if(n == 0){
                return 0;
            }else{
                return n.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            }
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
                    my_table += "<td>"+row.partnumber+"</td>";
                    my_table += "<td>"+row.satuan+"</td>";
                    my_table += "<td>"+row.qty+"</td>";
                    my_table += "<td>Rp "+formatRupiah(row.harga)+"</td>";
                    my_table += "<td>Rp "+row.subtotal+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Produk</th>'+
                                '<th>Partnumber</th>'+
                                '<th>Satuan</th>'+
                                '<th>Qty</th>'+
                                '<th>Harga</th>'+
                                '<th>Subtotal</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                       ' <tfoot>'+
                            '<tr class="bg-info">'+
                                '<th class="text-center" colspan="3">Total</th>'+
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
                    var colom = select.find('td:eq(12)').text();
                    var colom2 = select.find('td:eq(7)').text();
                    var no_penjualan = select.find('td:eq(0)').text();
                    var status = colom;
                    var item = colom2;
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
                var no_penjualan = colom;
                console.log(no_penjualan);
                swal({
                    title: "Post?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, Posting!",
                    cancelButtonText: "Batal",
                    reverseButtons: !0
                    }).then(function (e) {
                        
                        if (e.value === true) {
                            swal({
                            title: "<b>Proses Sedang Berlangsung</b>",
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                            })
                            
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                        $.ajax({
                            url: '<?php echo route('penjualan.posting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_penjualan
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
                                  text: 'Gagal',
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
                var no_penjualan = colom;
                console.log(no_penjualan);
                swal({
                    title: "Unpost?",
                    text: colom,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, Unpost!",
                    cancelButtonText: "Batal",
                    reverseButtons: !0
                    }).then(function (e) {
                        if (e.value === true) {
                            swal({
                            title: "<b>Proses Sedang Berlangsung</b>",
                            type: "warning",
                            showCancelButton: false,
                            showConfirmButton: false
                            })
                            
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '<?php echo route('penjualan.unposting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_penjualan
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Unposted!',
                                    'Data berhasil di Unpost.',
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
                                  text: data.message,
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

            $('#button5').click( function () {
                var select = $('.selected').closest('tr');
                var no_penjualan = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('penjualan.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_penjualan
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
                            var len = result.length;
                            for (var i = 0; i < len; i++) {
                                console.log(result[i].produk,result[i].satuan,result[i].qty,result[i].harga);
                            }

                            row.child( createTable(result) ).show();
                            select.addClass('shown');
                        }
                     }
                    }
                });
            });
        });

        

        $('.select2').select2({
            placeholder: "Pilih",
            allowClear: true,
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('penjualan.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Tanggal').val('');
                        $('#Customer').val('').trigger('change');
                        $('#Josp').val('');
                        $('#Spjb').val('');
                        $('#Tanggalspjb').val('');
                        $('#Bast').val('');
                        $('#Tanggalbast').val('');
                        $('#Typear').val('').trigger('change');
                        $('#Seri').val('');
                        $('#Top').val('');
                        $('#Due').val('');
                        $('#Sertifikat').val('');
                        $('#Tanggalsertifikat').val('');
                        $('#PPN1').val('0');
                        $('#Diskon1').val('0');
                        $('#Diskonrp1').val('0');
                        $('#addform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }   
                    },
                });
        });
            

        $('#EDIT').submit(function (e) {
            e.preventDefault();
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

         
                $.ajax({
                    url:'<?php echo route('penjualan.ajaxupdate'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#editform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }   
                    },
                });
            
        });

        function edit(id, url) {
            
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

               $.ajax({
                    type: 'GET',
                    url: url,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        console.log(results);
                        $('#editform').modal('show');
                        $('#Penjualan1').val(results.no_penjualan);
                        $('#Tanggal1').val(results.tanggal_penjualan);
                        $('#Customer1').val(results.kode_customer);
                        $('#Josp1').val(results.no_josp);
                        $('#Spjb1').val(results.no_spjb);
                        $('#Tanggalspjb1').val(results.tgl_spjb);
                        $('#Bast1').val(results.no_bast);
                        $('#Tanggalbast1').val(results.tgl_bast);
                        $('#Typear1').val(results.type_ar);
                        $('#Seri1').val(results.seri_faktur);
                        $('#Top1').val(results.top);
                        $('#Due1').val(results.due_date);
                        $('#Sertifikat1').val(results.no_sertifikat);
                        $('#Tanggalsertifikat1').val(results.tgl_sertifikat);
                        $('#PPN').val(results.ppn);
                        $('#Diskon').val(results.diskon_persen);
                        $('#Diskonrp').val(results.diskon_rp);
                        },
                        error : function() {
                        swal("GAGAL!<br><b>Status POSTED/RECEIVED/CLOSED</b>");
                    }
                });           
        }
        
        function update() {
         e.preventDefault();
         alert('test update');
         var form_action = $("#editform").find("form").attr("action");
                $.ajax({
                    
                    url: form_action,
                    type: 'POST',
                    data:$('#Update').serialize(),
                    success: function(data) {
                        console.log(data);
                        $('#editform').modal('hide');
                        $.notify(data.message, "success");
                        refreshTable();
                    }
                });
        }

        function del(id, url) {
            swal({
            title: "Hapus?",
            text: "Pastikan dahulu item yang akan di hapus",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                

                $.ajax({
                    type: 'DELETE',
                    url: url,
                    
                    success: function (results) {
                    // console.log(results);
                        if (results.success === true) {
                            swal("Berhasil!", results.message, "success");
                        } else {
                            swal("Gagal!", results.message, "error");
                        }
                        refreshTable();
                    }
                });
            }
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>