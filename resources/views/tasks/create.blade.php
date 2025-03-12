@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h6 class="text-danger">
            * Shows required fields
        </h6>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="task_name">Task Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="task" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea style="height: 120px; resize: none;" name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="due_date" required>
            </div>

            <div class="form-group">
                <label for="priority">Priority</label>
                <select name="priority" class="form-control">
                    <option value="" selected disabled hidden>Choose Priority</option>
                    <option value="">Low</option>
                    <option value="">Medium</option>
                    <option value="">High</option>
                </select>
            </div>

            <div class="d-flex justify-content-end py-3" style="gap: 10px;">
                <a href="{{ route('tasks')}}" class="btn btn-cancel">Cancel</a>
                <button type="submit" class="btn btn-custom-icon">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
