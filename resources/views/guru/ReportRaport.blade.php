<style>

    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border-bottom: 1px solid #ddd;
        text-align: center;

    }
    tr:nth-child(even) {background-color: #f2f2f2;}
    th {
        background-color: #4CAF50;
        color: white;
    }
</style>
<div class="row-fluid">
    <div class="widget-box">
        <h1 style="margin-left : 43%;">Raport Siswa</h1>
        @isset($siswaRaport)
            <label  style="font-size: 12pt;font-weight: bold;">Nama:{{$siswaRaport->Nama_siswa}}</label><br>
        @endisset
        @isset($kelasRaport)
            <label  style="font-size: 12pt;font-weight: bold;">Kelas:{{$kelasRaport->Nama_kelas}}</label><br>
            <label  style="font-size: 12pt;font-weight: bold;">Semester:{{$kelasRaport->periode->Semester}}</label><br><br>
        @endisset
        <table>
            <thead>
                <tr>
                    <th>Mata Pelajaran</th>
                    <th>KKM</th>
                    <th>Quiz 1</th>
                    <th>Quiz 2</th>
                    <th>Tugas 1</th>
                    <th>Tugas 2</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Sikap</th>
                    <th>Hasil Akhir</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @isset($riwayatRaport)
                    @foreach ($riwayatRaport as $i)
                        @if ($i->Hasil_akhir < $i->mapel->KKM)
                            <tr>
                                <td>{{$i->mapel->Nama_mapel}}</td>
                                <td>{{$i->mapel->KKM}}</td>
                                <td>{{$i->Quiz1}}</td>
                                <td>{{$i->Quiz2}}</td>
                                <td>{{$i->Tugas1}}</td>
                                <td>{{$i->Tugas2}}</td>
                                <td>{{$i->UTS}}</td>
                                <td>{{$i->UAS}}</td>
                                <td>{{$i->Sikap}}</td>
                                <td>{{$i->Hasil_akhir}}</td>
                                <td>Tidak Lulus</td>
                            </tr>
                        @endif
                        @if ($i->Hasil_akhir > $i->mapel->KKM)
                            <tr>
                                <td>{{$i->mapel->Nama_mapel}}</td>
                                <td>{{$i->mapel->KKM}}</td>
                                <td>{{$i->Quiz1}}</td>
                                <td>{{$i->Quiz2}}</td>
                                <td>{{$i->Tugas1}}</td>
                                <td>{{$i->Tugas2}}</td>
                                <td>{{$i->UTS}}</td>
                                <td>{{$i->UAS}}</td>
                                <td>{{$i->Sikap}}</td>
                                <td>{{$i->Hasil_akhir}}</td>
                                <td>Lulus</td>
                            </tr>
                        @endif
                    @endforeach
                @endisset
            </tbody>
        </table>
        <h6>Keterangan: <br>
        - Nilai Kenaikan Di hitung saat Semester 2 jika Nilai Merah Melebihi dari 3 Dianggap Tidak Naik Kelas. <br>
        - Hasil Akhir = (((Tugas 1 + Tugas 2 + Quiz 1 + Quiz 2)/ 4)*0.3) + (UTS * 0.3) + (UAS * 0.4)</h6>
        </div>
        </div>
    </div>
</div>
<!--End-Chart-box-->
</div>
