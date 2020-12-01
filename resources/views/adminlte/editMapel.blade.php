@extends('adminlte.adminLayout')

@section('editSiswa')
    <div class="container" style="width: 800px">
        <div class="d-flex justify-content-center">
            <h1>Update Mata Pelajaran</h1>
        </div>
        @php
            $mapel = Session::get("mapel");
            // dd($siswa);
        @endphp
        <form action="{{url('/updateMapel')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Id mapel</label>
                        <input name="Id_mapel" value="{{$mapel->Id_mapel}}" readonly type="text" class="form-control" aria-describedby="" placeholder="">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="">Nama Mapel</label>
                        <input name="Nama_mapel" value="{{$mapel->Nama_mapel}}" type="text" class="form-control" aria-describedby="" placeholder="Enter Nama">
                    </div>
                    <div class="form-group">
                        <label for="">KKM</label>
                        <input value="{{$mapel->KKM}}" name="KKM" type="text" class="form-control" aria-describedby="" placeholder="Enter KKM">
                    </div>
                    <div class="form-group">
                        <label for="">Tingkat</label>
                        <select class="form-control" name="Tingkat">
                            <option value="1" selected>Kelas 10</option>
                            <option value="2">Kelas 11</option>
                            <option value="3">Kelas 12</option>
                        </select>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" > <a class="text-white" href="/MataPelajaran">Cancel</a></button>
            <input class="btn btn-success" type="submit" value="Update">
        </form>

    </div>
@endsection
