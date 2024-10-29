@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="container">
            <h1 class="mb-5 text-center">Inventário</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($stations as $station)
                    @php
                        $strings = ['dark', 'success', 'danger'];
                        $randomKey = array_rand($strings);
                        $randomString = $strings[$randomKey];
                    @endphp
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 p-1">
                        <div class="card border-{{ $randomString }} border-2 shadow bg-body rounded mb-3">    
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $station->title }}</h5>
                                <div class="text">
                                    <span>Status:</span>
                                    <span class="badge rounded-pill text-bg-{{ $randomString }}">{{ $station->status }}</span>
                                </div>
                            </div>                    
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Última coleta</strong>
                                    <div>{{ $station->installation_date }}</div>
                                </li>
                                <li class="list-group-item">
                                    <strong>Horário coleta</strong>
                                    <div>{{ $station->installation_date }}</div>
                                </li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Detalhes</a>
                                <a href="#" class="card-link">Histórico</a>
                            </div>
                        </div>
                    </div>	 
                @endforeach
            </div>		
        </div>
    </div>
@endsection