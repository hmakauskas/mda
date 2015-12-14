@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form 
    <form action="currency" method="POST" class="form-horizontal">
    -->

    {!! Form::open(['method'=>'POST','url'=>'currency','class'=>'form-horizontal'])  !!}

        {{ csrf_field() }}

        @if (isset($currency->id))
            {{ method_field('PUT') }}
        @endif

        <input type="hidden" name="id" value="{{ $currency->id or '' }}">

        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Code</label>

            <div class="col-sm-6">
                <input type="text" name="currency_code" id="currency-currency_code" value="{{ $currency->currency_code or '' }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Symbol</label>

            <div class="col-sm-6">
                <input type="text" name="currency_symbol" id="currency-currency_symbol" value="{{ $currency->currency_symbol or '' }}" class="form-control">                  
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Name</label>

            <div class="col-sm-6">
                <input type="text" name="currency_name" value="{{ $currency->currency_name or '' }}" id="currency-currency_name" class="form-control">
            </div>
        </div>

         <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Country</label>

            <div class="col-sm-6">
                <input type="text" name="country" value="{{ $currency->country or '' }}" id="currency-country" class="form-control">
            </div>
        </div>
        
        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Save Currency
                </button>
            </div>
        </div>
    {!! Form::close() !!}
</div>

@endsection