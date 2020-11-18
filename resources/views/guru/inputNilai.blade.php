@extends('guru.guruLayout')

@section('inputNilai')
<div class="row-fluid" style="padding:30px">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i     class="icon-align-justify"></i> </span>
        <h5>Input Nilai</h5>
        </div>
        <div class="control-group">
            <label class="control-label">Input Nilai:</label>
            <div class="controls">
            <input type="file" name="fileToa"/> Import Nilai Format File: Excel
            </div>
        </div>
        <form action="DownloadFormat" method="get">
        Format Input Nilai Di Excel
        <input type="submit" value="Download">
        </form>
    </div>
</div>
<div class="row-fluid" style="padding:30px">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Filter</h5>
        </div>
        <form action="/getDaftarNilai" method="get">
        <div class="control-group">
            <label class="control-label">Mata Pelajaran</label>
            <div class="controls">
            <select name="mapel" class="span11">
                @foreach ($mapel as $i)
                    <option value="{{$i->Id_mapel}}" > {{$i->Nama_mapel}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Kelas</label>
            <div class="controls">
            <select name="kelas" class="span11">
                    @foreach ($kelas as $i)
                        <option value="{{$i->Id_kelas}}" >{{$i->Nama_kelas}}</option>
                    @endforeach

            </select>
            </div>
        </div>
            <input type="submit" value="Search">
        </form>
    </div>
</div>
<div class="row-fluid" style="padding:30px">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Table Nilai</h5>
        <table class="table" >
            <thead >
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Quiz 1</th>
                <th scope="col">Quiz 2</th>
                <th scope="col">Tugas 1</th>
                <th scope="col">Tugas 2</th>
                <th scope="col">UTS</th>
                <th scope="col">UAS</th>
                <th scope="col">Sikap</th>
                <th scope="col">Hasil Akhir</th>
              </tr>
            </thead>
            <tbody>
                @isset($listNilai)
                    @foreach ($listNilai as $i)
                        <tr>
                          <th scope="row">1</th>
                          <td>{{$i->siswa->Nama_siswa}}</td>
                          <td>{{$i->Quiz1}}</td>
                          <td>{{$i->Quiz2}}</td>
                          <td>{{$i->Tugas1}}</td>
                          <td>{{$i->Tugas2}}</td>
                          <td>{{$i->UTS}}</td>
                          <td>{{$i->UAS}}</td>
                          <td>{{strtoupper($i->Sikap)}}</td>
                          <td>{{$i->Hasil_akhir}}</td>
                        </tr>
                    @endforeach

                @endisset
            </tbody>
          </table>
        </div>


    </div>
</div>


@endsection
