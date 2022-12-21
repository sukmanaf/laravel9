@extends('layouts.master')
@section('content')

        
        <!-- <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
            </ol>
        </div> -->
        <!-- row -->

        <a href="{{ route('posts.create') }}" class="btn btn-xxs btn-primary ">TAMBAH POST</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Datatable</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">JUDUL</th>
                                    <th scope="col">CONTENT</th>
                                    <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ Storage::url('public/posts/').$post->image }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{!! $post->content !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xxs btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xxs btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                @endforelse
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            

    @endsection