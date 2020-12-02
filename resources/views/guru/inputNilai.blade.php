@extends('guru.guruLayout')

@section('inputNilai')

<div class="widget-box">
    <!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Input Kelas</h5>
            </div>

            <div class="widget-content">
                <div class="control-group">
                    <label class="control-label">Input Nilai:</label>
                    <div class="">
                        {{-- Gak tau opoo iki ilang button e --}}
                        <input  type="file" name="fileToa"/> Import Nilai Format File: Excel
                    </div>
                    <form action="DownloadFormat" method="get">
                        Format Input Nilai Di Excel
                        <input type="submit" value="Download">
                    </form>
                </div>

            </div>


        </div>
    </div>
    <!--End-Chart-box-->
    <!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Filter Kelas yang Diajar</h5>
            </div>

            <div class="widget-content ">
                <form action="/getDaftarNilai" method="get">
                    <div class="control-group">
                        <label class="control-label">Kelas yang Diajar</label>
                        <div class="controls">
                        <select name="ajar" class="span11">
                            @foreach ($ajar as $i)
                                <option value="{{$i->Id_ajar_mengajar}}" > {{$i->kelas->Nama_kelas.' - Kelas '.$i->kelas->Tingkat_kelas.' - '.$i->mapel->Nama_mapel}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                        <input type="submit" value="Search">
                    </form>
            </div>
        </div>
    </div>
    <!--End-Chart-box-->
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
      <h5>Daftar Nilai</h5>
    </div>
    <div class="widget-content">
        <table class="table" >
            <thead >
              <tr>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Quiz 1</th>
                <th scope="col">Quiz 2</th>
                <th scope="col">Tugas 1</th>
                <th scope="col">Tugas 2</th>
                <th scope="col">UTS</th>
                <th scope="col">UAS</th>
                <th scope="col">Sikap</th>
                <th scope="col">Hasil Akhir</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @isset($listNilai)
                    @foreach ($listNilai as $i)
                        <tr>
                          <td class="text-center">{{$i->siswa->Nama_siswa}}</td>
                          <td class="text-center">{{$i->Quiz1}}</td>
                          <td class="text-center">{{$i->Quiz2}}</td>
                          <td class="text-center">{{$i->Tugas1}}</td>
                          <td class="text-center">{{$i->Tugas2}}</td>
                          <td class="text-center">{{$i->UTS}}</td>
                          <td class="text-center">{{$i->UAS}}</td>
                          <td class="text-center">{{strtoupper($i->Sikap)}}</td>
                          <td class="text-center">{{$i->Hasil_akhir}}</td>
                        <td class="text-center"><button class="btn btn-success"><a href=" /toEditNilai/{{$i->Id_riwayat_akademik}}">Edit</a></button></td>
                        </tr>
                    @endforeach

                @endisset
            </tbody>
          </table>
    </div>
  </div>

    <hr/>
</div>

@endsection
