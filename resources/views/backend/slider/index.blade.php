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
                <a href="link-to-add-blog.html" class="btn btn-primary mb-2">Tambah Slider</a>
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Contoh Judul Blog</td>
                                <td>1 jam kemudian</td>
                                <td><img src="path/to/image1.jpg" width="200" alt="images"></td>
                                <td>
                                    <a href="link-to-edit-blog.html" class="btn btn-warning">edit</a>
                                    <form action="link-to-delete-blog" method="post" class="d-inline">
                                        <input type="hidden" name="_token" value="csrf_token_here">
                                        <button class="btn btn-danger" type="submit">hapus</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection
