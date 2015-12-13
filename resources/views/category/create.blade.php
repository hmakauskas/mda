@extends('layout/app')

@section('content')


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    <form action="<?=url('category')?>" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        @if (isset($Category[0]->id))
            {{ method_field('PUT') }}
        @endif

        <input type="hidden" name="id" value="{{ $Category[0]->id or '' }}">

        <!-- Task Name -->
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Category</label>

            <div class="col-sm-6">
                <input type="text" name="category_name" id="Category-name" value="{{ $Category[0]->category_name or '' }}" class="form-control">
            </div>
        </div>


        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Save Category
                </button>
            </div>
        </div>
    </form>


</div>

@endsection