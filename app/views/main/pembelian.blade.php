@extends('layouts.backend')

@section('style-head')
    @parent
    <link href="{{asset('assets/plugins/datatables/media/DT_bootstrap.css')}}" rel="stylesheet">
@stop

@section('script-end')
    @parent
    <script type="text/javascript" src="{{asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        /*$(function(){
            $('table.datatable').dataTable({
                "sDom":"<'row'<'col col-lg-6'l><'col col-lg-6'f>r>t<'row'<'col col-lg-6'i><'col col-lg-6'p>>",
                "sPaginationType":"full_numbers",
            })
        });*/

        /*function cariObat(){
            var kode = $("#kode").val();
            $.ajax({
                type: "GET",
                url : "",
                data: "kd_barang="+kd_barang,
                cache:false,
                success: function(data){
                    $('#data').html(data);
                    document.frm.add.disabled=false;
                }
            });
            $("#data").html(kode);
        }*/

        $(document).ready(function(){
            $("#kode").change(function(){
                var kode = $("#kode").val();
                $.ajax({
                    type: "POST",
                    //url : "{{ URL::to('detailObat') }}",
                    url : "{{route('detailObat')}}",
                    data: "kode="+kode,
                    cache:false,
                    success: function(data){
                        $('#data').html(data);
                        document.frm.add.disabled=false;
                    }
                });
            });
        });
    </script>

@stop

@section('content')

    <div class="box">

        <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pembelian Obat Tanggal: {{ date('d-m-Y') }}</h3>
                    </div>
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                
                                <th>Nama Obat</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Control</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($temp as $key => $value)
                            <tr>
                                <td>{{ $value->kd_obat }}</td>
                                <td>{{ $value->harga_satuan }}</td>
                                <td>{{ $value->jumlah }}</td>
                                <td>{{ $value->total }}</td>
                                <td></td>
                            </tr>
                            @endforeach  
                            <tr>
                                <td colspan="5"><center><a href="#addObat" class="btn btn-success" data-toggle="modal">Tambah Data</a></center></td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
<div class="modal fade" id="addObat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Modal title</h4>
    </div>
    <div class="modal-body">
    <form id="frm" name="frm">
      <div class="form-group">
            <label for="inputEmail1" class="col-md-2 control-label">Select</label>
            <div class="col-md-10">
                <select class="form-control" id="kode">
                    <option></option>
                    @foreach($obat as $key => $value)
                    <option value="{{ $value->kd_obat }}">{{ $value->nama_obat }}</option>
                    @endforeach
                </select>
            </div>
            <div id="data"></div>
        </div>
        
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" id="add" disabled="disabled">Save changes</button>
    </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop