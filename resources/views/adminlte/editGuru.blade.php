@extends('adminlte.adminLayout')

@section('editGuru')
    <div class="container" style="width: 800px">
        <div class="d-flex justify-content-center">
            <h1>Update Guru</h1>
        </div>
        @php
            $guru = Session::get("guru");
        @endphp
        <form action="{{url('/updateGuru')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">NIG</label>
                        <input name="NIG" value="{{$guru->NIG}}" readonly type="text" class="form-control" aria-describedby="" placeholder="">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="">Nama Guru</label>
                        <input value="{{$guru->Nama_guru}}" name="nama" type="text" class="form-control" aria-describedby="" placeholder="Enter Nama Guru">
                    </div>
                    <div class="form-group">
                        <label for="">Password Guru</label>
                        <input value="" name="password" type="text" class="form-control" aria-describedby="" placeholder="Enter Password Guru">
                    </div>
                    <div class="form-group">
                        <label for="">No hp guru</label>
                        <input value="{{$guru->No_hp_guru}}" name="notelp" type="text" class="form-control" aria-describedby="" placeholder="Enter No telp">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Guru</label>
                        <input value="{{$guru->Alamat_guru}}" name="alamat" type="text" class="form-control" aria-describedby="" placeholder="Enter Alamat">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select class="form-control" name="status">
                            <option value="0" selected>Umum</option>
                            <option value="1">Wali kelas</option>
                        </select>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" > <a class="text-white" href="/guru">Cancel</a></button>
            <input class="btn btn-success" type="submit" value="Update">
        </form>

    </div>
@endsection
