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
        <h1 style="margin-left : 40%;">Daftar Siswa Aktif</h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                @isset($DBsiswa)
                    @foreach ($DBsiswa as $i)
                            <tr>
                                <td>{{$i->NISN}}</td>
                                <td>{{$i->NIS}}</td>
                                <td>{{$i->Nama_siswa}}</td>
                                <td>{{$i->jurusan->Nama_jurusan}}</td>
                                <td>{{$i->kelas->Nama_kelas}}</td>
                            </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
<!--End-Chart-box-->
</div>
