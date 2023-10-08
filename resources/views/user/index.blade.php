@extends('layout.layouts')
@section('title','Daftar Akun')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Data Akun Perusahaan
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <a href="/tambah-user">
                            <btn class="btn btn-success">Tambah Akun</btn>
                        </a>

                    </div>
                    <p>
                        <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>username</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($data_user as $item)
                                <tr>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->password}}</td>
                                    <td>{{$item->role}}</td>
                                    <td>
                                        <a href="cabang/edit/"><btn class="btn btn-primary">EDIT</btn></a>

                                        <form onsubmit="return confirm('igin menghapus data ini?')" class='d-inline'
                                        action="{{ url('hapus-user/'.$item->id_user) }}" method="post">
                                        @csrf
                                        <button type="submit" name="submit" class="btn btn-danger">Del</button>
                                    </form>
                                        

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
@section('footer')


@endsection



@endsection

