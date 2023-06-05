@extends('layouts.master_page')

@section('title','Assurance Data')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Assurance Data</h4>
            <a class="btn btn-success pull-right" href="{{ url('add-assurance')}}"> Add Assurance</a>
          </div>
          <div class="card-body">
                    @if (session('not_found'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('not_found') }}
                        </div>
                    @endif
                    @if (session('assurance_destroy'))
                        <div class="alert alert-success" role="alert">
                            {{ session('assurance_destroy') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

            <div class="table-responsive">
              <table class="table bordered" id="myTable">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    FullName
                  </th>
                  <th>
                    Marque
                  </th>
                  <th>
                    Model
                  </th>
                  <th>
                    Year
                  </th>
                  <th>
                    Color
                  </th>
                  <th>
                    Immatriculation
                  </th>
                  <th>
                    Date_Start
                  </th>
                  <th>
                    Date_Expire
                  </th>
                  <th>
                    Total_Price
                  </th>
                  <th>
                    Period
                  </th>
                  <th>
                    Assurance_Type
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
                    @foreach ($assurances as $assurance)

                  <tr>
                    <td>
                      {{$assurance->id}}
                    </td>
                    <td>
                        {{$assurance->fullname}}
                    </td>
                    <td>
                        {{$assurance->marque}}
                    </td>
                    <td>
                        {{$assurance->model}}
                    </td>
                    <td >
                        {{$assurance->year}}
                    </td>
                    <td>
                        {{$assurance->color}}
                      </td>
                      <td>
                        {{$assurance->immatriculation}}
                      </td>
                      <td>
                        {{$assurance->date_assurance_debut}}
                      </td>
                      <td>
                        @if ($assurance->date_assurance_fin == date('Y-m-d') )
                            <span class="badge badge-danger"> {{$assurance->date_assurance_fin}}</span>
                        @else
                            <span class="badge badge-success"> {{$assurance->date_assurance_fin}}</span>
                        @endif

                      </td>
                      <td class="text-primary">
                        {{$assurance->price}} DH's
                      </td>
                      <td>
                        {{$assurance->period}} Day
                      </td>
                      <td>
                        {{$assurance->type_assurance}}
                      </td>
                      <td>
                        @if ($assurance->etat == 'Off')
                            <span class="badge badge-danger"> {{$assurance->etat}}</span>
                        @else
                            <span class="badge badge-success"> {{$assurance->etat}}</span>
                        @endif
                      </td>
                      <td>
                        {{$assurance->created_at}}
                      </td>
                      <td>

                            <form action="{{url('/assurance/destroy')}}" method="post" class="d-flex" onsubmit="confirm('Are you sure !?')">
                                @csrf
                                <input type="hidden" name="assurance_id" value="{{$assurance->id}}">
                                <a class="btn btn-primary" href="{{url('/assurance/edit',$assurance->id)}}">Edit</a>
                                <button type="submit" class="btn btn-danger" >Delete</button>
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
