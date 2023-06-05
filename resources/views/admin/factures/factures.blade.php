@extends('layouts.master_page')

@section('title','Factures Data')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary ">
            <h4 class="card-title ">Factures Data</h4>
            <a class="btn btn-success pull-right" href="{{ url('add-factures')}}"> Add Facture</a>
          </div>
          <div class="card-body">

                @if (session('not_found'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('not_found') }}
                    </div>
                @endif
                @if (session('facture_destroy'))
                    <div class="alert alert-success" role="alert">
                        {{ session('facture_destroy') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

            <div class="table-responsive">
              <table class="table" id="myTable">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    FullName
                  </th>
                  <th>
                    FullName_arab
                  </th>
                  <th>
                    Adress
                  </th>
                  <th>
                    Adress_arab
                  </th>
                  <th>
                    Phone
                  </th>
                  <th>
                    Car_Marque
                  </th>
                  <th>
                    Date_Start_C
                  </th>
                  <th>
                    Date_Expire_C
                  </th>
                  <th>
                    Total_Price
                  </th>
                  <th>
                    Oil_Size
                  </th>
                  <th>
                    Passport_ID
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
                    @foreach ($factures as $facture)

                  <tr>
                    <td>
                      {{$facture->id}}
                    </td>
                    <td>
                        {{$facture->fullname}}
                    </td>
                    <td>
                        {{$facture->fullname_a}}
                    </td>
                    <td>
                        {{$facture->adress}}
                    </td>
                    <td >
                        {{$facture->adress_a}}
                    </td>
                    <td>
                        {{$facture->phone}}
                      </td>
                      <td>
                        {{$facture->car_marque}}
                      </td>
                      <td>
                        {{$facture->date_contract_debut}}
                      </td>
                      <td>
                        @if ($facture->date_contract_fin == date('Y-m-d') )
                            <span class="badge badge-danger"> {{$facture->date_contract_fin}}</span>
                        @else
                            <span class="badge badge-success"> {{$facture->date_contract_fin}}</span>
                        @endif

                      </td>
                      <td class="text-primary">
                        {{$facture->price}}
                      </td>
                      <td>
                        {{$facture->oil_size}}
                      </td>
                      <td>
                        {{$facture->passport_id}}
                      </td>
                      <td>
                        @if ($facture->etat == 'Off')
                            <span class="badge badge-danger"> {{$facture->etat}}</span>
                        @else
                            <span class="badge badge-success"> {{$facture->etat}}</span>
                        @endif


                      </td>
                      <td>
                        {{$facture->created_at}}
                      </td>
                      <td >

                            <form action="{{url('/factures/delete')}}" method="post" class="d-flex">

                                @csrf
                                <input type="hidden" name="facture_id" value="{{$facture->id}}">
                                <a class="btn btn-primary" href="{{url('/factures/edit',$facture->id)}}">Edit</a>
                                <button class="btn btn-danger"  type="submit" >Delete</button>
                                <a class="btn btn-deepOrange" href="{{url('/factures/Pdf',$facture->id)}}">PDF</a>
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
