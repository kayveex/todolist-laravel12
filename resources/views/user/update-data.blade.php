@extends('layout.app')

{{-- Page Title --}}
@section('page_title')
    Update Data
@endsection

{{-- Navbar --}}
@section('navbar')
    @include('layout.navbar')
@endsection

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card p-4">
                <h1>Update Data Akun</h1>
                <form action="{{ route('user.doUpdate') }}" method="post">
                    @csrf
                    <!-- 01. Notification -->
                    @include('layout.notif')
                    <div class="mb-2">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" 
                            value="{{ Auth::user()->email }}" readonly disabled>
                    </div>
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" 
                        value="{{ old('name', Auth::user()->name) }}">
                    </div>
                    <h3>Password</h3>
                    <div class="form-text">
                        <p>Silakan masukkan password jika akan mengganti password!</p>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-2">
                        <label for="password-confirmation" class="form-label">Confirmation Password</label>
                        <input type="password" class="form-control" name="password-confirmation" id="password-confirmation">
                    </div>
                    <div class="d-inline">
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
