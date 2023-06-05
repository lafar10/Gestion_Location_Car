@extends('layouts.master_page')

@section('title','Update Assurance Data')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Update Assurance</h4>
              </div>
              <div class="card-body">
                <form action="{{url('/assurance/update',$assurances->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="assurance_id" value="{{$assurances->id}}">
                    <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label class="bmd-label-floating">FullName</label>
                            <input type="text" name="fullname" class="form-control" value="{{$assurances->fullname}}">
                            @error('fullname')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="bmd-label-floating">Marque</label>
                            <input type="text" name="marque" class="form-control"  value="{{$assurances->marque}}">
                            @error('marque')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Car Model</label>
                            <input type="text" name="model" class="form-control"  value="{{$assurances->model}}">
                            @error('model')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Immatriculation</label>
                            <input type="text" name="immatriculation" class="form-control"  value="{{$assurances->immatriculation}}">
                            @error('immatriculation')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="bmd-label-floating">Car Model Year</label>
                            <input type="text" name="year" class="form-control"  value="{{$assurances->year}}">
                            @error('year')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="bmd-label-floating">Color</label>
                            <input type="text" name="color" class="form-control" value="{{$assurances->color}}">
                            @error('color')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Date Start Assurance</label>
                            <br>
                            <input type="date" name="date_assurance_debut" class="form-control" value="{{$assurances->date_assurance_debut}}">
                            @error('date_assurance_debut')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Date Expire Assurance</label>
                            <br>
                            <input type="date" name="date_assurance_fin" class="form-control" value="{{$assurances->date_assurance_fin}}">
                            @error('date_assurance_fin')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Assurance Price</label>
                            <input type="text" name="price" class="form-control" value="{{$assurances->price}}">
                            @error('price')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Period ( Day )</label>
                            <input type="text" name="period" class="form-control" value="{{$assurances->period}}">
                            @error('period')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Assurance Type</label>
                            <select class="form-control" name="type_assurance" value="{{$assurances->type_assurance}}">
                                <option {{$assurances->type_assurance == 'Tout Risque' ? 'selected':''}}>Tout Risque</option>
                                <option {{$assurances->type_assurance == 'Medium Risque' ? 'selected':''}}>Medium Risque</option>
                                <option {{$assurances->type_assurance == 'Basic Risque' ? 'selected':''}}>Basic Risque</option>
                            </select>
                            @error('type_assurance')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">Status</label>
                              <select class="form-control" name="etat" value="{{$assurances->etat}}">
                                  <option {{$assurances->etat == 'On' ? 'selected':''}}>On</option>
                                  <option {{$assurances->etat == 'Off' ? 'selected':''}}>Off</option>
                              </select>
                              @error('etat')
                                <span class="text-danger mt-1 mb-1">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                      </div>
                  <button type="submit" class="btn btn-primary pull-right">Update Assurance</button>
                  <a type="submit" class="btn btn-danger pull-right" href="{{url('/assurances')}}" >Cancel</a>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>

    </div>
  </div>

@endsection
