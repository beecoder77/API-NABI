@extends('adminlte::page')

@section('title', 'Abid Gans')

@section('content_header')
    <h1>Cek Jurusan dan CRUD Jurusan(Add Materi, Delete Jurusan, Edit Jurusan)</h1>
@stop

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Daftar Jurusan Yang Ada di SMK TELKOM PURWOKERTO <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
      Add Data
    </button></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach ($all_jurusan as $jurusan): ?>
        <tr>

          <td><img src="{{$jurusan['Image']}}" style="height:50px;width:50px;"></td>
          <td>{{$jurusan['Name']}}</td>
          <td><a href="/jurusan/{{$jurusan['key']}}/materi">ADD</a> | EDIT | DELETE</td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>

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
          <input type="text" placeholder="Image url" name="image" class="form-control">
          <input type="text" placeholder="Name Image" name="name" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@stop
