@extends('layouts.master_page')

@section('title','Add Car Data')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Add Car</h4>
              </div>
              <div class="card-body">
                <form action="{{url('/cars/store')}}" method="post">
                    @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Marque</label>
                        <input type="text" class="form-control"  name="marque" id="marque" >
                        @error('marque')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Car Model</label>
                        <input type="text" class="form-control"  name="model" id="model">
                        @error('model')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Immatriculation</label>
                        <input type="text" class="form-control" name="immatriculation" id="immatriculation" >
                        @error('immatriculation')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="bmd-label-floating">Car Model Year</label>
                        <input type="text" class="form-control" name="year" id="year" >
                        @error('year')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="bmd-label-floating">Color</label>
                        <input type="text" class="form-control"  name="color" id="color" >
                        @error('color')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Kilométrage</label>
                        <br>
                        <input type="text"  class="form-control" name="kilometrage" id="kilometrage">
                        @error('kilometrage')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Date Assurance</label>
                        <br>
                        <input type="date"  class="form-control" name="date_assurance" id="date_assurance">
                        @error('date_assurance')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select  class="form-control" name="etat" id="etat">
                              <option>On</option>
                              <option>Off</option>
                          </select>
                          @error('etat')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Add Car</button>
                  <a class="btn btn-danger pull-right" href="{{url('/cars')}}" >Cancel</a>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>

    </div>
  </div>

@endsection
