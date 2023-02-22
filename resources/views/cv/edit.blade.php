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


 
                <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                     <div class="row">
                        <input type="text" hidden value=" {{$cvs->id}}"  name="id"  >

                                <input type="text" hidden value=" {{ Auth::user()->id }}"  name="user_id"  >
                               
                          
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Metier:</strong>
                                <select class="form-select" aria-label="Default select example" name="metier_id">
                                    <option selected value="{{ $cvs->metier->id }}" >{{$cvs->metier->nom}}</option>
                                    @foreach ($metier as $met)
                                    <option value="{{ $met->id }}">{{ $met->nom }}</option>
                                    @endforeach
                                  </select>                         
                                </div>
                        </div>
                       
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Age:</strong>
                               
                                <input type="number" value="{{ $cvs->age }}" name="age" class="form-control" >
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Adresse:</strong>
                               
                                <input type="text" value="{{ $cvs->adresse }}" name="adresse" class="form-control" >
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Téléphone:</strong>
                               
                                <input type="text" name="telephone"  value="{{ $cvs->telephone }}" class="form-control" placeholder="777678956">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Niveau d'étude:</strong>
                                <select class="form-select" aria-label="Default select example" name="niveau">
                                    <option selected>{{ $cvs->niveau }}</option>
                                   
                                    <option value="Bac">Bac</option>
                                    <option value="Bac+1">Bac+1</option>
                                    <option value="Bac+2">Bac+2</option>
                                    <option value="Bac+3">Bac+3</option>
                                    <option value="Bac+4">Bac+4</option>
                                    <option value="Bac+5">Bac+5</option>
                                  
                                </select>    
                                
                           </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Experience:</strong>
                               
                                <input type="text" name="experience" value="{{ $cvs->experience }}" class="form-control" placeholder="séparées avec des virgules">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                     
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
