@extends('guru.guruLayout')

@section('inputNilai')
<div class="row-fluid" style="padding:30px">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i     class="icon-align-justify"></i> </span>
        <h5>Input Nilai</h5>
        </div>
        <div class="control-group">
            <label class="control-label">Input Nilai:</label>
            <div class="controls">
            <input type="file" name="fileToa"/> Import Nilai Format File: Excel
            </div>
        </div>
        <form action="DownloadFormat" method="get">
        Format Input Nilai Di Excel
        <input type="submit" value="Download">
        </form>
    </div>
</div>
<div class="row-fluid" style="padding:30px">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Filter</h5>
        </div>
        <div class="control-group">
            <label class="control-label">Mata Pelajaran</label>
            <div class="controls">
            <select class="span11">
                    <option >Sejarah</option>
                    <option >Matematika</option>
            </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Kelas</label>
            <div class="controls">
            <select class="span11">
                    <option >Umum1</option>
                    <option >IPA1</option>
            </select>
            </div>
        </div>
        <form action="DownloadFormat" method="get">
            <input type="submit" value="Search">
            </form>
    </div>
</div>
<div class="row-fluid" style="padding:30px">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Table Nilai</h5>
        </div>

    </div>
</div>


@endsection
