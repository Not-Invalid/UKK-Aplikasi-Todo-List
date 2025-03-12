@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <div class="card welcome-card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="fw-bold">Welcome to TaskMate, User!</h5>
                    <p class="mb-1">Keep track of your tasks and stay organized!</p>
                    <a href="{{ route('tasks') }}" class="btn btn-custom mt-3">Start Managing Tasks</a>
                </div>
                <img src="{{ asset('assets/img/image.png') }}" alt="Welcome Image" class="img-fluid" style="margin-left: auto; width: 200px;">
            </div>
        </div>
    </div>
</div>
<div class="row my-2">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6>Total Tasks</h6>
                    <h2>12</h2>
                </div>
                <div class="badge bg-light p-3">
                    <i class="fas fa-clipboard fa-2xl text-primary"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6>Tasks Completed</h6>
                    <h2>12</h2>
                </div>
                <div class="badge bg-light p-3">
                    <i class="fas fa-clipboard-check fa-2xl text-success"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6>Tasks Uncompleted</h6>
                    <h2>12</h2>
                </div>
                <div class="badge bg-light p-3">
                    <i class="fas fa-circle-xmark fa-2xl text-danger"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
