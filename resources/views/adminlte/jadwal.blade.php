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
<div class="widget-content nopadding">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>ID Kelas</th>
          <th>ID Mapel</th>
          <th>NIG</th>
          <th>Jam Mulai</th>
          <th>Jam Berakhir</th>
          <th>Hari</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($Jadwal as $i)
              <tr>
                  <td>{{$i->Id_ajar_mengajar}}</td>
                  <td>{{$i->Id_kelas}}</td>
                  <td>{{$i->Id_mapel}}</td>
                  <td>{{$i->NIG}}</td>
                  <td>{{$i->Jam_dimulai}}</td>
                  <td>{{$i->Jam_berakhir}}</td>
                  <td>{{$i->Hari}}</td>
                  <td>{{$i->Status_jadwal}}</td>
              </tr>
          @endforeach
      </tbody>
    </table>
  </div>
<!--Chart-box-->
<div class="row-fluid">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Input Jadwal</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Kelas</label>
                <div class="controls">
                <select class="span11">
                    @foreach ($kelas as $i)
                        <option value="{{$i->Id_kelas}}">{{$i->Id_kelas}} - {{$i->Nama_kelas}} - {{$i->Id_jurusan}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Mata Pelajaran</label>
                <div class="controls">
                <select class="span11">
                    @foreach ($Mapel as $i)
                        <option value="{{$i->Id_mapel}}">{{$i->Id_mapel}} - {{$i->Nama_mapel}} - {{$i->Tingkat}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Guru</label>
                <div class="controls">
                <select class="span11">
                    @foreach ($Guru as $i)
                        <option value="{{$i->NIG}}">{{$i->NIG}} - {{$i->Nama_guru}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Hari</label>
                <div class="controls">
                <select class="span11">
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
                  <input type="time" name="jamMulai" min="08:00" max="14:00" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Jam Berakhir :</label>
                <div class="controls">
                  <input type="time" name="jamBerakhir" min="08:00" max="14:00" required>
                </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
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
