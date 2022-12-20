@extends('layouts.master')
@section('content')
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    
        @csrf
        <!-- row -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Horizontal Form</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <div class="row">
                    @if (session('error'))
                        <div class="alert alert-error">
                            {{ session('error') }}
                        </div>
                    @endif
                    @error('image')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="" value="{{ old('name')}}">
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email')}}">
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="" value="{{ old('password')}}">
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Password" value="{{ old('password')}}">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Jenis</label>
                            <input type="text" class="form-control" name="jenis" placeholder="" value="{{ old('jenis')}}">
                        </div>
                        @error('jenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </div>
    </form> 
                
<script>
    CKEDITOR.replace( 'content' );
</script>

@endsection