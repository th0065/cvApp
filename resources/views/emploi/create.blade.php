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

                    @if (isset($error))
                    <div class="alert alert-success" role="alert">
                        {{ $error }}
                       
                    </div>
                    @endif

                <div class="pull-left">
                    <a class="btn btn-info" href="{{ route('home') }}">Emplois Ajoutés</a>
                </div>
               
             
              @if (isset($emploi))
              <form action="{{ route('emploi.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="nom">Nom de l'emploi</label>
                  <input type="text" hidden value="{{Auth::user()->id}}"  id="user_id" name="user_id"  >
                  <input type="text" hidden value="{{$emploi->id}}"  id="id" name="id"  >

                  <input type="text" class="form-control" value="{{ $emploi->nom}}" id="nom" name="nom">
                </div>
                <div class="form-group m-2">
                  <label for="metier_id">Categorie</label>
                        <select class="form-select" aria-label="Default select example" name="metier_id">
                          <option selected value="{{ $emploi->metier_id }}">{{ $emploi->metier->nom }}</option>
                            @foreach ($metier as $met)
                            <option value="{{ $met->id }}">{{ $met->nom }}</option>
                            @endforeach
                          </select>                         
                </div>
                <div class="form-group m-2">
                  <label for="lieu">Adresse</label>
                 
                  <input type="text" class="form-control" value="{{ $emploi->lieu}}"  id="lieu" name="lieu"  >
                  
                </div>

                <div class="form-group m-2">
                 
                 <img src="/images/{{ $emploi->logo }}" class="m-2" height="80" width="80" alt="logo">
                  <input type="file" class="form-control"  id="logo" name="logo"  >
                  

                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" value="{{ $emploi->details}}" class="col-sm-12 form-control" ></textarea>
                  </div>
               
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              @else
              <form action="{{ route('emploi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group m-2">
                  <label for="nom">Nom</label>
                  <input type="text" hidden value="{{Auth::user()->id}}"  id="user_id" name="user_id"  >
                  <input type="text" class="form-control"  id="nom" name="nom"  >
                  
                </div>
                <div class="form-group m-2">
                  <label for="metier_id">Categorie</label>
                        <select class="form-select" aria-label="Default select example" name="metier_id">
                            
                            @foreach ($metier as $met)
                            <option value="{{ $met->id }}">{{ $met->nom }}</option>
                            @endforeach
                          </select>                         
                       
                 
                </div>
                <div class="form-group m-2">
                  <label for="lieu">Adresse</label>
                 
                  <input type="text" class="form-control"  id="lieu" name="lieu"  >
                  
                </div>
                <div class="form-group m-2">
                  <label for="logo">Logo(Non obligatoire)</label>
                 
                  <input type="file" class="form-control"  id="logo" name="logo"  >
                  
                </div>

                <div class="form-group m-2">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" class="col-sm-12 form-control" ></textarea>
                  </div>
               
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
      
              @endif
               

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
