@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Sales Representative') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<h1>Welcome to Online Insurance</h1>
                    <hr>
					<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, dolores libero! Ipsum qui minus dignissimos corrupti reprehenderit saepe, nobis nihil porro doloribus nesciunt doloremque autem nostrum quas libero odio dolore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, dolores libero! Ipsum qui minus dignissimos corrupti reprehenderit saepe, nobis nihil porro doloribus nesciunt doloremque autem nostrum quas libero odio dolore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, dolores libero! Ipsum qui minus dignissimos corrupti reprehenderit saepe, nobis nihil porro doloribus nesciunt doloremque autem nostrum quas libero odio dolore.</p>
					<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, dolores libero! Ipsum qui minus dignissimos corrupti reprehenderit saepe, nobis nihil porro doloribus nesciunt doloremque autem nostrum quas libero odio dolore.</p>
					<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, dolores libero! Ipsum qui minus dignissimos corrupti reprehenderit saepe, nobis nihil porro doloribus nesciunt doloremque autem nostrum quas libero odio dolore.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, dolores libero! Ipsum qui minus dignissimos corrupti reprehenderit saepe, nobis nihil porro doloribus nesciunt doloremque autem nostrum quas libero odio dolore.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, dolores libero! Ipsum qui minus dignissimos corrupti reprehenderit saepe, nobis nihil porro doloribus nesciunt doloremque autem nostrum quas libero odio dolore.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, dolores libero! Ipsum qui minus dignissimos corrupti reprehenderit saepe, nobis nihil porro doloribus nesciunt doloremque autem nostrum quas libero odio dolore.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, dolores libero! Ipsum qui minus dignissimos corrupti reprehenderit saepe, nobis nihil porro doloribus nesciunt doloremque autem nostrum quas libero odio dolore.</p>
					<hr>
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
