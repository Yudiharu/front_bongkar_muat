<?php $__env->startSection('title', 'Transfer In'); ?>

<?php $__env->startSection('content_header'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="icon" type="image/png" href="/gui_inventory_laravel/css/logo_gui.png" sizes="16x16" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">                      
   
    <div class="box box-solid">
        <div class="box-body">
            <div class="box">
                <div class="box-body">
                 
                    <button type="button" class="btn btn-default btn-xs" onclick="refreshTable()" >
                            <i class="fa fa-refresh"></i> Refresh</button>
                    <span class="pull-right"> 
                            <button type="button" class="btn btn-primary btn-xs" id="button5"><i class="fa fa-paperclip"></i> VIEW DETAIL</button>
                    </span>
                    
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr class="bg-primary">
                        <th>No Trf In</th>
                        <th>No Transfer</th>
                        <th>Tanggal transfer</th>
                        <th>Total Item</th>
                        <th>Kode Lokasi</th>
                        <th>Transfer Dari</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    
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

        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('transferin.data'); ?>',
            columns: [
                { data: 'no_trf_in', name: 'no_trf_in' },
                { data: 'no_transfer', name: 'no_transfer' },
                { data: 'tanggal_transfer', name: 'tanggal_transfer' },
                { data: 'total_item', name: 'total_item' },
                { data: 'kode_lokasi', name: 'kode_lokasi' },
                { data: 'transfer_dari', name: 'transfer_dari' },
                { data: 'status', name: 'status' },
            ]
            });
        });

        function formatRupiah(angka, prefix='Rp'){
           
                var number_string = angka.toString(),
                sisa    = number_string.length % 3,
                rupiah  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                    
                if(number_string % 1 != 0){
                    var sisa    = number_string.length % 4,
                    rupiah  = number_string.substr(0, sisa),
                    ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                }

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                // console.log(number_string);
                }
                
                return rupiah;
           
        }

        function rupiah(angka, prefix='Rp'){
            var value = angka.toLocaleString(
                undefined, // leave undefined to use the browser's locale,
                // or use a string like 'en-US' to override it.
                { minimumFractionDigits: 0 }
            );
            return value;
        }

        function createTable(result){

        var total_qty = 0;
        var total_qty_received = 0;
        var total_pakai = 0;
        var total_harga = 0;
        var grand_total = 0;

        $.each( result, function( key, row ) {
            total_qty += row.qty;
            total_qty_received += row.qty_received;
            harga = row.harga;
            qty = row.qty;
            total_pakai = harga * qty;
            total_harga += total_pakai;
            grand_total = rupiah(total_harga);

        });

        var my_table = "";

        $.each( result, function( key, row ) {
                    my_table += "<tr>";
                    my_table += "<td>"+row.produk+"</td>";                
                    my_table += "<td>"+row.qty+"</td>";
                    my_table += "<td>Rp "+rupiah(row.harga)+"</td>";
                    my_table += "<td>Rp "+row.subtotal+"</td>";                  
                    my_table += "</tr>";
            });

            my_table = '<table id="table-fixed" class="table table-bordered table-hover" cellpadding="5" cellspacing="0" border="1" style="padding-left:50px; font-size:12px">'+ 
                        '<thead>'+
                           ' <tr class="bg-info">'+
                                '<th>Produk</th>'+                            
                                '<th>Qty</th>'+
                                '<th>HPP</th>'+
                                '<th>Subtotal</th>'+                              
                            '</tr>'+
                        '</thead>'+
                        '<tbody>' + my_table + '</tbody>'+
                       ' <tfoot>'+
                            '<tr class="bg-info">'+
                                '<th class="text-center" colspan="1">Total</th>'+
                                '<th></th>'+
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

            // table.DataTable(
            // {
            //     "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            //             if ( aData[6] == "OPEN" )
            //               {
            //                 $('td', nRow).css('background-color', '#f2dede' );
            //               }
            //               else if ( aData[6] == "POSTED" )
            //               {
            //                 $('td', nRow).css('background-color', '#dff0d8');
            //               }  
            //     }
            // }
            // )
                                
            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var colom = select.find('td:eq(6)').text();
                    var colom2 = select.find('td:eq(3)').text();
                    var no_transfer = select.find('td:eq(0)').text();
                    var status = colom;
                    var item = colom2;
                    if(status == 'POSTED' && item > 0){
                        $('.tombol1').hide();
                        $('.tombol2').show();
                    }else if(status =='UNPOSTED' && item > 0){
                        $('.tombol1').show();
                        $('.tombol2').hide();
                    }else if(status =='CLOSED' || status =='RECEIVED'){
                        $('.tombol1').hide();
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
                var no_trf_in = colom;
                console.log(no_trf_in);
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
                            url: '<?php echo route('transferin.posting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_trf_in
                            },
                            success: function(result) {
                                console.log(result);
                                if (result.success === true) {
                                    swal(
                                    'Transfer!',
                                    'Berhasil di Posting.',
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
                var no_trf_in = colom;
                console.log(no_trf_in);
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
                            url: '<?php echo route('transferin.unposting'); ?>',
                            type: 'POST',
                            data : {
                                'id': no_trf_in
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
                var no_trf_in = select.find('td:eq(0)').text();
                var row = table.row( select );
                // console.log(no_pemakaian);
                // alert( table.rows('.selected').data().length +' row(s) selected' );
                $.ajax({
                    url: '<?php echo route('transferin.showdetail'); ?>',
                    type: 'POST',
                    data : {
                        'id': no_trf_in
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
                                console.log(result[i].produk,result[i].qty,result[i].harga);
                                // alert(result[i].produk);
                            }

                            row.child( createTable(result) ).show();
                            // row.child( format(result) ).show();
                            select.addClass('shown');
                        }
                     }
                    }
                });
            });
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

    </script>
<?php $__env->stopPush(); ?>

                                
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>