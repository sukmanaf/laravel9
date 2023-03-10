@extends('layouts.master')
@section('content')

        
        <!-- <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
            </ol>
        </div> -->
        <!-- row -->

        <a href="{{ route('users.create') }}" class="btn btn-xxs btn-primary ">TAMBAH</a>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Datatable</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <!-- <thead>
                                    <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{!! $user->jenis !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xxs btn-primary">EDIT</a>
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
                                </tbody> -->
                                
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Payments Queue</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                                <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Jenis</th>
                                                <th scope="col">AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{!! $user->jenis !!}</td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xxs btn-primary">EDIT</a>
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
    <script>
/*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/ 
    //  $.ajaxSetup({
    //       headers: {
    //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //       }
    // });
      
    // /*------------------------------------------
    // --------------------------------------------
    // Render DataTable
    // --------------------------------------------
    // --------------------------------------------*/
    // var table = $('example').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{{ route('users.data') }}",
    //     columns: [
    //         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //         {data: 'name', name: 'name'},
    //         {data: 'detail', name: 'detail'},
    //         {data: 'action', name: 'action', orderable: false, searchable: false},
    //     ]
    // });

    $(document).ready(function() {
    // $('#example').DataTable({
    //     "processing": true,
    //     "serverSide": true,
    //     "ajax": "{{ route('users.data') }}",
    //     "columns": [
    //     { "data": "name" },
    //     { "data": "email" },
    //     { "data": "jenis" },
    //     { "data": "jenis" },
    //     ]

    // });
    });

    </script>

    @endsection