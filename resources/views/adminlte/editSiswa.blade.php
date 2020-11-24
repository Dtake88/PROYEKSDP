@extends('adminlte.adminLayout')

@section('editSiswa')
    <div class="container" style="width: 800px">
        <div class="d-flex justify-content-center">
            <h1>Update Siswa</h1>
        </div>
        @php
            $siswa = Session::get("siswa");
            // dd($siswa);
        @endphp
        <form action="{{url('/updateSiswa')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">NIS</label>
                        <input name="NIS" value="{{$siswa->NIS}}" readonly type="text" class="form-control" aria-describedby="" placeholder="">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="">NISN</label>
                        <input name="NISN" value="{{$siswa->NISN}}" type="text" class="form-control" aria-describedby="" placeholder="Enter NISN">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input value="{{$siswa->Nama_siswa}}" name="nama" type="text" class="form-control" aria-describedby="" placeholder="Enter Nama Siswa">
                    </div>
                    <div class="form-group">
                        <label for="">Password Siswa</label>
                        <input value="{{$siswa->Password_siswa}}" name="password" type="text" class="form-control" aria-describedby="" placeholder="Enter Password Siswa">
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Tanggal Lahir</label>
                        <input value="{{$siswa->Tempat_lahir_siswa}}" name="tempatLahir" type="text" class="form-control" aria-describedby="" placeholder="Enter Tempat tanggal lahir">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir Siswa</label>
                        <input value="{{$siswa->Tanggal_lahir_siswa}}" name="tanggalLahir" type="date" class="form-control" aria-describedby="" placeholder="Enter  Tanggal lahir">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama Ibu</label>
                        <input value="{{$siswa->Nama_ibu}}" name="namaIbu" type="text" class="form-control" aria-describedby="" placeholder="Enter Nama Ibu">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ayah</label>
                        <input value="{{$siswa->Nama_ayah}}" name="namaAyah" type="text" class="form-control" aria-describedby="" placeholder="Enter Nama Ayah">
                    </div>
                    <div class="form-group">
                        <label for="">Agama</label>
                        <select class="form-control" name="agama">
                            <option value="Islam" selected>Islam</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Katholik">Katolik</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select class="form-control" name="jenisKelamin">
                            <option value="pria" selected>Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Siswa</label>
                        <input value="{{$siswa->Alamat_siswa}}" name="alamat" type="text" class="form-control" aria-describedby="" placeholder="Enter Alamat">
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" > <a class="text-white" href="/siswa">Cancel</a></button>
            <input class="btn btn-success" type="submit" value="Update">
        </form>

    </div>
@endsection
