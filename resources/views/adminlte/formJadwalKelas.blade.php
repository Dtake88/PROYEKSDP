<div class="row-fluid">
    <div class="widget-box">
        <h1>Jadwal Kelas {{$namaKelas->Nama_kelas}}</h1>
        <h1>Wali Kelas {{$namaKelas->guru->Nama_guru}}</h1>
        <br>
        <table class="table" style="border: 1px solid black;border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid black;border-collapse: collapse;">Hari</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Mata Pelajaran</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Guru</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Jam Dimulai</th>
                    <th style="border: 1px solid black;border-collapse: collapse;">Jam Berakhir</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($jadwalKelas as $i)
                            <tr>
                                <td style="text-align: center;border: 1px solid black;color:black;border-collapse: collapse;">{{$i->Hari}}</td>
                                <td style="text-align: center;border: 1px solid black;color:black;border-collapse: collapse;">{{$i->mapel->Nama_mapel}}</td>
                                <td style="text-align: center;border: 1px solid black;color:black;border-collapse: collapse;">{{$i->guru->Nama_guru}}</td>
                                <td style="text-align: center;border: 1px solid black;color:black;border-collapse: collapse;">{{$i->Jam_dimulai}}</td>
                                <td style="text-align: center;border: 1px solid black;color:black;border-collapse: collapse;">{{$i->Jam_berakhir}}</td>
                            </tr>
                    @endforeach
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
<!--End-Chart-box-->
</div>
