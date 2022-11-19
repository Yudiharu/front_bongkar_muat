<?php $__env->startSection('title', 'COA'); ?>

<?php $__env->startSection('content_header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                    <?php if (app('laratrust')->can('create-coa')) : ?>
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New COA</button>
                    <?php endif; // app('laratrust')->can ?>

                    <span class="pull-right"> 
                        <font style="font-size: 16px;"><b>CHARTS OF ACCOUNTS</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-blue">
                        <th>Kode COA</th>
                        <th>Cost Center</th>
                        <th>Account</th>
                        <th>AC Description</th>
                        <th>CC Accum</th>
                        <th>AC Accum</th>
                        <th>Level</th>
                        <th>Position</th>
                        <th>Normal Balance</th>
                        <th>Account Type</th>
                        <th>Sub Account</th>
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('cost_center', 'Cost Center:')); ?>

                                    <?php echo e(Form::text('cost_center',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'cost1','required', 'placeholder'=>'Cost Center','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('account', 'Account:')); ?>

                                    <input type="text" name="number" style="display:none;">
                                    <?php echo e(Form::text('account',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'account1','required', 'name'=>'account', 'placeholder'=>'Account','autocomplete'=>'off'])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('ac_description', 'AC Description:')); ?>

                                    <?php echo e(Form::text('ac_description',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'acd1','required', 'placeholder'=>'AC Description','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('cc_accum', 'CC Accum:')); ?>

                                    <?php echo e(Form::text('cc_accum',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'cc1','required', 'placeholder'=>'CC Accum','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('ac_accum', 'AC Accum:')); ?>

                                    <?php echo e(Form::select('ac_accum',$account,null, ['class'=> 'form-control select2','style'=>'width: 100%' ,'id'=>'aca1','placeholder'=>''])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('level', 'Level:')); ?>

                                    <?php echo e(Form::text('level',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'level1','required', 'placeholder'=>'Level','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('position', 'Position:')); ?>

                                    <?php echo e(Form::select('position',['HEADER' => 'HEADER', 'DETAIL' => 'DETAIL'],null, ['class'=> 'form-control select2','style'=>'width: 100%' ,'id'=>'position1','required', 'placeholder'=>'','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('normal_balance', 'Normal Balance:')); ?>

                                    <?php echo e(Form::select('normal_balance',['DEBIT' => 'DEBIT', 'KREDIT' => 'KREDIT'],null, ['class'=> 'form-control select2','style'=>'width: 100%' ,'id'=>'normal1','required', 'placeholder'=>'','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('account_type', 'Account Type:')); ?>

                                    <?php echo e(Form::select('account_type',['ASSETS' => 'ASSETS', 'LIABILITIES' => 'LIABILITIES', 'CAPITAL' => 'CAPITAL', 'REVENUE' => 'REVENUE', 'EXPENSE' => 'EXPENSE', 'OTHERS' => 'OTHERS'],null, ['class'=> 'form-control select2','style'=>'width: 100%' ,'id'=>'type1','required', 'placeholder'=>'Account Type','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                                    <?php echo e(Form::hidden('sub_account',0, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'sub1','required', 'placeholder'=>'Sub Account','autocomplete'=>'off','onkeypress'=>"return pulsar(event,this)",'readonly'])); ?>

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
                                    <?php echo e(Form::hidden('kode_coa',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'kode2','required', 'placeholder'=>'Kode COA','readonly'])); ?>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('cost_center', 'Cost Center:')); ?>

                                    <?php echo e(Form::text('cost_center',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'cost2','required', 'placeholder'=>'Cost Center','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('account', 'Account:')); ?>

                                    <?php echo e(Form::text('account',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'account2','required', 'placeholder'=>'Account','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('ac_description', 'AC Description:')); ?>

                                    <?php echo e(Form::text('ac_description',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'acd2','required', 'placeholder'=>'AC Description','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('cc_accum', 'CC Accum:')); ?>

                                    <?php echo e(Form::text('cc_accum',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'cc2','required', 'placeholder'=>'CC Accum','autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('ac_accum', 'AC Accum:')); ?>

                                    <?php echo e(Form::select('ac_accum',$account,null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'aca2'])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('level', 'Level:')); ?>

                                    <?php echo e(Form::text('level',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'level2','required', 'placeholder'=>'Level','autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('position', 'Position:')); ?>

                                    <?php echo e(Form::select('position',['HEADER' => 'HEADER', 'DETAIL' => 'DETAIL'],null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'position2','required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('normal_balance', 'Normal Balance:')); ?>

                                    <?php echo e(Form::select('normal_balance',['DEBIT' => 'DEBIT', 'KREDIT' => 'KREDIT'],null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'normal2','required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('account_type', 'Account Type:')); ?>

                                    <?php echo e(Form::select('account_type',['ASSETS' => 'ASSETS', 'LIABILITIES' => 'LIABILITIES', 'CAPITAL' => 'CAPITAL', 'REVENUE' => 'REVENUE', 'EXPENSE' => 'EXPENSE', 'OTHERS' => 'OTHERS'],null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'type2','required', 'autocomplete'=>'off', 'style'=>"text-transform: uppercase;"])); ?>

                                </div>
                            </div>
                                    <?php echo e(Form::hidden('sub_account',null, ['class'=> 'form-control','style'=>'width: 100%' ,'id'=>'sub2','required', 'placeholder'=>'Sub Account','autocomplete'=>'off','readonly'])); ?>

                             
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
            .view-button {
                background-color: #1674c7;
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
            <?php if (app('laratrust')->can('view-produk')) : ?>
            <button type="button" class="btn btn-primary btn-xs view-button" id="button6">VIEW <i class="fa fa-eye"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('update-coa')) : ?>
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editcoa" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>
            <?php endif; // app('laratrust')->can ?>

            <?php if (app('laratrust')->can('delete-coa')) : ?>
            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapuscoa" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
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

        function load(){
            startTime();
            $('.tombol1').hide();
            $('.tombol2').hide();
            $('.back2Top').show();
        }
        
        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('coa.data'); ?>',
            columns: [
                { data: 'kode_coa', name: 'kode_coa' },
                { data: 'cost_center', name: 'cost_center' },
                { data: 'account', name: 'account' },
                { data: 'ac_description', name: 'ac_description' },
                { data: 'cc_accum', name: 'cc_accum' },
                { data: 'ac_accum', name: 'ac_accum' },
                { data: 'level', name: 'level' },
                { data: 'position', name: 'position' },
                { data: 'normal_balance', name: 'normal_balance' },
                { data: 'account_type', name: 'account_type' },
                { data: 'sub_account', name: 'sub_account' },
            ]
            });
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
            if ((("0123456789.-").indexOf(keychar) > -1)) {
                return true;
            } else
            if (decimal && (keychar == ".")) {
                return true;
            } else return false;
        }   

        $('.select2').select2({
            placeholder: "Pilih",
            allowClear: true,
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function createTable3(result)
        {
            var my_table = "";

            $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.account+"</td>";
                    my_table += "<td>"+row.ac_description+"</td>";
                    my_table += "<td>"+row.sub_account+"</td>";
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-primary">'+
                                '<th>Account</th>'+
                                '<th>AC Description</th>'+
                                '<th>Sub Account</th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                        '</table>';

            console.log(my_table);
            return my_table;
        }

        $(document).ready(function() {
            $("input[name='account']").on("keyup change", function(){
            $("input[name='number']").val(destroyMask(this.value));
                this.value = createMask($("input[name='number']").val());
            })

            function createMask(string){
                return string.replace(/(\d{2})(\d{1})(\d{2})(\d{3})/,"$1.$2.$3.$4");
            }

            function destroyMask(string){
                return string.replace(/\D/g,'').substring(0,8);
            }


            var table = $('#data-table').DataTable();

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                }
            });

            $('#editcoa').click( function () {
                var select = $('.selected').closest('tr');
                var kode_coa = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('coa.edit_coa'); ?>',
                    type: 'POST',
                    data : {
                        'id': kode_coa
                    },
                    success: function(results) {
                        console.log(results);
                        $('#kode2').val(results.kode_coa);
                        $('#cost2').val(results.cost_center);
                        $('#account2').val(results.account);
                        $('#acd2').val(results.ac_description);
                        $('#cc2').val(results.cc_accum);
                        $('#aca2').val(results.ac_accum);
                        $('#level2').val(results.level);
                        $('#position2').val(results.position);
                        $('#normal2').val(results.normal_balance);
                        $('#type2').val(results.account_type);
                        $('#sub2').val(results.sub_account);
                        $('#editform').modal('show');
                        }
         
                });
            });

            $('#hapuscoa').click( function () {
                var select = $('.selected').closest('tr');
                var kode_coa = select.find('td:eq(0)').text();
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
                            url: '<?php echo route('coa.hapus_coa'); ?>',
                            type: 'POST',
                            data : {
                                'id': kode_coa
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

            $('#button6').click( function () {
                var select = $('.selected').closest('tr');
                var account = select.find('td:eq(2)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('coa.showsub'); ?>',
                    type: 'POST',
                    data : {
                        'id': account
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
                                    console.log(result[i].tanggal_transaksi,result[i].no_transaksi,result[i].qty_transaksi,result[i].total_transaksi);
                                }

                                row.child( createTable3(result) ).show();
                                select.addClass('shown');
                            }
                        }
                    }
                });
            });
        });

        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);
        }

        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });

        $('.modal-dialog').resizable({
    
        });

        

        $('#ADD').submit(function (e) {
            e.preventDefault();
            // var kode = $.trim($('#kode1').val());
            var cost = $.trim($('#cost1').val());
            var acc = $.trim($('#account1').val());
            var acd = $.trim($('#acd1').val());
            var cca = $.trim($('#cc1').val());
            var aca = $.trim($('#aca1').val());
            var level = $.trim($('#level1').val());
            var position = $.trim($('#position1').val());
            var normal = $.trim($('#normal1').val());
            var type = $.trim($('#type1').val());
            var sub = $.trim($('#sub1').val());
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();
            
                $.ajax({
                    url:'<?php echo route('coa.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        // $('#kode1').val('');
                        $('#cost1').val('');
                        $('#account1').val('');
                        $('#acd1').val('');
                        $('#cc1').val('');
                        $('#aca1').val('').trigger('change');
                        $('#level1').val('');
                        $('#position1').val('').trigger('change');
                        $('#normal1').val('').trigger('change');
                        $('#type1').val('').trigger('change');
                        $('#sub1').val(0);
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
            var kode = $.trim($('#kode2').val());
            var cost = $.trim($('#cost2').val());
            var acc = $.trim($('#account2').val());
            var acd = $.trim($('#acd2').val());
            var cca = $.trim($('#cc2').val());
            var aca = $.trim($('#aca2').val());
            var level = $.trim($('#level2').val());
            var position = $.trim($('#position2').val());
            var normal = $.trim($('#normal2').val());
            var type = $.trim($('#type2').val());
            var sub = $.trim($('#sub2').val());
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('coa.ajaxupdate'); ?>',
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
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>