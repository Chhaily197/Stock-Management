@extends('admin.include.master')
@section('container')
    <script>
        var x = false;
// ---------------  password hide show  ----------
        function eyeopen() {
            var type = document.getElementById('eye');
            var icon = document.getElementById('btn_eye');
            if (x == false) {
                x = true;
                type.type = 'text';
               $('#btn_eye').html('<i class="fa-solid fa-eye-slash"></i>');
            } else {
                type.type = 'password';
                x = false;
                $('#btn_eye').html('<i class="fa-solid fa-eye"></i>');
            }
        }
// --------------------------------------------------
    </script>
    <div class="container">
       <form action="{{ route('account.update',$userdata->user_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 card p-5">
            <h3 class="py-3">Edit account</h3>
            <label for="" class="form-label">Username</label>
            <input type="text" class="form-control" name="name" id="" value="{{ $userdata->username }}">

            <label for="" class="form-label">Gender</label>
            <select type="text" class="form-control" name="gender" id="">
                <option value="{{ $userdata->gender }}" selected>{{ $userdata->gender }}</option>
                @if ($userdata->gender == 'M')
                    <option value="F">F</option>
                @else
                    <option value="M">M</option>
                @endif
            </select>

            <label for="" class="form-label">Gmail</label>
            <input type="text" class="form-control" name="gmail" id="" value="{{$userdata->gmail}}">

            <label for="" class="form-label">Password</label>
            <div class="d-flex">
                <input type="password" class="form-control" id="eye" value="{{ $userdata->password }}" name="password">
                <button type="button" class="btn btn-primary ms-3" onclick="eyeopen()" id="btn_eye"><i class="fa-solid fa-eye"></i></button>
            </div>

            <label for="" class="form-label">Role</label>
            <select type="text" class="form-control" name="role" id="">
                <option value="{{$userdata->role}}">{{$userdata->role_name}}</option>
                @foreach ($role as $item)
                    @if ($item->role_id != $userdata->role_id)
                        <option value="{{$item->role_id}}">{{$item->role_name}}</option>
                    @endif
                @endforeach
            </select>
            <div class="d-flex justify-content-center pt-5">
                <input type="submit" class="btn btn-success d-block" value="Save Change">
            </div>
        </div>
       </form>
    </div>
@endsection
