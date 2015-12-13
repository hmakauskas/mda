@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    <form action="<?=url('marketingChannel')?>" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        @if (isset($MarketingChannel[0]->id))
            {{ method_field('PUT') }}
        @endif

        <input type="hidden" name="id" value="{{ $MarketingChannel[0]->id or '' }}">

        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Marketing Channel</label>

            <div class="col-sm-6">
                <input type="text" name="channel_name" id="MarketingChannel-name" value="{{ $MarketingChannel[0]->channel_name or '' }}" class="form-control">
            </div>
        </div>


        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Save Cost Status
                </button>
            </div>
        </div>
    </form>


    <form action="<?=url('marketingChannel')?>" method="DELETE" class="form-horizontal">
        {{ csrf_field() }}


        {{ method_field('DELETE') }}
        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Delete Marketing Channel
                </button>
            </div>
        </div>
    </form>
</div>

@endsection