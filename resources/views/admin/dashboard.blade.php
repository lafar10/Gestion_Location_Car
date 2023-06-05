@extends('layouts.master_page')

@section('title','Dashboard')

@section('content')
<div class="container">
    <br>
    <br>
    <br>
    <div class="row ">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">group</i>
                </div>
                <p class="card-category">Users</p>
                <h3 class="card-title">
                    @if($users->count() > 0)
                        {{$users->count()}}
                    @else
                        0
                    @endif


                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">control_point</i>
                  <a href="{{url('users')}}">Get More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">monetization_on</i>
                </div>
                <p class="card-category">Revenue</p>
                <h3 class="card-title">
                  @if($factures->count() > 0)
                        {{$tot.' Dh'}}
                    @else
                        0 DH's
                    @endif
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">control_point</i>
                    <a href="{{url('factures')}}">Get More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">file_copy</i>
                </div>
                <p class="card-category">Factures</p>
                <h3 class="card-title"> +
                    @if($factures->count() > 0)
                        {{$factures->count()}}
                    @else
                        0
                    @endif
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">control_point</i>
                    <a href="{{url('factures')}}">Get More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">text_snippet</i>
                </div>
                <p class="card-category">Assurances</p>
                <h3 class="card-title"> +
                    @if($assurance->count() > 0)
                        {{$assurance->count()}}
                    @else
                        0
                    @endif
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">control_point</i>
                    <a href="{{url('assurances')}}">Get More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
