@extends('adminlte.adminLayout')

@section('riwayat')
<div class="row-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Riwayat Akademik</h5>
        </div>
        <div class="widget-content nopadding">

            <form action="/riwayat/crud" method="post" class="form-horizontal">
            @csrf
            <div class="control-group">
                <label class="control-label">Siswa :</label>
                <div class="controls">
                  <select class="form-control span11" name="siswa" style="width: 250pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                      @isset($DBsiswa)
                          @foreach ($DBsiswa as $i)
                  <option value="{{$i->NIS}}" selected>{{$i->Nama_siswa}} - {{$i->kelas->Nama_kelas}}- {{$i->kelas->Tingkat_kelas}}
                     </option>
                          @endforeach
                      @endisset
                  </select>
                  @error('siswa')
                      <br><span style="color: red;">{{ $message }}</span>
                  @enderror
                  </div>
              </div>
              <div class="control-group">
                <label class="control-label">Ajar mengajar :</label>
                <div class="controls">
                  <select class="form-control span11" name="ajar_mengajar" style="width: 250pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                      @isset($DBAjar_mengajar)
                          @foreach ($DBAjar_mengajar as $i)
                    <option value="{{$i->Id_ajar_mengajar}}" >{{$i->mapel->Nama_mapel}} -
                    {{$i->kelas->Nama_kelas}} - {{$i->kelas->Tingkat_kelas}} </option>
                          @endforeach
                      @endisset
                  </select>
                  @error('ajar_mengajar')
                      <br><span style="color: red;">{{ $message }}</span>
                  @enderror
                  </div>
              </div>


              {{-- <div class="control-group">
                <label class="control-label">Kelas :</label>
                <div class="controls">
                  <select class="form-control span11" name="kelas" style="width: 150pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                      @isset($DBkelas)
                          @foreach ($DBkelas as $v)
                          <option value="{{$v->Id_kelas}}" selected>{{$v->Nama_kelas}}</option>
                          @endforeach
                      @endisset
                  </select>
                  @error('kelas')
                      <br><span style="color: red;">{{ $message }}</span>
                  @enderror
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label">Mata Pelajaran :</label>
                  <div class="controls">
                    <select class="form-control span11" name="mapel" style="width: 150pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                        @isset($DBmapel)
                            @foreach ($DBmapel as $i)
                            <option value="{{$i->Id_mapel}}" selected>{{$i->Nama_mapel}}</option>
                            @endforeach
                        @endisset
                    </select>
                    @error('mapel')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                </div> --}}

                <div class="control-group">
                    <label class="control-label" for="">Nilai Quiz 1 :</label>
                    <div class="controls">
                        <input name="Quiz1" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 45pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="">Nilai Quiz 2 :</label>
                    <div class="controls">
                        <input name="Quiz2" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 45pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="">Nilai Tugas 1 :</label>
                    <div class="controls">
                        <input name="Tugas1" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 45pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="">Nilai Tugas 2 :</label>
                    <div class="controls">
                        <input name="Tugas2" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 45pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="">Nilai UTS :</label>
                    <div class="controls">
                        <input name="UTS" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 45pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="">Nilai UAS :</label>
                    <div class="controls">
                        <input name="UAS" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 45pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="">Nilai Sikap :</label>
                    <div class="controls">
                        <input name="Sikap" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 45pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="">Nilai Akhir :</label>
                    <div class="controls">
                        <input name="Nilai_akhir" type="text" class="form-control" aria-describedby="" placeholder="Enter Nilai" style="width: 45pt; height: 40px;  padding: 0.375rem 0.75rem; ">
                    </div>
                </div>


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
<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>Table Riwayat Akademik</h5>
    </div>
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
              @foreach ($DBriwayat as $r)
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
</div>
@endsection
