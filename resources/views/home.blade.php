@extends('layouts.master')

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <template v-if="menu==0">            
                        <example-component></example-component>
                    </template>
                    <template v-if="menu==1">            
                        <cliente-component></cliente-component>
                    </template>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
