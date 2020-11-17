@extends('siswa.siswaLayout')

@section('lihatNilai')

<!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
              <h5>Nilai</h5>
            </div>
            <div class="control-group">
                <label class="control-label">Kelas</label>
                <div class="controls">
                <select class="span11">
                        <option >10</option>
                </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Semester</label>
                <div class="controls">
                <select class="span11">
                        <option >1</option>
                        <option >2</option>
                </select>
                </div>
            </div>
            <div class="row-fluid">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Table Nilai</h5>
                    </div>

                </div>
            </div>
            </div>

          </div>
        </div>
    </div>
<!--End-Chart-box-->
    <hr/>
</div>

@endsection
