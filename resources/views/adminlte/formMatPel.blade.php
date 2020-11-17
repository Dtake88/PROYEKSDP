@extends('adminlte.adminLayout')

@section('formMapel')

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
      <h5>Table Siswa</h5>
    </div>
    <div class="widget-content nopadding">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Mata Pelajaran</th>
            <th>KKM</th>
            <th>Tingkat</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftarMatPel as $mapel)
                <tr>
                    <td>{{$mapel->Id_mapel}}</td>
                    <td>{{$mapel->Nama_mapel}}</td>
                    <td>{{$mapel->KKM}}</td>
                    <td>{{$mapel->Tingkat}}</td>
                    <td>
                        <form action="/mapel/crud" method="post" class="form-horizontal">
                            @csrf
                            <button type="submit" class="btn btn-danger" name="Delete" value="{{$mapel->Id_mapel}}">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
<!--Chart-box-->
<div class="row-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Mata Pelajaran</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="/mapel/crud" method="post" class="form-horizontal">
            @csrf
            <div class="control-group">
              <label class="control-label">Nama Mata Pelajaran :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Nama Mata Pelajaran" name="nama"/>
                @error('nama')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
            </div>
            </div>
            <div class="control-group">
              <label class="control-label">KKM :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="KKM"  name="kkm"/>
                @error('kkm')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
            </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tingkat Mata Pelajaran :</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Tingkatan Mata Pelajaran" name="tingkat" />
                @error('tingkat')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
            </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="Insert">Insert</button>
              <button type="submit" class="btn btn-success" name="Update">Update</button>
            </div>
          </form>
        </div>
    </div>
</div>
<!--End-Chart-box-->
    <hr/>
</div>
@endsection
