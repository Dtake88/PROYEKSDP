@extends('home')

@section('body')

<div class="widget-content nopadding">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>ID Kelas</th>
          <th>ID Mapel</th>
          <th>NIG</th>
          <th>Jam Mulai</th>
          <th>Jam Berakhir</th>
          <th>Hari</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($Jadwal as $i)
              <tr>
                  <td>{{$i->Id_ajar_mengajar}}</td>
                  <td>{{$i->Id_kelas}}</td>
                  <td>{{$i->Id_mapel}}</td>
                  <td>{{$i->NIG}}</td>
                  <td>{{$i->Jam_dimulai}}</td>
                  <td>{{$i->Jam_berakhir}}</td>
                  <td>{{$i->Hari}}</td>
                  <td>{{$i->Status_jadwal}}</td>
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
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Kelas</label>
                <div class="controls">
                <select class="span11">
                    @foreach ($kelas as $i)
                        <option value="{{$i->Id_kelas}}">{{$i->Id_kelas}} - {{$i->Nama_kelas}} - {{$i->Id_jurusan}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Mata Pelajaran</label>
                <div class="controls">
                <select class="span11">
                    @foreach ($Mapel as $i)
                        <option value="{{$i->Id_mapel}}">{{$i->Id_mapel}} - {{$i->Nama_mapel}} - {{$i->Tingkat}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Guru</label>
                <div class="controls">
                <select class="span11">
                    @foreach ($Guru as $i)
                        <option value="{{$i->NIG}}">{{$i->NIG}} - {{$i->Nama_guru}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Hari</label>
                <div class="controls">
                <select class="span11">
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
                  <input type="time" name="jamMulai" min="08:00" max="14:00" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Jam Berakhir :</label>
                <div class="controls">
                  <input type="time" name="jamBerakhir" value="15:37z" required>
                </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>
<!--End-Chart-box-->
    <hr/>
</div>

@endsection
