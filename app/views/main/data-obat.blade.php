@extends('layouts.backend')

@section('style-head')
    @parent
    <link href="{{asset('assets/plugins/datatables/media/DT_bootstrap.css')}}" rel="stylesheet">
@stop

@section('script-end')
    @parent
    <script type="text/javascript" src="{{asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            $('table.datatable').dataTable({
                "sDom":"<'row'<'col col-lg-6'l><'col col-lg-6'f>r>t<'row'<'col col-lg-6'i><'col col-lg-6'p>>",
                "sPaginationType":"full_numbers",
            })
        });
    </script>

@stop

@section('content')

    <div class="box">

        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Obat</h3>
                    </div>
                    <table class="table datatable table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Obat</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stock</th>
                                <th>Expired Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($obat as $key => $value)
                            <tr>
                                <td>{{ $value->kd_obat }}</td>
                                <td>{{ $value->nama_obat }}</td>
                                <td>{{ $value->harga_beli }}</td>
                                <td>{{ $value->harga_jual }}</td>
                                <td>{{ $value->stok }}</td>
                                <td>{{ date("d-m-Y", strtotime($value->expired)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>

@stop