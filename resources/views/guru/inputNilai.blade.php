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
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome Guru</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i>Profile Guru</a></li>
      </ul>
    </li>
  </ul>
</div>

<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="/dashboardGuru"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="/inputNilai"><i class="icon icon-bullhorn"></i>Input Nilai</a></li>
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

<!--Chart-box-->
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Input Nilai</h5>
                </div>
                <div class="control-group">
                    <label class="control-label">Input Nilai:</label>
                    <div class="controls">
                    <input type="file" name="fileToa"/> Import Nilai Format File: Excel
                    </div>
                </div>
                <div class="widget-content nopadding">
                <form action="#" method="get" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Mata Pelajaran</label>
                        <div class="controls">
                        <select class="span11">
                            <option>Sejarah</option>
                            <option>Ekonomi</option>
                        </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama Murid</label>
                        <div class="controls">
                        <select class="span11">
                            <option>Joko</option>
                            <option>Adi</option>
                        </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nilai Quiz 1 :</label>
                        <div class="controls">
                          <input type="text" class="span11" placeholder="Quiz 1" />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Nilai Quiz 2 :</label>
                        <div class="controls">
                          <input type="text" class="span11" placeholder="Quiz 2" />
                        </div>
                      </div>
                    <div class="control-group">
                        <label class="control-label">Nilai Tugas 1 :</label>
                        <div class="controls">
                          <input type="text" class="span11" placeholder="Tugas 1" />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Nilai Tugas 2 :</label>
                        <div class="controls">
                          <input type="text" class="span11" placeholder="Tugas 2" />
                        </div>
                      </div>
                    <div class="control-group">
                        <label class="control-label">Nilai UTS :</label>
                        <div class="controls">
                          <input type="text" class="span11" placeholder="UTS" />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Nilai UAS :</label>
                        <div class="controls">
                          <input type="text" class="span11" placeholder="UAS" />
                        </div>
                      </div>
                    <div class="control-group">
                        <label class="control-label">Nilai Sikap :</label>
                        <div class="controls">
                          <input type="text" class="span11" placeholder="Sikap" />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Nilai Akhir :</label>
                        <div class="controls">
                          <input type="text" class="span11" placeholder="Hasil Akhir" />
                        </div>
                      </div>
                    <div class="form-actions">
                    <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
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

<script src="js/excanvas.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flot.min.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.dashboard.js"></script>
<script src="js/jquery.gritter.min.js"></script>
<script src="js/matrix.interface.js"></script>
<script src="js/matrix.chat.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/matrix.form_validation.js"></script>
<script src="js/jquery.wizard.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/matrix.popover.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.tables.js"></script>
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
