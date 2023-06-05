@extends('layouts.master_page')

@section('title','Update Facture Data')

@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Update Facture</h4>
              </div>
              <div class="card-body">
                <form action="{{ url('/factures/update',$facture->id) }}" method="post">

                    @csrf
                    <input type="hidden" name="facture_id" value="{{$facture->id}}" >
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">FullName</label>
                        <input type="text" class="form-control" name="fullname" value="{{$facture->fullname}}">
                        @error('fullname')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                            <label class="bmd-label-floating">الاسم الكامل</label>
                            <input type="text" class="form-control" name="fullname_a" value="{{$facture->fullname_a}}">
                            @error('fullname_a')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Adresse</label>
                            <input type="text" class="form-control" name="adress" value="{{$facture->adress}}">
                            @error('adress')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">العنوان </label>
                        <input type="text" class="form-control" name="adress_a" value="{{$facture->adress_a}}">
                        @error('adress_a')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="{{$facture->phone}}">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Immatriculation</label>
                          <input type="text" class="form-control" name="car_marque" value="{{$facture->car_marque}}">
                          @error('car_marque')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Date Start Contract</label>
                        <br>
                        <input type="date" class="form-control" name="date_contract_debut" value="{{$facture->date_contract_debut}}">
                        @error('date_contract_debut')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Date Expire Contract</label>
                        <br>
                        <input type="date" class="form-control" name="date_contract_fin" value="{{$facture->date_contract_fin}}">
                        @error('date_contract_fin')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Total Price DH's</label>
                        <input type="text" class="form-control" name="price" value="{{$facture->price}}">
                        @error('price')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating"> Passport ID</label>
                            <input type="text" class="form-control" name="passport_id" value="{{$facture->passport_id}}"/>
                            @error('passport_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                        </div>
                      </div>

                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Oil Size</label>

                          <select class="form-control" name="oil_size" value="{{$facture->oil_size}}">
                              <option {{$facture->oil_size == '1/4' ? 'selected':''}}>1/4</option>
                              <option {{$facture->oil_size == '1/3' ? 'selected':''}}>1/3</option>
                              <option {{$facture->oil_size == '1/2' ? 'selected':''}}>1/2</option>
                              <option {{$facture->oil_size == '1' ? 'selected':''}}>1</option>
                          </select>
                            @error('oil_size')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                      </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>

                          <select class="form-control" name="etat" value="{{$facture->etat}}">
                              <option {{$facture->etat == 'On' ? 'selected':''}}>On</option>
                              <option {{$facture->etat == 'Off' ? 'selected':''}}>Off</option>
                          </select>
                            @error('etat')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Update Facture</button>
                  <a class="btn btn-danger pull-right" href="{{url('factures')}}">Cancel</a>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>

    </div>
  </div>

@endsection
