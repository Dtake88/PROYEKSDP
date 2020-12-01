@extends('adminlte.adminLayout')

@section('editSiswa')
    <div class="container" style="width: 800px">
        <div class="d-flex justify-content-center">
            <h1>Update Periode Akademik</h1>
        </div>
        @php
            $ajar_mengajar = Session::get("ajar_mengajar");
            // dd($siswa);
        @endphp
        <form action="{{url('/updateJadwal')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="control-group">
                        <label class="control-label">Id Jadwal :</label>
                        <div class="controls">
                        <input type="text" class="span11" value="{{$ajar_mengajar->Id_ajar_mengajar}}" placeholder="Nama Lengkap" name="Id_ajar_mengajar" />
                          @error('Id_ajar_mengajar')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Id Kelas :</label>
                        <div class="controls">
                        <input type="text" class="span11" value="{{$ajar_mengajar->Id_kelas}}" placeholder="Nama Lengkap" name="Id_kelas" />
                          @error('Id_kelas')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Id Mapel :</label>
                        <div class="controls">
                        <input type="text" class="span11" value="{{$ajar_mengajar->Id_mapel}}" placeholder="Nama Lengkap" name="Id_mapel" />
                          @error('Id_mapel')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">NIG :</label>
                        <div class="controls">
                        <input type="text" class="span11" value="{{$ajar_mengajar->NIG}}" placeholder="Nama Lengkap" name="NIG" />
                          @error('NIG')
                              <br><span style="color: red;">{{ $message }}</span>
                          @enderror
                          </div>
                      </div>
                    <div class="control-group">
                        <label class="control-label">Hari</label>
                        <div class="controls">
                        <select class="span11" name="Hari">
                                <option value="senin">senin</option>
                                <option value="selasa">selasa</option>
                                <option value="rabu">rabu</option>
                                <option value="kamis">kamis</option>
                                <option value="jumat">jumat</option>
                        </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jam Mulai :</label>
                        <div class="controls">
                          <input type="time" value="{{$ajar_mengajar->Jam_dimulai}}" name="Jam_dimulai">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jam Berakhir :</label>
                        <div class="controls">
                          <input type="time" value="{{$ajar_mengajar->Jam_berakhir}}" name="Jam_berakhir" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jam Belajar :</label>
                        <div class="controls">
                          <input type="time" value="{{$ajar_mengajar->Jam_belajar}}" name="Jam_belajar" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Status: </label>
                        <div class="controls">
                        <select class="span11" name="Status_jadwal">
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
                        </select>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" > <a class="text-white" href="/PeriodeAkademik">Cancel</a></button>
            <input class="btn btn-success" type="submit" value="Update">
        </form>

    </div>
@endsection
