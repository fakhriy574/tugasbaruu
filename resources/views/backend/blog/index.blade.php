@extends('backend.layouts.master')
@section('content')
     <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="container">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Blog</h6>
                            </div>
                            <div class="card-body">
                                <a href="link-to-add-blog.html" class="btn btn-primary mb-2">Tambah Blog</a>
                                <div class="table-responsive">
                                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Judul</th>
                                                <th>Deksripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ManggilBlog as $item)

                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->slug}}</td>
                                                <td>{{$item->description}}</td>
                                                <td><img src="{{asset($item->file)}}"
                                                    width="200" alt="images"
                                                    ></td>
                                               
                                                <td>
                                                    <a href="link-to-edit-blog.html" class="btn btn-warning">edit</a>
                                                    <form action="link-to-delete-blog" method="post" class="d-inline">
                                                        <input type="hidden" name="_token" value="csrf_token_here">
                                                        <button class="btn btn-danger" type="submit">hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <!-- Tambahkan lebih banyak baris di sini sesuai kebutuhan -->
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

@endsection
