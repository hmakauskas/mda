@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    <form action="<?=url('fiscalDocumentStatus')?>" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        @if (isset($FiscalDocumentStatus[0]->id))
            {{ method_field('PUT') }}
        @endif

        <input type="hidden" name="id" value="{{ $FiscalDocumentStatus[0]->id or '' }}">

        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Fiscal Document Status</label>

            <div class="col-sm-6">
                <input type="text" name="status_name" id="FiscalDocumentStatus-name" value="{{ $FiscalDocumentStatus[0]->status_name or '' }}" class="form-control">
            </div>
        </div>


        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Save Fiscal Document Status
                </button>
            </div>
        </div>
    </form>


</div>

@endsection