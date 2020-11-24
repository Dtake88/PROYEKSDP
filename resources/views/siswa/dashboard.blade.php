@extends('siswa.siswaLayout')

@section('dashboardSiswa')

<!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
              <h5>Pengumuman</h5>
            </div>
            @isset($pengumuman)
                @foreach ($pengumuman as $item)
                <div class="widget-content nopadding updates collapse in" id="collapseG3">
                  <div class="new-update clearfix"><i class="icon-ok-sign"></i>
                  <div class="update-done"><a title="" href="#"><strong>{{$item->Judul_pengumuman}}
                  </strong></a> <span>{{$item->Tanggal_pengumuman}}</span> </div>
                  </div>
                </div>
                @endforeach
            @endisset
        </div>
    </div>
<!--End-Chart-box-->
    <hr/>
</div>
<!--end-main-container-part-->

@endsection
