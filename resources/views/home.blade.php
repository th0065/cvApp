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

@if (isset($role))
@if ( $role->role_id==1)

<div class="pull-right">
    <a class="btn btn-success" href="{{ route('emploi.create',Auth::user()->id) }}"> Ajouter une annonce</a>
</div>
<table class="table table-bordered">
    <tr>
        
        <th>Nom</th>
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($emploi as $emploi)
    <tr>
        
        <td>{{ $emploi->nom }}</td>
        <td>{{ $emploi->details }}</td>
        <td>
           
            <form action="{{ route('destroy.emploi') }}" method="POST">
  
                <a class="btn btn-primary" href="{{ route('edit.emploi',$emploi->id) }}">Edit</a>
                <a href="{{ route('postulants',$emploi->id) }}" class="btn btn-info">  Postulants   </a>

                @csrf
               
               <input hidden type="text" hidden value="{{$emploi->id}}" name="id">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

 @else
</div>  

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>

<th>Nom</th>
<th>Details</th>
<th>Entreprise</th>
<th width="280px">Action</th>
</tr>
@foreach ($emplois as $emploi)
<tr>

<td>{{ $emploi->nom }}</td>
<td>{{ $emploi->details }}</td>
<td>{{ $emploi->user->name }}</td>
<td>

   
    <form action="{{ route('postule.emploi') }}" method="POST">
        @csrf
        <input hidden value="{{ $emploi->id }}" name="emploi_id">
        <input hidden value="{{Auth::user()->id }}" name="user_id">
        @if (isset($cvs))
        <input hidden value="{{$cvs->id}}" name="cvs_id">
        @endif
        

       
       
      
        <button type="submit" class="btn btn-info">Postuler</button>
    </form>
</td>
</tr>
@endforeach
</table> </div>
@endif
@else

<a href="{{ route('role',Auth::user()->id) }}" class="dropdown-item"> Rôle   </a>


@endif
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
