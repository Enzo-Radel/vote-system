@extends('layout.main')

@section('content')
    @if ($errors->any())
    <edit-page
        :enquete="{{$enquete}}"
        rota="{{route('enquete.index')}}"
        :errors="{{$errors}}"
        csrf_token="{{@csrf_token()}}"
    />
    @else
    <edit-page
        :enquete="{{$enquete}}"
        rota="{{route('enquete.index')}}"
        :errors="{}"
        csrf_token="{{@csrf_token()}}"
    />
    @endif
@endsection