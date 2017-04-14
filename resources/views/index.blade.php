@extends('layouts.main')

@section('content')

    @foreach($domains as $domain)
        @foreach($domain as $item)
            {{ $item->title }}
            <br>
            {{ $item->text }}
            <br>
            {{ $item->domain_name }}
            <br><br>
        @endforeach
    @endforeach
@endsection

