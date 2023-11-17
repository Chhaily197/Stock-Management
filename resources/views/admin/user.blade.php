@extends('admin.include.master')
@section('container')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {

        });

        function edit(id) {
            var data_user = '';
            $.post('aed', {
                id: id
            }, function(data) {
                data_user = data;
            })

        }
        function deleteuser(id){
            var action = "{{ route('account.destroy', ':id') }}";
                action = action.replace(':id', id);
                document.getElementById('delete-user').action = action;
        }
    </script>

    <div class="pagetitle">
        <h1>User Account</h1>
        <nav>
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="/">Home</a></li> --}}
                {{-- <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Blank</li> --}}
            </ol>
        </nav>
    </div><!-- End Page Title -->
    {{-- book shop  --}}
    <section class="section">
        <!-- Table with stripped rows -->
        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
            <div class="datatable-top">

                <div class="p-4">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        create
                    </button>
                </div>
            </div>
            <div class="datatable-container">
                <table id="tbl" class="table datatable datatable-table">
                    <thead>
                        <tr>
                            <th data-sortable="true">#</th>
                            <th data-sortable="true">UserName</th>
                            <th data-sortable="true">Gender</th>
                            <th data-sortable="true">Gmail</th>
                            <th data-sortable="true">Role</th>
                            <th data-sortable="true">Menu</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($user as $users)
                            <tr data-index="0">
                                <td> {{ $users->user_id }} </td>
                                <td> {{ $users->username }}</td>
                                <td> {{ $users->gender }}</td>
                                <td> {{ $users->gmail }}</td>
                                <td> {{ $users->role_name }}</td>
                                <td>
                                    <a href="{{ URL::to('account/' . $users->user_id . '/edit') }}" class="btn btn-success edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a type="button" class="btn btn-danger delete" data-bs-toggle="modal"
                                        data-bs-target="#delete_data" onclick="deleteuser({{$users->user_id}})">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                                {{-- <td class="d-none">
                                    {{ $cat->category_id }}
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $user->links() !!}
            </div>
            <div class="datatable-bottom">
                <nav class="datatable-pagination">
                    <ul class="datatable-pagination-list"></ul>
                </nav>
            </div>
        </div>
        <!-- End Table with stripped rows -->


    </section>
    {{-- create account  --}}
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('account.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            {{-- name  --}}
                            <label for="" class="form-label py-2">User Name</label>
                            <input type="text" class="form-control" name="username" id=""
                                aria-describedby="emailHelpId" placeholder="" required>
                            {{-- gender  --}}
                            <label for="" class="form-label l py-2">Gender</label>
                            <select required class="form-control" name="gender" id="">
                                <option value="" selected>--- Please Select Gender --- </option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            <label for="" class="form-label l py-2">Gmail</label>
                            <input type="email" name="gmail" class="form-control" required>
                            <label for="" class="form-label l py-2">Password</label>
                            <input type="password" class="form-control" name="password" required>
                            <label for="" class="form-label l py-2">Role</label>

                            <select required class="form-control" name="role" id="">
                                <option value="" selected>--- Please Select Role --- </option>
                                @foreach ($role as $roles)
                                    <option value="{{ $roles->role_id }}">{{ $roles->role_name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ===================== --}}
    {{-- update  --}}
    <!-- Modal -->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="category_update" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            {{-- name  --}}
                            <label for="" class="form-label py-2">User Name</label>
                            <input type="text" class="form-control" name="username" id="update_name"
                                aria-describedby="emailHelpId" placeholder="" required>
                            {{-- gender  --}}
                            <label for="" class="form-label l py-2">Gender</label>
                            <select required class="form-control" name="gender">
                                <option id="gender_update" value="" selected></option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            <label for="" class="form-label l py-2">Gmail</label>
                            <input type="email" name="gmail" id="update_gmail" class="form-control" required>
                            <label for="" class="form-label l py-2">Password</label>
                            <input type="text" class="form-control" name="password" id="update_password" required>
                            <label for="" class="form-label l py-2">Role</label>

                            <select required class="form-control" name="role" id="role_id_update">
                                <option  value="" selected ></option>
                                @foreach ($role as $roles)
                                    <option value="{{ $roles->role_id }}">{{ $roles->role_name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- =============== --}}
    {{-- delete  --}}
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="delete_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  method="POST" id="delete-user">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <h5>You really want to delete This data</h5>
                    </div>
                    <input type="hidden" id="delete_unit" name="category_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
