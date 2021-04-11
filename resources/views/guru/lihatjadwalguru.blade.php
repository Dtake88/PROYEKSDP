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
        <h1  style="margin-left : 40%;">Jadwal Guru {{$namaguru->Nama_guru}}</h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Jam Dimulai</th>
                    <th>Jam Berakhir</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($jadwalguru as $i)
                            <tr>
                                <td>{{$i->Hari}}</td>
                                <td>{{$i->mapel->Nama_mapel}}</td>
                                <td>{{$i->kelas->Nama_kelas}}</td>
                                <td>{{$i->Jam_dimulai}}</td>
                                <td>{{$i->Jam_berakhir}}</td>
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
