@extends('layouts.master_page')

@section('title','Update User Data')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Update User</h4>
              </div>
              <div class="card-body">
                <form action="{{url('update-user',$user->id)}}" method="post">
                    @csrf

                    <input type="hidden" name="user_id" value="{{$user->id}}" />
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Full Name</label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="name" value="{{$user->name}}" >
                        @error('name')
                            <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Adress</label>
                        <input type="text" class="form-control" name="adress" value="{{$user->adress}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Role_As</label>
                          <select class="form-control  @error('role_as') is-invalid @enderror" name="role_as" value="{{$user->role_as}}">
                              <option>user</option>
                              <option>admin</option>
                          </select>
                          @error('role_as')
                            <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                        @enderror
                        </div>

                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control  @error('status') is-invalid @enderror" name="status" value="{{$user->status}}">
                              <option>On</option>
                              <option>Off</option>
                          </select>
                            @error('status')
                               <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                        </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Update User</button>
                  <a  class="btn btn-danger pull-right" href="{{url('/users')}}" >Cancel</a>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>

    </div>
  </div>

@endsection
