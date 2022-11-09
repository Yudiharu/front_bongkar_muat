@extends('adminlte::page')

@section('title', 'Users Create')

@section('content_header')

@stop

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="icon" type="image/png" href="/gui_inventory_laravel/css/logo_gui.png" sizes="16x16" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

@include('sweet::alert')
<body onLoad="load()">
    <div class="box">
        <div class="box-header with-border">
            <a href="{{ $info['list_url'] }}" class="btn btn-light btn-xs pull-left"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
        </div>
        {!! Form::open(['route' => ['roles.store']]) !!}


            <div class="box-body">

                @include('errors.validation')

                <div class="form-group">
                    {{ Form::label('name', 'Display Name: *') }}
                    {{ Form::text('display_name', null, ['class'=> 'form-control', 'required', 'autocomplete'=>'off']) }}
                </div>  
                
                <div class="form-group">
                    {{ Form::label('name', 'name: *') }}
                    {{ Form::text('name', null, ['class'=> 'form-control', 'required', 'autocomplete'=>'off']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('description', 'Description:') }}
                    {{ Form::text('description', null, ['class'=> 'form-control', 'required', 'autocomplete'=>'off']) }}
                </div>

                <div class="box">
                    <table class="table table-bordered" style="font-size: 14px">
                        @foreach($permissions->groupBy('tab') as $key => $value)
                            <thead>
                                <tr>
                                    <th colspan="3">{{ $key }}</th>
                                </tr>
                                <tr>
                                    <th><input type="checkbox" id="checkAll"></th>
                                    <th>Permission</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($value as $row)
                                <tr>
                                    <td>{{ Form::checkbox('permission[]', $row->id, null,['class' => 'selected'] ) }}</td>
                                    <td>{{ $row->display_name }}</td>
                                    <td>{{ $row->description }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="box-footer">
                <div class="row pull-right">
                    <div class="col-md-12 ">
                        <a href="{{ $info['list_url'] }}" class="btn btn-light btn-sm pull-left"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-floppy-o"></i> Simpan</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i>{{ $nama_company }}</i> <b>({{ $nama_lokasi }})</b></button>

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
@stop
@push('js')
    <script>
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
            $('.back2Top').show();
        }

        var app = new Vue({
            el: '.box',
            data: {
                message: 'Hello Vue!'
            },

            mounted() {
                this.checkedAll()
            },

            methods: {
                update: function (event) {
                    var url = ''
                    var data = $('#form_roles_edit').serialize();

                    axios.put(url, data).then(function (response) {
                        console.log(response.data)
                        if (response.data.success){
                            swal({
                                title: "<b>Proses Sedang Berlangsung</b>",
                                type: "warning",
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                        swal("Berhasil!", response.data.message, "success");
                        }
                    })
                },

                checkedAll: function (event) {
                    $('#checkAll').click(function () {
                        $('.selected').prop('checked', this.checked);
                    });
                }
            }
        })
    </script>
@endpush