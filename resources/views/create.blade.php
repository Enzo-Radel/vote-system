@extends('layout.main')

@section('content')
    <create-page
        rota="{{route('index')}}"
        csrf_token="{{@csrf_token()}}"
    />
@endsection