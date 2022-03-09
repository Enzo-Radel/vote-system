@extends('layout.main')

@section('content')
    <edit-page
        :enquete="{{$enquete}}"
        rota="{{route('enquete.index')}}"
        csrf_token="{{@csrf_token()}}"
    />
@endsection