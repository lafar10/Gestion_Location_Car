@extends('layouts.master_page')

@section('title','Users Data')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">New Users Data</h4>
          </div>
          <div class="card-body">
                    @if (session('not_found'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('not_found') }}
                        </div>
                    @endif
                    @if (session('user_destroy'))
                        <div class="alert alert-success" role="alert">
                            {{ session('user_destroy') }}
                        </div>
                    @endif
                    @if (session('user_mod'))
                        <div class="alert alert-success" role="alert">
                            {{ session('user_mod') }}
                        </div>
                    @endif

            <div class="table-responsive">
              <table class="table" id="myTable">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Role_As
                  </th>
                  <th>
                    Phone
                  </th>
                  <th>
                    Adress
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Created_At
                  </th>
                  <th>
                    Actions
                  </th>
                </thead>
                <tbody>

                @foreach ($users as $user)

                  <tr>
                    <td>
                      {{$user->id}}
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        @if ($user->role_as == 'user')

                          <span class="badge badge-info"> {{$user->role_as}}</span>
                        @else
                            <span class="badge badge-success"> {{$user->role_as}}</span>
                        @endif
                    </td>
                    <td >
                        {{$user->phone}}
                    </td>
                    <td>
                        {{$user->adress}}
                    </td>
                    <td>
                        @if ($user->status == 'Off')
                            <span class="badge badge-danger"> {{$user->status}}</span>
                        @else
                            <span class="badge badge-success"> {{$user->status}}</span>
                        @endif
                    </td>
                    <td>
                        {{$user->created_at}}
                    </td>
                    <td >

                            <form action="{{url('destroy-user')}}" method="post" class="d-flex" onSubmit="return confirm('Are you sure !?')">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user->id}}" />
                                <a class="btn btn-primary" href="{{url('edit-users',$user->id)}}">Edit</a>
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection
