@extends('layouts.master')

@section('content')
 <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;"
  action="{{ url('import') }}" class="form-horizontal" 
  method="post" enctype="multipart/form-data">
                @csrf
 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
 
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
 
                <input type="file" name="lista" />
                <button class="btn btn-primary">Import File</button>
        </form>

@endsection