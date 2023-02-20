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


 
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                     <div class="row">
                        
                                <input type="text" hidden value=" {{ Auth::user()->id }}"  name="user_id"  >
                               
                          
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                               
                                <select class="form-select" aria-label="Default select example" name="metier_id">
                                    <option selected>Metier</option>
                                    @foreach ($metier as $met)
                                    <option value="{{ $met->id }}">{{ $met->nom }}</option>
                                    @endforeach
                                  </select>                         
                                </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>fileName:</strong>
                               

                                <input type="file" name="fileName" class="form-control" placeholder="image">
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
