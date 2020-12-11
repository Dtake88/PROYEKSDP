@extends('siswa.siswaLayout')

@section('lihatNilai')

<!--Chart-box-->

            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Table Nilai</h5>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Kelas</th>
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
                            {{-- @isset($nilaiSiswa) --}}
                                @foreach ($nilaiSiswa as $i)
                                    <tr>
                                        <td>{{$i->mapel->Nama_mapel}}</td>
                                        <td>{{$i->kelas->Nama_kelas}}</td>
                                        <td>{{$i->Quiz1}}</td>
                                        <td>{{$i->Quiz2}}</td>
                                        <td>{{$i->Tugas1}}</td>
                                        <td>{{$i->Tugas2}}</td>
                                        <td>{{$i->UTS}}</td>
                                        <td>{{$i->UAS}}</td>
                                        <td>{{$i->Sikap}}</td>
                                        <td>{{$i->Hasil_akhir}}</td>
                                    </tr>
                                @endforeach
                            {{-- @endisset --}}
                        </tbody>
                    </table>
                </div>
            </div>
            </div>

          </div>
<!--End-Chart-box-->
    <hr/>
</div>

@endsection
