@extends('home')

@section('body')

<!--Header-part-->
<div id="header">
  <h1><a href="/dashboard">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
{{-- di header --}}
{{-- Look Profile n Edit File --}}
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome Admin</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i>Profile Admin</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Edit File Admin</a></li>
      </ul>
    </li>
  </ul>
</div>

<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="/dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="/pengumuman"><i class="icon icon-bullhorn"></i>Pengumuman</a></li>
    <li> <a href="/siswa"><i class="icon icon-group"></i> <span>Siswa</span></a></li>
    <li> <a href="/guru"><i class="icon icon-user"></i> <span>Guru</span></a></li>
    <li> <a href="/PeriodeAkademik"><i class="icon icon-user"></i> <span>Periode Akademik</span></a></li>
    <li> <a href="/kelas"><i class="icon icon-book"></i> <span>Kelas</span></a></li>
    <li> <a href="/MataPelajaran"><i class="icon icon-beaker"></i> <span>Mata Pelajaran</span></a></li>
    <li> <a href="/Jadwal"><i class="icon icon-beaker"></i> <span>Jadwal</span></a></li>
    <li><a href="/"><i class="icon icon-signout"></i> <span>Log Out</span></a></li>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Welcome Admin</a></div>
  </div>
<!--End-breadcrumbs-->
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
                        <form action="/siswa/crud" method="post" class="form-horizontal">
                            @csrf
                            <button type="submit" class="btn btn-danger" name="Delete" value="{{$siswa->NIS}}">Delete</button>
                        </form>
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
<<<<<<< HEAD
                  <label class="control-label">NIS :</label>
                  <div class="controls">
                    <input type="text" class="span11" placeholder="NIS" name="nis"/>
                    @error('nis')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="control-group">
=======
>>>>>>> 9f215a5a80b71437fca20322a0cbd78cffcaa709
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

            </div>
        </div>
    </div>
</div>
<!--End-Chart-box-->

    <hr/>
</div>


<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-colorpicker.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.toggle.buttons.js"></script>
<script src="js/masked.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.form_common.js"></script>
<script src="js/wysihtml5-0.3.0.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/bootstrap-wysihtml5.js"></script>

{{--  --}}
@endsection
