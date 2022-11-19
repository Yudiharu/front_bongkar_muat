<?php $__env->startSection('title', 'Pemilik Mobil'); ?>

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

                    <?php if (app('laratrust')->can('create-pemilik')) : ?>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Pemilik</button>
                    <?php endif; // app('laratrust')->can ?>

                    <button type="button" class="btn btn-primary btn-xs" onclick="getkode()">
                        <i class="fa fa-bullhorn"></i> Get New Kode Customer</button>

                    <span class="pull-right">  
                        <font style="font-size: 16px;"><b>PEMILIK MOBIL</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-danger">
                        <th>Kode Pemilik</th>
                        <th>Nama Pemilik</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Hp</th>
                        <th>Total Mobil</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addform" tabindex="-1" role="dialog">
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
                                    <?php echo e(Form::label('pilih', 'Kepemilikan:')); ?>

                                    <?php echo e(Form::select('pilih', ['Internal' => 'Internal', 'Vendor' => 'Vendor'], null, ['class'=> 'form-control select2','style'=>'width: 100%','placeholder' => '','id'=>'pilih','required'=>'required','onchange'=>"get();"])); ?>

                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group1">
                                    <?php echo e(Form::label('nama_pemilik', 'Nama Pemilik:')); ?>

                                    <?php echo e(Form::text('nama_pemilik', null, ['class'=> 'form-control','id'=>'Nama1','required'=>'required', 'placeholder'=>'Nama Pemilik','autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)",'readonly'])); ?>

                                </div>

                                <div class="form-group2">
                                    <?php echo e(Form::label('nama_pemilik', 'Nama Vendor:')); ?>

                                    <?php echo e(Form::text('nama_pemilik',null, ['class'=> 'form-control','id'=>'Vendor1','style'=>'width: 100%','placeholder' => 'Nama Vendor','autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div> 
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('alamat', 'Alamat:')); ?>

                                    <?php echo e(Form::textArea('alamat', null, ['class'=> 'form-control','rows'=>'2','id'=>'Alamat1','required'=>'required', 'placeholder'=>'Alamat','autocomplete'=>'off'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('telp', 'Telp:')); ?>

                                    <?php echo e(Form::text('telp', null, ['class'=> 'form-control','id'=>'Telp1','required'=>'required', 'placeholder'=>'No. Telepon','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php echo e(Form::label('kota', 'Kota:')); ?>

                                    <?php echo e(Form::text('kota', null, ['class'=> 'form-control','id'=>'Kota1','required'=>'required', 'placeholder'=>'Kota','autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kodepos', 'Kode Pos:')); ?>

                                    <?php echo e(Form::text('kode_pos', null, ['class'=> 'form-control','id'=>'Kodepos1','required'=>'required', 'placeholder'=>'Kode Pos','autocomplete'=>'off', 'maxlength'=>'5','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Hp', 'Hp:')); ?>

                                    <input type="text" name="number1" style="display:none;">
                                    <?php echo e(Form::text('hp', null, ['class'=> 'form-control','id'=>'Hp1','required'=>'required', 'placeholder'=>'No. HP','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)", 'name'=>'hp'])); ?>

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
                        
                            <?php echo e(Form::hidden('kode_pemilik', null, ['class'=> 'form-control','id'=>'Kode','readonly'])); ?>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_pemilik', 'Nama Pemilik:')); ?>

                                    <?php echo e(Form::text('nama_pemilik', null, ['class'=> 'form-control','id'=>'Nama','required'=>'required', 'placeholder'=>'Nama Pemilik','autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)",'readonly'])); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('alamat', 'Alamat:')); ?>

                                    <?php echo e(Form::textArea('alamat', null, ['class'=> 'form-control','rows'=>'2','id'=>'Alamat','required'=>'required', 'placeholder'=>'Alamat','autocomplete'=>'off'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('telp', 'Telp:')); ?>

                                    <?php echo e(Form::text('telp', null, ['class'=> 'form-control','id'=>'Telp','required'=>'required', 'placeholder'=>'No. Telepon','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php echo e(Form::label('kota', 'Kota:')); ?>

                                    <?php echo e(Form::text('kota', null, ['class'=> 'form-control','id'=>'Kota','required'=>'required', 'placeholder'=>'Kota','autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('kodepos', 'Kode Pos:')); ?>

                                    <?php echo e(Form::text('kode_pos', null, ['class'=> 'form-control','id'=>'Kodepos','required'=>'required', 'placeholder'=>'Kode Pos','autocomplete'=>'off', 'maxlength'=>'5','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Hp', 'Hp:')); ?>

                                    <input type="text" name="number1" style="display:none;">
                                    <?php echo e(Form::text('hp', null, ['class'=> 'form-control','id'=>'Hp','required'=>'required', 'placeholder'=>'No. HP','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)", 'name'=>'hp'])); ?>

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

      <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i><?php echo e($nama_company); ?></i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

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

            /* Button used to open the contact form - fixed at the bottom of the page */
            .add-button {
                background-color: #00E0FF;
                bottom: 156px;
            }

            .hapus-button {
                background-color: #F63F3F;
                bottom: 186px;
            }

            .edit-button {
                background-color: #FDA900;
                bottom: 216px;
            }

            .view-button {
                background-color: #1674c7;
                bottom: 246px;
            }

            #mySidenav button {
              position: fixed;
              right: -30px;
              transition: 0.3s;
              padding: 4px 8px;
              width: 70px;
              text-decoration: none;
              font-size: 12px;
              color: white;
              border-radius: 5px 0 0 5px ;
              opacity: 0.8;
              cursor: pointer;
              text-align: left;
            }

            #mySidenav button:hover {
              right: 0;
            }

            #about {
              top: 70px;
              background-color: #4CAF50;
            }

            #blog {
              top: 130px;
              background-color: #2196F3;
            }

            #projects {
              top: 190px;
              background-color: #f44336;
            }

            #contact {
              top: 250px;
              background-color: #555
            }
        </style>

        <div id="mySidenav" class="sidenav">
            <?php if (app('laratrust')->can('update-pemilik')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editpemilik" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-pemilik')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapuspemilik" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('add-pemilik')) : ?>
            <a href="#" id="addpemilik"><button type="button" class="btn btn-info btn-xs add-button" data-toggle="modal" data-target="">ADD <i class="fa fa-plus"></i></button></a>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('view-pemilik')) : ?>
            <button type="button" class="btn btn-primary btn-xs view-button" id="button5">VIEW <i class="fa fa-eye"></i></button>
            <?php endif; // app('laratrust')->can ?>
        </div>
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

        function get() {
            var pilih = $("#pilih").val();

            if (pilih == 'Internal') {
                $.ajax({
                    url:'<?php echo route('pemilik.getcom'); ?>',
                    type:'POST',
                    data : {
                            'kode_vendor': '03',
                        },
                    success: function(result) {
                        console.log(result);
                        $('.form-group1').show();
                        $('.form-group2').hide();
                        $('#Alamat1').val(result.alamat);
                        $('#Telp1').val(result.telp);
                        $('#Hp1').val('0');
                        $('#Kota1').val('PALEMBANG');
                        $('#Kodepos1').val('0');
                        $('#Nama1').val(result.nama_company);
                        document.getElementById("Alamat1").readOnly = true;
                        document.getElementById("Telp1").readOnly = true;
                        document.getElementById("Hp1").readOnly = true;
                        document.getElementById("Kota1").readOnly = true;
                        document.getElementById("Kodepos1").readOnly = true;

                        document.getElementById("Nama1").disabled = false;
                        document.getElementById("Vendor1").disabled = true;
                        document.getElementById("Nama1").required = false; 
                        document.getElementById("Vendor1").required = true;
                    },
                });
            }else{
                $('.form-group2').show();
                $('.form-group1').hide();
                $('#Alamat1').val('');
                $('#Telp1').val('');
                $('#Hp1').val('');
                $('#Kota1').val('');
                $('#Kodepos1').val('');
                $('#Vendor1').val('').trigger('change');
                document.getElementById("Alamat1").readOnly = false;
                document.getElementById("Telp1").readOnly = false;
                document.getElementById("Hp1").readOnly = false;
                document.getElementById("Kota1").readOnly = false;
                document.getElementById("Kodepos1").readOnly = false;

                document.getElementById("Nama1").disabled = true;
                document.getElementById("Vendor1").disabled = false;
                document.getElementById("Nama1").required = true; 
                document.getElementById("Vendor1").required = false; 
            }
        }

        function load(){
            startTime();
            $('.add-button').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.view-button').hide();
            $('.back2Top').show();
            $('.form-group1').hide();
            $('.form-group2').hide();
        }

        function getkode(){
            swal({
                title: "Get New Kode Customer?",
                text: "Customer",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya, Update!",
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
                        url:'<?php echo route('pemilik.getkode'); ?>',
                        type:'POST',
                        success: function(result) {
                            swal("Berhasil!", result.message, "success");
                            refreshTable();
                        },
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            })
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

        $(function() {          
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('pemilik.data'); ?>',
            columns: [
                { data: 'id', name: 'id', visible: false },
                { data: 'nama_pemilik', name: 'nama_pemilik' },
                { data: 'alamat', name: 'alamat' },
                { data: 'telp', name: 'telp' },
                { data: 'hp', name: 'hp' },
                { data: 'total_mobil', name: 'total_mobil' },
            ]
            });
        });

        function formatNomor(n) {
            // console.log(n);
            if(n == null){
                var stat = "PT. GEMILANG UTAMA INTERNASIONAL";
                return stat;
            }else{
                var str = n;
                var result = str;
                return result;
            }
        }

        function createTable(result){

        var my_table = "";


        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.kode_mobil+"</td>";
                    my_table += "<td>"+row.jenis_mobil+"</td>";
                    my_table += "<td>"+row.kir+"</td>";
                    my_table += "<td>"+row.masa_stnk+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>No Polisi</th>'+
                                '<th>Jenis Mobil</th>'+
                                '<th>KIR</th>'+
                                '<th>Masa STNK</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '</table>';

                    // $(document).append(my_table);
            
            console.log(my_table);
            return my_table;
            // mytable.appendTo("#box");           
        
        }

        $('#editform').on('show.bs.modal', function () {
            var optionVal = $("#Nama").val();

            if(optionVal == 'PT. GEMILANG UTAMA INTERNASIONAL')
            {
                document.getElementById("Alamat").readOnly = true;
                document.getElementById("Telp").readOnly = true;
                document.getElementById("Kota").readOnly = true;
                document.getElementById("Kodepos").readOnly = true;
                document.getElementById("Hp").readOnly = true;
            }else{
                document.getElementById("Alamat").readOnly = false;
                document.getElementById("Telp").readOnly = false;
                document.getElementById("Kota").readOnly = false;
                document.getElementById("Kodepos").readOnly = false;
                document.getElementById("Hp").readOnly = false;
            }
        })

        $(document).ready(function(){
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });
            
            $('[data-toggle="tooltip"]').tooltip();   

            $("input[name='hp']").on("keyup change", function(){
            $("input[name='number1']").val(destroyMask2(this.value));
                this.value = createMask2($("input[name='number1']").val());
            })

            function createMask2(string){
                return string.replace(/(\d{4})(\d{4})(\d{4})/,"$1-$2-$3");
            }

            function destroyMask2(string){
                return string.replace(/\D/g,'').substring(0,12);
            }
            var table = $('#data-table').DataTable();

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                    $('.add-button').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');

                    closeOpenedRows(table, select);
                    
                    $('.add-button').hide();
                    $('.hapus-button').hide();
                    $('.edit-button').hide();
                    $('.view-button').hide();

                    var colom = select.find('td:eq(5)').text();
                    var data = $('#data-table').DataTable().row(select).data();
                    var kode_pemilik = data['id'];
                    var nama_pemilik = select.find('td:eq(0)').text();
                    var item = colom;
                    var add = $("#addpemilik").attr("href","http://localhost/gui_front_emkl_laravel/admin/pemilik/"+kode_pemilik+"/detail");
                    if(item > 0 && nama_pemilik != 'PT. GEMILANG UTAMA INTERNASIONAL'){
                        $('.add-button').show();
                        $('.hapus-button').hide();
                        $('.edit-button').show();
                        $('.print-button').show();
                        $('.view-button').show();
                    }else if(nama_pemilik == 'PT. GEMILANG UTAMA INTERNASIONAL'){
                        $('.add-button').show();
                        $('.hapus-button').hide();
                        $('.edit-button').hide();
                        $('.print-button').show();
                        $('.view-button').show();
                    }else{
                        $('.add-button').show();
                        $('.hapus-button').show();
                        $('.edit-button').show();
                        $('.print-button').show();
                        $('.view-button').hide();
                    }
                }
            });

            var openRows = new Array();

            function closeOpenedRows(table, selectedRow) {
                $.each(openRows, function (index, openRow) {
                    // not the selected row!
                    if ($.data(selectedRow) !== $.data(openRow)) {
                        var rowToCollapse = table.row(openRow);
                        rowToCollapse.child.hide();
                        openRow.removeClass('shown');
                        var index = $.inArray(selectedRow, openRows);                        
                        openRows.splice(index, 1);
                    }
                });
            }

            $('#button5').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#data-table').DataTable().row(select).data();
                var kode_pemilik = data['id'];
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('pemilik.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': kode_pemilik
                    },
                    success: function(result) {
                        console.log(result);
                        if(result.title == 'Gagal'){
                            $.notify(result.message);
                        }else{
                            if ( row.child.isShown() ) {
                                row.child.hide();
                                select.removeClass('shown');
                            }
                            else {
                                closeOpenedRows(table, select);

                                row.child( createTable(result) ).show();
                                select.addClass('shown');

                                openRows.push(select);
                            }
                        }
                    }
                });
            });

            $('#editpemilik').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#data-table').DataTable().row(select).data();
                var kode_pemilik = data['id'];
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('pemilik.edit_pemilik'); ?>',
                    type: 'POST',
                    data : {
                        'id': kode_pemilik
                    },
                    success: function(results) {
                        console.log(results);
                        $('#Kode').val(results.kode_pemilik);
                        $('#Nama').val(results.nama_pemilik);
                        $('#Alamat').val(results.alamat);
                        $('#Telp').val(results.telp);
                        $('#Kota').val(results.kota);
                        $('#Kodepos').val(results.kode_pos);
                        $('#Hp').val(results.hp);
                        $('#editform').modal('show');
                        }
         
                });
            });

            $('#hapuspemilik').click( function () {
                var select = $('.selected').closest('tr');
                var data = $('#data-table').DataTable().row(select).data();
                var kode_pemilik = data['id'];
                var row = table.row( select );
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
                            url: '<?php echo route('pemilik.hapus_pemilik'); ?>',
                            type: 'POST',
                            data : {
                                'id': kode_pemilik
                            },

                            success: function (results) {
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
            $('#data-table').DataTable().ajax.reload(null,false);
            $('.add-button').hide();
            $('.hapus-button').hide();
            $('.edit-button').hide();
            $('.view-button').hide();
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
                    url:'<?php echo route('pemilik.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Nama1').val('');
                        $('#Alamat1').val('');
                        $('#Telp1').val('');
                        $('#Kota1').val('');
                        $('#Kodepos1').val('');
                        $('#Hp1').val('');
                        $('#Vendor1').val('').trigger('change');
                        $('#pilih').val('').trigger('change');
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
                    url:'<?php echo route('pemilik.ajaxupdate'); ?>',
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
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>