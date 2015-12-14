@extends('layout/app')

@section('content')

<center>
    <h2>Categories</h2>    
</center> 

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- Current Tasks -->
    @if (isset($Categories))
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Categories
            </div>

            {!! Form::open(['method'=>'GET','url'=>'category','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <a href="{{ url('category/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>

            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" placeholder="Search...">

                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">Search</button>
                </span>

            </div>
            {!! Form::close() !!}

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table Body -->
                    <tbody>
                        <tr>
                            <td class="table-text">
                                <div>Category</div>
                            </td>
                            <td class="table-text">
                                <div></div>
                            </td>                                 
                        </tr>
                        @foreach ($Categories as $Category)
                            <tr>                                
                                <td class="table-text">
                                    <div>
                                        <a href="{{ url('category').'/'.$Category->id }}/edit">
                                            {{ $Category->category_name }}
                                        </a>
                                    </div>
                                </td>
                                <td> 
                                	{!! Form::open(['method'=>'DELETE','url'=>url('category/').$Category->id,'class'=>'pull-right'])  !!}

                                	    {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
					                {!! Form::close() !!}
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $Categories->render(); ?>

    @endif




   
</div>
@endsection


