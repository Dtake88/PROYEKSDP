@extends('adminlte.adminLayout')

@section('formKelas')

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
      <h5>Table Kelas</h5>
    </div>
    <div class="widget-content nopadding">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>ID Periode</th>
            <th>NIG</th>
            <th>Nama Kelas</th>
            <th>Tingkat Kelas</th>
            <th>ID Jurusan</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftarKelas as $kls)
                <tr>
                    <td>{{$kls->Id_kelas}}</td>
                    <td>{{$kls->Id_periode}}</td>
                    <td>{{$kls->NIG}}</td>
                    <td>{{$kls->Nama_kelas}}</td>
                    <td>{{$kls->Tingkat_kelas}}</td>
                    <td>{{$kls->Id_jurusan}}</td>
                    <td>
                        <form action="/kelas/crud" method="post" class="form-horizontal">
                            @csrf
                            <button type="submit" class="btn btn-danger" name="Delete" value="{{$kls->Id_kelas}}">Delete</button>
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
              <h5>Input Kelas</h5>
            </div>
            <div class="widget-content nopadding">
              <form action="/kelas/crud" method="post" class="form-horizontal">
                @csrf
                <div class="control-group">
                    <label class="control-label">Periode</label>
                    <div class="controls">
                    <select class="span11" name="period">
                        @foreach ($periode as $i)
                            <option value="{{$i->Id_periode}}">{{$i->Tahun_ajaran}} - Semester {{$i->Semester}}</option>
                        @endforeach
                    </select>
                    @error('period')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Guru</label>
                    <div class="controls">
                    <select class="span11" name="nig">
                        @foreach ($Guru as $i)
                            <option value="{{$i->NIG}}">{{$i->NIG}} - {{$i->Nama_guru}}</option>
                        @endforeach
                    </select>
                    @error('nig')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Nama Kelas :</label>
                  <div class="controls">
                    <input type="text" class="span11" placeholder="Nama Lengkap" name="nama" />
                    @error('nama')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Tingkat Kelas :</label>
                  <div class="controls">
                    <input type="text"  class="span11" placeholder="Tingkat Kelas" name="tingkat"  />
                    @error('tingkat')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Jurusan</label>
                    <div class="controls">
                    <select class="span11" name="idJur">
                        @foreach ($jurusan as $i)
                            <option value="{{$i->Id_jurusan}}">{{$i->Nama_jurusan}}</option>
                        @endforeach
                    </select>
                    @error('idJur')
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
{{--  --}}
@endsection
