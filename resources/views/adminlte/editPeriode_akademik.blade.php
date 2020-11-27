@extends('adminlte.adminLayout')

@section('editSiswa')
    <div class="container" style="width: 800px">
        <div class="d-flex justify-content-center">
            <h1>Update Periode Akademik</h1>
        </div>
        @php
            $periode_akademik = Session::get("periode_akademik");
            // dd($siswa);
        @endphp
        <form action="{{url('/updatePeriode')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Id_periode</label>
                        <input name="Id_periode" value="{{$periode_akademik->Id_periode}}" readonly type="text" class="form-control" aria-describedby="" placeholder="">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="">Tahun ajaran</label>
                        <input name="Tahun_ajaran" value="{{$periode_akademik->Tahun_ajaran}}" type="text" class="form-control" aria-describedby="" placeholder="Enter Tahun Ajaran">
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <input value="{{$periode_akademik->Semester}}" name="Semester" type="text" class="form-control" aria-describedby="" placeholder="Enter Semester">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control" name="Status">
                            <option value="1" selected>Aktif</option>
                            <option value="0">Non Aktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" > <a class="text-white" href="/PeriodeAkademik">Cancel</a></button>
            <input class="btn btn-success" type="submit" value="Update">
        </form>

    </div>
@endsection
