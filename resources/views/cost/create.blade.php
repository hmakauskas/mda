@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    <form action="/laravel5/public/cost" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        @if (isset($cost->id))
            {{ method_field('PUT') }}
        @endif

        <input type="hidden" name="id" value="{{ $cost->id or '' }}">

        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">{{ trans('messages.Short Description') }}</label>

            <div class="col-sm-6">
                <input type="text" name="short_description" id="cost-short_description" value="{{ $cost->short_description or '' }}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Management Date</label>

                <div class="col-sm-6">
                    <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="date_mgr" value="{{ $cost->date_mgr or '' }}" id="datepicker" placeholder="2016-01-01">

                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                    </span>
                </div>               
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Accounting Date</label>

                <div class="col-sm-6">
                    <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="date_acc" value="{{ $cost->date_acc or '' }}" id="datepicker2" placeholder="2016-01-01">

                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">
                        </span>
                    </span>
                </div>               
            </div>
        </div>               

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Value</label>

            <div class="col-sm-2">
                {!! 
                    Form::select(   
                        'currency_id', 
                        (['0' => 'Currency'] + $currencies), 
                        (isset($cost->currency_id) ? $cost->currency_id : null), 
                        ['class' => 'form-control']
                    ) 
                !!}
            </div>

            <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" name="value" id="fiscalDocument-value" value="{{ $cost->value or '' }}" class="form-control">                  
                  <span class="input-group-addon">$</span>
                </div>                                
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Supplier</label>

            <div class="col-sm-6">
                {!! 
                    Form::select(   
                        'supplier_id', 
                        (['0' => 'Supplier'] + $suppliers), 
                        (isset($cost->supplier_id) ? $cost->supplier_id : null), 
                        ['class' => 'form-control']
                    ) 
                !!}
            </div>
        </div>        

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Company</label>
            <div class="col-sm-6">
                {!! 
                    Form::select(   
                        'company_id', 
                        (['0' => 'Select a Company'] + $companies), 
                        (isset($cost->company_id) ? $cost->company_id : null),  
                        ['class' => 'form-control']
                    ) 
                !!}
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Marketing Channel</label>

            <div class="col-sm-6">
                {!! 
                    Form::select(   
                        'marketing_channel_id', 
                        (['0' => 'Channels'] + $marketing_channels), 
                        (isset($cost->marketing_channel_id) ? $cost->marketing_channel_id : null), 
                        ['class' => 'form-control']
                    ) 
                !!}
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Category</label>

            <div class="col-sm-6">
                {!! 
                    Form::select(   
                        'category_id', 
                        (['0' => 'Category'] + $categories), 
                        (isset($cost->category_id) ? $cost->category_id : null), 
                        ['class' => 'form-control']
                    ) 
                !!}
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Status</label>

            <div class="col-sm-6">
                {!! 
                    Form::select(   
                        'cost_status_id', 
                        (['0' => 'Status'] + $status), 
                        (isset($cost->cost_status_id) ? $cost->cost_status_id : null), 
                        ['class' => 'form-control']
                    ) 
                !!}
            </div>
        </div>

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Long Description</label>

            <div class="col-sm-6">
                <textarea name="description" cols="74" rows="5">{{ $cost->description or '' }}</textarea>                
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Save Cost
                </button>
            </div>
        </div>
    </form>
</div>

@endsection