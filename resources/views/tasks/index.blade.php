@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-between mb-4">
                    <div class="d-flex justify-start">
                        <select name="status" id="status" class="form-control w-auto mx-2">
                            <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>View All</option>
                            <option value="completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="uncompleted" {{ request('status') == 'Uncompleted' ? 'selected' : '' }}>Uncompleted</option>
                        </select>
                    </div>

                    <div class="d-flex justify-center w-100 mx-2">
                        <input type="text" id="search" class="form-control w-60" placeholder="Search">
                    </div>

                    <div class="d-flex justify-end">
                        <a href="{{ route('tasks.create') }}" class="btn btn-custom-2 text-white d-flex align-items-center justify-content-center">
                            Add New Task
                        </a>
                    </div>
                </div>


                <!-- Table -->
                <div class="table-responsive bg-white rounded shadow-xs">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="bg-light-grey text-dark">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Task Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Due Date</th>
                                <th class="text-center">Priority</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tasks-table-body">
                            <tr>
                                <td>1</td>
                                <td>Belajar</td>
                                <td>Belajar Mempersiapkan USP</td>
                                <td>14-03-2025</td>
                                <td><span class="badge badge-custom bg-danger">High</span></td>
                                <td><span class="badge badge-custom bg-secondary">Uncompleted</span></td>
                                <td class="d-flex gap-3 align-items-center justify-content-center">
                                    <form action="#" method="POST" class="done-form">
                                        <button type="submit" class="btn btn-done mx-2" data-toggle="tooltip" title="Mark as Done">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('tasks.edit') }}" class="btn btn-md btn-edit"  data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="#" method="POST" class="delete-form">
                                        <button type="submit" class="btn btn-delete mx-2" data-toggle="tooltip" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>USP Kejuruan</td>
                                <td>Pelaksanaan Ujian</td>
                                <td>17-03-2025</td>
                                <td><span class="badge badge-custom bg-danger">High</span></td>
                                <td><span class="badge badge-custom bg-secondary">Uncompleted</span></td>
                                <td class="d-flex gap-3 align-items-center justify-content-center">
                                    <form action="#" method="POST" class="done-form">
                                        <button type="submit" class="btn btn-done mx-2" data-toggle="tooltip" title="Mark as Done">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('tasks.edit') }}" class="btn btn-md btn-edit"  data-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="#" method="POST" class="delete-form">
                                        <button type="submit" class="btn btn-delete mx-2" data-toggle="tooltip" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between mt-4">
                        <div>
                          <span>Showing 1 to 10 of 10 entries</span>
                        </div>
                        <div class="d-flex">
                          <nav aria-label="Page navigation">
                            <ul class="pagination">
                              <li class="page-item disabled">
                                <span class="page-link"><i class="fa-solid fa-chevron-left"></i></span>
                              </li>

                              <li class="page-item active"><span class="page-link">1</span></li>

                              <li class="page-item disabled">
                                <span class="page-link"><i class="fa-solid fa-chevron-right"></i></span>
                              </li>
                            </ul>
                          </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Delete!',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#dc3545',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        const doneForms = document.querySelectorAll('.done-form');
        doneForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Task Finished?',
                    text: 'This action cannot be undone!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Done!',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#dc3545',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        document.getElementById('status').addEventListener('change', function() {
            const statusValue = this.value;
            const url = new URL(window.location.href);
            url.searchParams.set('status', statusValue);
            window.location.href = url;
        });

        const searchInput = document.getElementById('search');
        const filterTable = (tableBodyId, columnIndices) => {
            const tableBody = document.getElementById(tableBodyId);

            searchInput.addEventListener('input', function() {
                const searchText = searchInput.value.toLowerCase();

                Array.from(tableBody.children).forEach(row => {
                    const matches = columnIndices.some(index =>
                        row.children[index].textContent.toLowerCase().includes(searchText)
                    );
                    row.style.display = matches ? '' : 'none';
                });
            });
        };

        filterTable('tasks-table-body', [1,2,3,4,5]);
    });
</script>

@endsection
