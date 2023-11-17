<!DOCTYPE html>
<html>

<head>
    @include('Books.link')
    <title>Customers</title>
</head>

<body>
    @include('Books.Navbar')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body pb-0">
                        <a href="#" class="btn btn-primary" id="add">Add</a>
                        @if ($customer->isEmpty())
                            <h4>No avialable customers.</h4>
                        @else
                            <table class="table table-border" id="tblCustomer">
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>ID_Card</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($customer as $user)
                                    <tr>
                                        <td>{{ $user->customer_id }}</td>
                                        <td>{{ $user->Username }}</td>
                                        <td>{{ $user->id_card }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>
                                             <a href="#" class="btn btn-primary btn-sm btnedit">Edit</a>
                                             <form action="/customer/:{{ $user->customer_id}}" class="d-inline" method="POST">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button
                                                  class="btn btn-danger btn-sm"
                                                  onclick="return confirm('Are you sure delete a customer?')"
                                                  >Delete</button>
                                             </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>

                <!-- Add customer -->
                <div class="modal fade" id="addCustomer" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Add Customer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="group-form mb-3">
                                   <input type="text" id="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="group-form mb-3">
                                   <input type="text" id="idCard" class="form-control" placeholder="ID Card">
                                </div>
                                <div class="group-form mb-3">
                                   <label for="gender">Gender: </label>
                                   <select name="gender" id="gender" class="form-select">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                   </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="save">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Edit customer --}}
                <div class="modal fade" id="update" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Customer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <input type="text" id="id">
                                <div class="group-form mb-3">
                                   <input type="text" id="editname" class="form-control" placeholder="Username">
                                </div>
                                <div class="group-form mb-3">
                                   <input type="text" id="editCard" class="form-control" placeholder="ID Card">
                                </div>
                                <div class="group-form mb-3">
                                   <label for="gender">Gender: </label>
                                   <select name="gender" id="editgender" class="form-select">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                   </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btnEdit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <script src="{{ asset('js/customer/add.js') }}"></script>
    <script src="{{ asset('js/customer/edit.js') }}"></script>
</body>

</html>
