@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center p-5">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="image-fluid" style="max-width: 400px;">
                    </div>
                    <h1 class="text-center">Welcome to Online Insurance</h1>
                    <br><br>
                    <div class="text-center link-group">
                        <a href="sales-representative" class="btn btn-primary btn-large">Manage Representative</a>
                        <a href="sales-representative" class="btn btn-success btn-large">Generate Payroll</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
