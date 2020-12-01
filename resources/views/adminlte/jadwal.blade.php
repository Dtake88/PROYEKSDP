@extends('adminlte.adminLayout')

@section('jadwal')

<div class="widget-content nopadding">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID Kelas</th>
          <th>ID Mapel</th>
          <th>NIG</th>
          <th>Jam Mulai</th>
          <th>Jam Berakhir</th>
          <th>Hari</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($Jadwal as $i)
              <tr>
                  <td>{{$i->kelas->Nama_kelas}}</td>
                  <td>{{$i->mapel->Nama_mapel}}</td>
                  <td>{{$i->guru->Nama_guru}}</td>
                  <td>{{$i->Jam_dimulai}}</td>
                  <td>{{$i->Jam_berakhir}}</td>
                  <td>{{$i->Hari}}</td>
                  <td>{{$i->Status_jadwal}}</td>
                  <td>
                    <button class="btn btn-danger"><a class="text-white" href="deleteJadwal/{{$i->Id_ajar_mengajar}}">Delete</a></button>
                    <button class="btn btn-success"><a class="text-white" href="toUpdateJadwal/{{$i->Id_ajar_mengajar}}">Update</a></button>
                </td>
              </tr>
          @endforeach
      </tbody>
    </table>
  </div>
<!--Chart-box-->
<div class="row-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Jadwal</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="jadwal/crud" method="post" class="form-horizontal">
            @csrf
            <div class="control-group">
                <label class="control-label">Kelas</label>
                <div class="controls">
                <select class="span11" name="Id_kelas">
                    @foreach ($kelas as $i)
                        <option value="{{$i->Id_kelas}}">{{$i->Nama_kelas}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Mata Pelajaran</label>
                <div class="controls">
                <select class="span11" name="Id_mapel">
                    @foreach ($Mapel as $i)
                        <option value="{{$i->Id_mapel}}">{{$i->Nama_mapel}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Guru</label>
                <div class="controls">
                <select class="span11" name="NIG">
                    @foreach ($Guru as $i)
                        <option value="{{$i->NIG}}">{{$i->Nama_guru}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Hari</label>
                <div class="controls">
                <select class="span11" name="Hari">
                        <option value="senin">senin</option>
                        <option value="selasa">selasa</option>
                        <option value="rabu">rabu</option>
                        <option value="kamis">kamis</option>
                        <option value="jumat">jumat</option>
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Jam Mulai :</label>
                <div class="controls">
                  <input type="time" name="Jam_dimulai">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Jam Berakhir :</label>
                <div class="controls">
                  <input type="time" name="Jam_berakhir" >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Jam Belajar :</label>
                <div class="controls">
                  <input type="time" name="Jam_belajar" >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Status: </label>
                <div class="controls">
                <select class="span11" name="Status_jadwal">
                        <option value="1">Aktif</option>
                        <option value="0">Non Aktif</option>
                </select>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success" name="Insert">Insert</button>
            </div>
          </form>
        </div>
    </div>
</div>
<!--End-Chart-box-->
    <hr/>
</div>

@endsection
