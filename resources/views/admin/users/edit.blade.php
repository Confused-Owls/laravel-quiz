@extends('admin.layouts.master')

@section('content')
            <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="{{ route('users.update',['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-image">Image</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <img class="img-thumbnail" src="{{ asset('images/users/'.$user->image) }}" alt="" width="100px" height="100px">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-image">Name</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-name" value="{{ $user->name }}" name="name" placeholder="Enter full name..">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Image</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" name="image" onchange="previewImage()">
                                                @error('image')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-email" value="{{ $user->email }}" name="email" placeholder="Your valid email..">
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-role-id">Role</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="role_id">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}" {{(old('role_id',$user->role_id)==$role->id) ? 'selected':''}}>{{ ucwords($role->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection
