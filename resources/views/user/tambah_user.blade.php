@extends('layout.layouts')
@section('title','user ')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Tambah data User
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
                <form method="POST" action="{{url('simpan-user')}}" enctype="multipart/form-data">
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
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" class="form-control" name="role" />
                                
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection