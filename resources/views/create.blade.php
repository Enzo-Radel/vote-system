@extends('layout.main')

@section('content')
    @if ($errors->any())
    <create-page
        rota="{{route('enquete.index')}}"
        :errors="{{$errors}}"
        csrf_token="{{@csrf_token()}}"
    />
    @else
    <create-page
        rota="{{route('enquete.index')}}"
        :errors="{}"
        csrf_token="{{@csrf_token()}}"
    />
    @endif
@endsection