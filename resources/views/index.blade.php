@extends('layout.main')

@section('content')
    <index-page
        :enquetes="{{$enquetes}}"
        rota="{{route('enquete.index')}}"
        csrf_token="{{@csrf_token()}}"
    />
@endsection