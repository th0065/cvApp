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

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="mb-5 pull-left">
                    <a class="btn btn-info" href="{{ route('home') }}"><-Emplois</a>
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
@if (isset($demande))
<table class="table table-bordered">
    <tr>
    
        <th>Logo</th>
        <th>Entreprise</th>
        <th>Nom </th>
        <th>Categorie</th>
        <th>Details</th>
        <th>Email</th>
        <th>Lieu</th>
    <th width="280px">Action</th>
    </tr>
    @foreach ($demande as $demande)
    <tr>
    
    <td><img src="/images/{{ $demande->emploi->logo }}" height="80" width="80"> </td>
    <td>{{ $demande->emploi->user->name }}</td>
    <td>{{ $demande->emploi->nom }}</td>
    <td>{{ $demande->emploi->metier->nom }}</td>
    <td>{{ $demande->emploi->details }}</td>
    <td>{{ $demande->emploi->user->email }}</td>
    <td>{{ $demande->emploi->lieu }}</td>
    <td>
        <form action="{{ route('delDemande') }}" method="POST">
            @csrf
         <input name="id" hidden id="id" value="{{ $demande->id }}">
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    
       
   
    </td>
    </tr>
    @endforeach
    </table>





    
@endif

@if (isset($postulants))
<table class="table table-bordered">
    <tr>
    
    <th>Nom et Prenom</th>
    <th>Age</th>
    <th>Adresse</th>
    <th>Email</th>
    <th>Téléphone</th>
    <th>Niveau d'étude</th>
    <th>Experience Professionnelle</th>
    <th>Metier de formation</th>
    <th width="280px">Action</th>
    </tr>
    @foreach ($postulants as $pos)
    <tr>
    
    <td>{{ $pos->user->name }}</td>
    <td>{{ $pos->cvs->age }}</td>
    <td>{{ $pos->cvs->adresse }}</td>
    <td>{{ $pos->user->email }}</td>
    <td>{{ $pos->cvs->telephone }}</td>
    <td>{{ $pos->cvs->niveau }}</td>
    <td>{{ $pos->cvs->experience }}</td>
    <td>{{ $pos->cvs->metier->nom }}</td>
    <td>
        <form action="{{ route('delDemande') }}" method="POST">
            @csrf
         <input name="id" hidden id="id" value="{{ $pos->id }}">
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
       
            <a class="btn btn-success"  href="{{route('aceptDemande',$pos->user_id)  }}">Embaucher</a>
        
    
       
   
    </td>
    </tr>
    @endforeach
    </table>





    

@endif
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
