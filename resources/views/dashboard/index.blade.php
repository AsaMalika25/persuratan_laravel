@extends('layout.layouts')
@section('title','Daftar Surat')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Data Surat Perusahaan
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="/tambah-surat">
                            <btn class="btn btn-success">Tambah Surat</btn>
                        </a>

                    </div>
                    <p>
                        <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>Tanggal surat</th>
                                    <th>Ringkasan</th>
                                    <th>file</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($data_surat as $item)
                                <tr>
                                    <td>{{date('d-m-Y', strtotime($item->tanggal_surat))}}</td>
                                    <td>{{$item->ringkasan}}</td>
                                    <td><img src="{{asset('image/'. $item->file)}}" alt="gambar" style="width:50px; height:50px;"></td>
                                    <td>
                                        <a href="cabang/edit/"><btn class="btn btn-primary">EDIT</btn></a>
                                        <btn class="btn btn-danger btnHapus" idCabang="">HAPUS</btn>

                                    </td>
                                </tr>
                              @endforeach
                               
                                
                            </tbody>
                        </table>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')


@endsection