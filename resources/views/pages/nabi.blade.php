@extends('adminlte::page')

@section('title', 'Abid Gans')

@section('content_header')
    <h1>Data para Nabi</h1>
@stop

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Daftar Data Nabi <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
      Add Data
    </button></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Nama</th>
        <th>Alias</th>
        <th>Usia</th>
        <th>Periode</th>
        <th>Tempat Diutus</th>
        <th>Tempat Wafat</th>
        <th>Disebut dalam Al-Quran</th>
        <th>Sebutan Kaum</th>
        <th>Jumlah Keturunan</th>
      </tr>
      </thead>
      <tbody>
        @if(!empty($all_nabi))

        <?php foreach ($all_nabi as $nabi): ?>
        <tr>
          <td>{{$nabi['nama']}}</td>
          <td>{{$nabi['alias']}}</td>
          <td>{{$nabi['usia']}}</td>
          <td>{{$nabi['periode']}}</td>
          <td>{{$nabi['tempatDiutus']}}</td>
          <td>{{$nabi['tempatWafat']}}</td>
          <td>{{$nabi['disebutDalamAlQuran']}}</td>
          <td>{{$nabi['sebutanKaum']}}</td>
          <td>{{$nabi['jumlahKeturunan']}}</td>
        </tr>
        <?php endforeach; ?>
        @endif
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!--
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Data</h4>
      </div>
        <form class="" action="" method="post">
      <div class="modal-body">

          {!! csrf_field() !!}
          <input type="text" placeholder="Nama" name="nama" class="form-control">
          <input type="text" placeholder="Alias" name="alias" class="form-control">
          <input type="text" placeholder="Usia" name="usia" class="form-control">
          <input type="text" placeholder="Periode" name="periode" class="form-control">
          <input type="text" placeholder="Tempat Diutus" name="tempatDiutus" class="form-control">
          <input type="text" placeholder="Tempat Wafat" name="tempatWafat" class="form-control">
          <input type="text" placeholder="Disebut Dalam Al-Quran" name="disebutDalamAlQuran" class="form-control">
          <input type="text" placeholder="Sebutan Kaum" name="sebutanKaum" class="form-control">
          <input type="text" placeholder="Jumlah Keturunan" name="jumlahKeturunan" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div> -->
    <!-- /.modal-content -->
  <!-- </div> -->
  <!-- /.modal-dialog -->
</div>
@stop
