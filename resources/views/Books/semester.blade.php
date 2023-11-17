<!DOCTYPE html>
<html>

<head>
    @include('Books.link')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <title>Semester</title>
</head>

<body>
    @include('Books.Navbar')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body pb-0">
                        <a href="#" class="btn btn-primary" id="btnadd">Add Semester</a>
                        @if ($data->isEmpty())
                            <h1>No available year</h1>
                        @else
                            <table class="table table-border text-center" id="tbsem">
                                <tr>
                                    <th>ID</th>
                                    <th>Semester</th>
                                    <th>Create At</th>
                                    <th>Active</th>
                                </tr>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->semester_id }}</td>
                                        <td>{{ $item->semester_name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm btnedit">EDIT</a>
                                            {{-- <a href="#" class="btn btn-danger btn-sm btndelete">DELETE</a> --}}
                                            <form action="{{ route('semester.destroy', $item->semester_id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this semester?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Add Year --}}
            <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Semester</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div align="right"><a href="#" id="addSt"
                                    class="btn btn-primary btn-sm p-1">Add</a></div>
                            <table class="table-border text-center" id="addrow">
                                <tr>
                                    <th>Semester</th>
                                </tr>
                                <tbody id="trow">
                                    <tr>
                                        <td>
                                            <div class="group-form mb-3">
                                                <input type="text" class="form-control semester"
                                                    placeholder="Semester Name" name="semester">
                                        </td>
                        </div>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnsave">Add</button>
                    </div>
                </div>
            </div>
            </div>
            {{-- End add Year --}}

            {{-- Edit --}}
            <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Semester</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="id">
                            <div class="group-form mb-3">
                                <input type="text" id="semester" placeholder="Semester Name" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnEdit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End edit --}}


            {{-- Delete --}}
            <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="id" class="id" name="id">
                            <h4>Are you sure delete semester?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnDelete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End edit --}}
        </section>
    </main>

    <script src="{{ asset('js/semester/add.js') }}"></script>
    <script src="{{ asset('js/semester/edit.js') }}"></script>
</body>

</html>
