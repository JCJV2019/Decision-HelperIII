@props(['questions', 'userAuth'])

@extends('layouts.mainTemplate')

@section('head')
    @vite('resources/css/app.css')
@endsection

@section('navigation')
    <x-navigation/>
@endsection

@section('main')
    <x-question-list :questions="$questions" :userAuth="$userAuth">
    </x-question-list>
@endsection

@section('scripts')
    <script src="{{ asset('storage/js/funciones.js')}}"></script>
@endsection
