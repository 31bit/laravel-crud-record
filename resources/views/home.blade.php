@extends('layouts.app')

@section('css')
<style>
    .create-customer{    
        margin-bottom: -10px;
        margin-top: -7px;
    }
    .create-customer:not(.disabled):hover {    
        margin-top: -5px;
    }
</style>
@endsection
@section('content')
<div class="container-fuild">
    <div class="row justify-content-center">
        <div class="col-md-2 pull-left">
        <div class="card">
                <div class="card-header">Dashboard</div>

                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-9 pull-right">
            <div class="card">
                <div class="card-header">
                    Example CRUD                        
                </div>

                <div class="card-body">
                    @include('alert')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection