@extends('layout.layouts')
@section('title','Tambah surat ')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Tambah data dashboard
                </span>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{url('simpan-surat')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">SIMPAN</button>
                        </div>
                        <p>
                            <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            
                            
                            <div class="form-group">
                                <label>Tanggal_surat</label>
                                <input type="date" class="form-control" name="tanggal_surat" />
                            </div>
                            <div class="form-group">
                                <label>Ringkasan</label>
                                <input type="text" name="ringkasan" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>file</label>
                                <input type="file" class="form-control" name="file" />
                                
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection