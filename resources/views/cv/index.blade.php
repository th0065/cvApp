@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                           
                        </div>
                    @endif
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('create') }}"> Add a cv</a>
                    </div>
                   
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif


                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nom et Prénom</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Metier</th>
                            <th>Experience Professionnelle</th>
                            <th>Niveau d'étude</th>
                            <th>Téléphone</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($cvs as $cv)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td >{{ $cv->user->name }}</td>
                            <td>{{ $cv->age }}</td>
                            <td>{{ $cv->user->email }}</td>
                            <td>{{ $cv->metier->nom }}</td>
                            <td>{{ $cv->experience }}</td>
                            <td>{{ $cv->niveau }}</td>
                            <td>{{ $cv->telephone }}</td>
                            <td>
                               
                                <form action="{{ route('destroy') }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('show',$cv->id) }}">Show</a>
                      
                                    <a class="btn btn-primary" href="{{ route('edit',$cv->id) }}">Edit</a>
                            
                                    @csrf
                                   
                                   <input hidden type="text" hidden value="{{$cv->id}}" name="id">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    
                    {!! $cvs->links() !!}



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
