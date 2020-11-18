@extends('adminlte.adminLayout')

@section('formSiswa')

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
      <h5>Table Siswa</h5>
    </div>


    <div class="widget-content nopadding">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tempat dan Tanggal Lahir</th>
            <th>Agama</th>
            <th>Nama Ibu</th>
            <th>Nama Ayah</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftarSiswa as $siswa)
                <tr>
                    <td>{{$siswa->NISN}}</td>
                    <td>{{$siswa->NIS}}</td>
                    <td>{{$siswa->Nama_siswa}}</td>
                    <td>{{$siswa->Tempat_lahir_siswa}} , {{$siswa->Tanggal_lahir_siswa}}</td>
                    <td>{{$siswa->Agama}}</td>
                    <td>{{$siswa->Nama_ibu}}</td>
                    <td>{{$siswa->Nama_ayah}}</td>
                    <td>{{$siswa->Alamat_siswa}}</td>
                    <td>{{$siswa->Jenis_kelamin}}</td>
                    <td>{{$siswa->Status_siswa}}</td>
                    <td>
                    <button class="btn btn-primary"><a href="updateSiswa/{{$siswa->NIS}}">Update</a></button>
                    <button class="btn btn-danger"><a href="deleteSiswa/{{$siswa->NIS}}">Delete</a></button>
                        {{-- <form action="/siswa/crud" method="post" class="form-horizontal">
                            @csrf
                            <button type="submit" class="btn btn-danger" name="Delete" value="{{$siswa->NIS}}">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
<!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Input Siswa</h5>
            </div>
            <div class="widget-content nopadding">
              <form action="/siswa/crud" method="post" class="form-horizontal">
                @csrf
                <div class="control-group">
                  <label class="control-label">NISN :</label>
                  <div class="controls">
                    <input type="text" class="span11" placeholder="NISN" name="nisn"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">NIS :</label>
                  <div class="controls">
                    <input type="text" class="span11" placeholder="NIS" name="nis"/>
                    {{-- @error('nis')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror --}}
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Nama Lengkap :</label>
                  <div class="controls">
                    <input type="text" class="span11" placeholder="Nama Lengkap" name="nama" />
                    @error('nama')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Kata Sandi :</label>
                  <div class="controls">
                    <input type="password"  class="span11" placeholder="Kata Sandi" name="pw" />
                    @error('pw')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Tempat Lahir :</label>
                  <div class="controls">
                    <input type="text"  class="span11" placeholder="Alamat" name="tmptLahir" />
                    @error('tmptLahir')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Tanggal Lahir :</label>
                  <div class="controls">
                      <input type="date" value="12-02-2012"  data-date-format="dd-mm-yyyy" class="span11" name="tglLahir">
                      @error('tglLahir')
                        <br><span style="color: red;">{{ $message }}</span>
                      @enderror
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nama Ibu :</label>
                    <div class="controls">
                        <input type="text"  class="span11" placeholder="Nama Ibu" name="NameMom" />
                        @error('NameMom')
                            <br><span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nama Ayah :</label>
                    <div class="controls">
                        <input type="text"  class="span11" placeholder="Nama Ayah" name="NameDad" />
                        @error('NameDad')
                            <br><span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                  <label for="normal" class="control-label">Alamat :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="alamat" placeholder="alamat">
                    @error('alamat')
                            <br><span style="color: red;">{{ $message }}</span>
                        @enderror
                </div>
                <div class="control-group">
                  <label class="control-label">Agama :</label>
                  <div class="controls">
                    <input type="text"  class="span11" placeholder="Agama" name="agama" />
                    @error('agama')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Jenis Kelamin</label>
                    <div class="controls">
                      <select class="span11" name="jk">
                        <option value="Pria" selected>Pria</option>
                        <option value="Wanita">Wanita</option>
                      </select>
                      @error('jk')
                            <br><span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Status Siswa</label>
                    <div class="controls">
                      <select class="span11" name="status">
                        <option value="1" selected>Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      </select>
                      @error('status')
                            <br><span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                  </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-success" name="Insert">Insert</button>
                  <button type="submit" class="btn btn-success" name="Update">Update</button>
                </div>
              </form>
              {{-- form untuk admin input siswa dengan excel --}}
                <div class="control-group">
                    <label class="control-label">File Siswa:</label>
                    <div class="controls">
                    <input type="file" name="fileToa"/> Import Siswa Format File: Excel
                    </div>
                </div>
                    <div class="controls">
                        <form action="GetFormatSiswa" method="get">
                            Download Format Siswa:
                            <input type="submit" value="Format Input Siswa">
                        </form>
                    </div>


            </div>
        </div>
    </div>
</div>
<!--End-Chart-box-->

@endsection
