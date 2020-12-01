@extends('adminlte.adminLayout')

@section('editSiswa')
    <div class="container" style="width: 800px">
        <div class="d-flex justify-content-center">
            <h1>Update Kelas</h1>
        </div>
        @php
            $kelas = Session::get("kelas");
            // dd($siswa);
        @endphp
        <form action="{{url('/updateKelas')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="control-group">
                        <label class="control-label">Id Kelas :</label>
                        <div class="controls">
                        <input type="text" class="span11" value="{{$kelas->Id_kelas}}" placeholder="Nama Lengkap" name="Id_kelas" />
                          @error('Id_kelas')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                    <div class="control-group">
                        <label class="control-label">Id periode :</label>
                        <div class="controls">
                        <input type="text" class="span11" value="{{$kelas->Id_periode}}" placeholder="Nama Lengkap" name="Id_periode" />
                          @error('Id_periode')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">NIG guru :</label>
                        <div class="controls">
                          <input type="text" class="span11" value="{{$kelas->NIG}}" placeholder="Nama Lengkap" name="NIG" />
                          @error('NIG')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                    <div class="control-group">
                      <label class="control-label">Nama Kelas :</label>
                      <div class="controls">
                        <input type="text" class="span11" placeholder="Nama Lengkap" name="Nama_kelas" />
                        @error('Nama_kelas')
                            <br><span style="color: red;">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Tingkat Kelas :</label>
                      <div class="controls">
                        <input type="text"  class="span11" placeholder="Tingkat Kelas" name="Tingkat_kelas"  />
                        @error('Tingkat_kelas')
                            <br><span style="color: red;">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Id jurusan :</label>
                        <div class="controls">
                          <input type="text" class="span11" value="{{$kelas->Id_jurusan}}" placeholder="Nama Lengkap" name="Id_jurusan" />
                          @error('Id_jurusan')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                </div>
            </div>

            <button class="btn btn-primary" > <a class="text-white" href="/kelas">Cancel</a></button>
            <input class="btn btn-success" type="submit" value="Update">
        </form>

    </div>
@endsection
