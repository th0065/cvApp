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

                    <a class="btn btn-primary" href="{{ route('home') }}">Emplois</a>

                  
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
                       
                        <tr>
                            <td>{{ $cvs->id }}</td>
                            <td >{{ $cvs->user->name }}</td>
                            <td>{{ $cvs->age }}</td>
                            <td>{{ $cvs->user->email }}</td>
                            <td>{{ $cvs->metier->nom }}</td>
                            <td>{{ $cvs->experience }}</td>
                            <td>{{ $cvs->niveau }}</td>
                            <td>{{ $cvs->telephone }}</td>
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
