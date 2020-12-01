@extends('adminlte.adminLayout')

@section('riwayat')
    <h1>Riwayat</h1>

    <div class="widget-content nopadding">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Siswa</th>
              <th>Kelas</th>
              <th>Mapel</th>
              <th>Quiz 1</th>
              <th>Quiz 2</th>
              <th>Tugas 1</th>
              <th>Tugas 2</th>
              <th>UTS</th>
              <th>UAS</th>
              <th>Sikap</th>
              <th>Hasil Akhir</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
              @foreach ($riwayat as $r)
                  <tr>
                    <td>{{$r->siswa->Nama_siswa}}</td>
                    <td>{{$r->kelas->Nama_kelas}}</td>
                    <td>{{$r->mapel->Nama_mapel}}</td>
                    <td>{{$r->Quiz1}}</td>
                    <td>{{$r->Quiz2}}</td>
                    <td>{{$r->Tugas1}}</td>
                    <td>{{$r->Tugas2}}</td>
                    <td>{{$r->UTS}}</td>
                    <td>{{$r->UAS}}</td>
                    <td>{{strtoupper($r->Sikap)}}</td>
                    <td>{{$r->Hasil_akhir}}</td>
                    <td>
                    <button class="btn btn-success"><a class="text-white" href="toUpdateRiwayat/{{$r->Id_riwayat_akademik}}">Update</a></button>
                    <button class="btn btn-danger"><a class="text-white" href="deleteRiwayat/{{$r->Id_riwayat_akademik}}">Delete</a></button>
                    </td>
                  </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Input Riwayat</h5>
            </div>
            <div class="widget-content nopadding">

                <form action="/siswa/crud" method="post" class="form-horizontal">
                @csrf

                {{-- <div class="control-group">
                  <label class="control-label">Agama :</label>
                  <div class="controls">
                    <select class="form-control span11" name="agama">
                        <option value="Islam" selected>Islam</option>
                        <option value="Budha">Budha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Katholik">Katolik</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                    @error('agama')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                </div> --}}

                <div class="form-actions">
                  <button type="submit" class="btn btn-success" name="Insert">Insert</button>
                  {{-- <button type="submit" class="btn btn-success" name="Update">Update</button> --}}
                </div>
              </form>
              {{-- form untuk admin input siswa dengan excel --}}
                <div class="control-group">
                    <label class="control-label">File Siswa:</label>
                    <div class="controls">
                    <input type="file" name="fileToa"/> Import Siswa Format File: Excel
                    </div>
                </div>
                    <div class="controls">
                        <form action="GetFormatSiswa" method="get">
                            Download Format Siswa:
                            <input type="submit" value="Format Input Siswa">
                        </form>
                    </div>


            </div>
        </div>
    </div>
</div>
    </div>



@endsection
