@extends('layouts.master_page')

@section('title','Cars Data')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Cars Data</h4>
            <a class="btn btn-success pull-right" href="{{ url('/cars/create')}}"> Add Car</a>
          </div>
          <div class="card-body">

                    @if (session('not_found'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('not_found') }}
                        </div>
                    @endif
                    @if (session('car_destroy'))
                        <div class="alert alert-success" role="alert">
                            {{ session('car_destroy') }}
                        </div>
                    @endif
                    @if (session('cars_mod'))
                        <div class="alert alert-success" role="alert">
                            {{ session('cars_mod') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif


            <div class="table-responsive">
                <table class="table " id="myTable">
                    <thead class=" text-primary">
                      <th>
                        ID
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
                        Kilométrage
                      </th>
                      <th>
                        Date_Assurance
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
                        @foreach ($cars as $car)

                            <tr>
                                <td>
                                {{$car->id}}
                                </td>
                                <td>
                                    {{$car->marque}}
                                </td>
                                <td>
                                    {{$car->model}}
                                </td>
                                <td>
                                    {{$car->year}}
                                </td>
                                <td >
                                    {{$car->color}}
                                </td>
                                <td>
                                    {{$car->immatriculation}}
                                </td>
                                <td>
                                    {{$car->kilometrage}}
                                </td>
                                <td>
                                    @if ($car->date_assurance == date('Y-m-d') )
                                        <span class="badge badge-danger"> {{$car->date_assurance}}</span>
                                    @else
                                        <span class="badge badge-success"> {{$car->date_assurance}}</span>
                                    @endif

                                </td>
                                <td>
                                    @if ($car->etat == 'Off')
                                        <span class="badge badge-danger"> {{$car->etat}}</span>
                                    @else
                                        <span class="badge badge-success"> {{$car->etat}}</span>
                                    @endif

                                </td>
                                <td >
                                    {{$car->created_at}}
                                </td>
                                <td >

                                        <form action="{{url('/cars/destroy')}}" method="POST" class="d-flex" onSubmit="return confirm('Are you sure !?')">
                                            @csrf
                                            <input type="hidden" name="car_id" value="{{$car->id}}">
                                            <a class="btn btn-primary" href="{{url('/cars/edit',$car->id)}}">Edit</a>
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
