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
        <h1 style="margin-left : 40%;">Absensi Kelas {{$kelasAbsensi->Nama_kelas}}</h1>
        <label style="font-size: 12pt;font-weight: bold;">Semester:{{$kelasAbsensi->periode->Semester}}</label><br>
        <label style="font-size: 12pt;font-weight: bold;">Mata Pelajaran : ...</label><br>
        <label style="font-size: 12pt;font-weight: bold;">Materi : ...</label><br><br>
        <table>
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Minggu 1</th>
                    <th>Minggu 2</th>
                    <th>Minggu 3</th>
                    <th>Minggu 4</th>
                    <th>Minggu 5</th>
                    <th>Minggu 6</th>
                    <th>Minggu 7</th>
                    <th>Minggu 8</th>
                    <th>Minggu 9</th>
                    <th>Minggu 10</th>
                    <th>Minggu 11</th>
                    <th>Minggu 12</th>
                    <th>Minggu 13</th>
                    <th>Minggu 14</th>
                    <th>Minggu 15</th>
                    <th>Minggu 16</th>
                </tr>
            </thead>
            <tbody>
                @isset($siswaKelas)
                    @foreach ($siswaKelas as $i)
                        <tr>
                            <td>{{$i->NISN}}</td>
                            <td>{{$i->Nama_siswa}}</td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            <td> ... </td>
                            {{-- 16  --}}
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
