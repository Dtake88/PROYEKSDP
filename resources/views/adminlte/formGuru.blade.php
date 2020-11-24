@extends('adminlte.adminLayout')

@section('formGuru')

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
      <h5>Table Siswa</h5>
    </div>
    <div class="widget-content nopadding">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NIG</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftarGuru as $guru)
                <tr>
                    <td>{{$guru->NIG}}</td>
                    <td>{{$guru->Nama_guru}}</td>
                    <td>{{$guru->No_hp_guru}}</td>
                    <td>{{$guru->Alamat_guru}}</td>
                    <td>{{$guru->Status_guru}}</td>
                    <td>
                        {{-- <form action="/guru/crud" method="post" class="form-horizontal">
                            @csrf
                            <button type="submit" class="btn btn-danger" name="Delete" value="{{$guru->NIG}}">Delete</button>
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
                <h5>Input Guru</h5>
                </div>

                <div class="widget-content nopadding">
                <form action="/guru/crud" method="POST" class="form-horizontal">
                    @csrf
                    <div class="control-group">
                    <label class="control-label">Nama Lengkap Guru:</label>
                    <div class="controls">
                        <input type="text" class="span11" placeholder="Nama Lengkap Guru" name="nama" value="{{old("nama")}}"/>
                        @error('nama')
                            <br><span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">Kata Sandi :</label>
                    <div class="controls">
                        <input type="password"  class="span11" placeholder="Kata Sandi" name="pw" value="{{old("pw")}}"/>
                        @error('pw')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">Alamat :</label>
                    <div class="controls">
                        <input type="text"  class="span11" placeholder="Alamat" name="alamat" value="{{old("alamat")}}"/>
                        @error('alamat')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
                    <div class="control-group">
                        <label for="normal" class="control-label">Nomor Telepon</label>
                        <div class="controls">
                        <input type="text" class="span11" name="notelp" placeholder="No Telpon"value="{{old("notelp")}}">
                        @error('notelp')
                        <br><span style="color: red;">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="control-group">
                        <label class="control-label">Status Guru</label>
                        <div class="controls">
                        <select class="span11" name="status">
                            <option value="1" selected>Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>

                        </div>
                    </div>
                    <div class="form-actions">
                    <button type="submit" class="btn btn-success" name="Insert">Insert</button>
                    <button type="submit" class="btn btn-success" name="Update">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!--End-Chart-box-->


{{--  --}}
@endsection
