@extends('layout.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Rombel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('studentGroups.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    <form action="/studentGroups" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="search rombel" name="search">
        <button class="btn btn-primary" type="submit">search</button>
    </div>
    </form>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Rombel</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($studentGroups as $studentGroup)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $studentGroup->rombel }}</td>
            <td>
                <form action="{{ route('studentGroups.destroy',$studentGroup->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('studentGroups.edit',$studentGroup->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $studentGroups->links() !!}
        
@endsection