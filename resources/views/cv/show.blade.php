@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                           
                        </div>
                    @endif

                   
                  
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>CV</th>
                            <th>metier</th>
                            <th>user</th>
                            <th width="280px">Action</th>
                        </tr>
                       
                        <tr>
                            <td>{{ $cvs->id }}</td>
                            <td ><img src="/images/{{$cvs->fileName}}" height="100" width="100"></td>
                            <td>{{ $cvs->metier->nom }}</td>
                            <td>{{ $cvs->user->name }}</td>
                            <td>
                               
                                <form action="{{ route('destroy') }}" method="POST">
                      
                                    <a class="btn btn-primary" href="{{ route('edit',$cvs->id) }}">Edit</a>
                            
                                    @csrf
                                   
                                   <input hidden type="text" hidden value="{{$cvs->id}}" name="id">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
