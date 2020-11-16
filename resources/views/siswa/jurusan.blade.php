@extends('siswa.siswaLayout')

@section('jurusan')

<!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
              <h5>Pilih Jurusan</h5>
            </div>
            <div class="control-group">
                <label class="control-label">Jurusan Yang Dipilih</label>
                <div class="controls">
                <select class="span11">
                        <option >IPA</option>
                        <option >IPS</option>
                        <option >BAHASA</option>
                </select>
            </div>
            Rekomendasi : IPA
            </div>
            <form action="DownloadFormat" method="get">
                <input type="submit" value="Submit">
            </form>

          </div>
        </div>
    </div>
<!--End-Chart-box-->
    <hr/>
</div>

@endsection
