@extends('layout.main')

@section('content')
    <create-page
        rota="{{route('enquete.index')}}"
        csrf_token="{{@csrf_token()}}"
    />
@endsection