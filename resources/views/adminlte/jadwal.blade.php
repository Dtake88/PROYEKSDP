@extends('adminlte.adminLayout')

@section('jadwal')
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
                <select class="span11" name="Id_kelas" style="width: 150pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    @foreach ($kelas as $i)
                        <option value="{{$i->Id_kelas}}">{{$i->Nama_kelas}} </option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Mata Pelajaran</label>
                <div class="controls">
                <select class="span11" name="Id_mapel" style="width: 150pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    @foreach ($Mapel as $i)
                        <option value="{{$i->Id_mapel}}">{{$i->Nama_mapel}} - {{$i->Tingkat}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Guru</label>
                <div class="controls">
                <select class="span11" name="NIG" style="width: 250pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    @foreach ($Guru as $i)
                        <option value="{{$i->NIG}}">{{$i->Nama_guru}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Hari</label>
                <div class="controls">
                <select class="span11" name="Hari" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
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
                  <input type="time" name="Jam_dimulai" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Jam Berakhir :</label>
                <div class="controls">
                  <input type="time" name="Jam_berakhir" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; " >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Jam Belajar :</label>
                <div class="controls">
                  <input type="time" name="Jam_belajar"  style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Status: </label>
                <div class="controls">
                <select class="span11" name="Status_jadwal" style="width: 100pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
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

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>Table Jadwal</h5>
        <form action="/kefilterJadwal" method="get">
            <input class="btn btn-success" style="margin-top: 1mm; margin-left: 80%;" type="submit" value="Filter Jadwal">
          </form>
      </div>
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
</div>



@endsection
