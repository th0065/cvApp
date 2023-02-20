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
    
    <th>Emploi</th>
    <th>Details</th>
    <th>Entreprise</th>
    <th width="280px">Action</th>
    </tr>
    @foreach ($demande as $demande)
    <tr>
    
    <td>{{ $demande->emploi->nom }}</td>
    <td>{{ $demande->emploi->details }}</td>
    <td>{{ $demande->emploi->user->name }}</td>
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
    <th>Cv</th>
    <th>Job</th>
    <th width="280px">Action</th>
    </tr>
    @foreach ($postulants as $pos)
    <tr>
    
    <td>{{ $pos->user->name }}</td>
    <td><img src="/images/{{$pos->cvs->fileName}}" height="100" width="100"></td>
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
