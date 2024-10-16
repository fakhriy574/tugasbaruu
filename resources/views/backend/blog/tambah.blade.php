@extends('backend.layouts.master')
@section('content')
    <div class="card show mb-4">
        <div class="card-body">
            <h2>Tambah Blog</h2>
            <form class="user" action="{{route('backend.blog.aksi_tambah')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control form-control-user"
                    aria-describedby="emailHelp" placeholder="Masukan Judul">
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="masukan deskripsi" id="" cols="30" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="file" class="form-control form-control-user"
                    placeholder="Masukan file">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-user">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
