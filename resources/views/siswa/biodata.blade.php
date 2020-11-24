@extends('siswa.siswaLayout')

@section('biodata')

<!--Chart-box-->
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
              <h5>Biodata</h5>
            </div>
            <h5>NIS: 113000</h5><br>
            <h5>NISN: 434533200</h5><br>
            <h5>Nama: Hap</h5><br>
            <h5>Tempat,Tanggal Lahir: Olympus,07-11-2000</h2><br>
            <h5>Nama Ibu: Rhea</h5><br>
            <h5>Nama Ayah: Zeus</h5><br>
            <h5>Agama: Jasin</h5><br>
            <h5>Alamat: Jl. land of god no.99</h5><br>
            <form action="EditBiodata" method="get">
                <input type="submit" value="Edit">
            </form>
            </div>

          </div>
        </div>
    </div>
<!--End-Chart-box-->
    <hr/>
</div>
@if (Session::has('message'))
        <script>alert(`{{ Session::get('message') }}`)</script>
    @endif
@endsection
