@props(['itemsPositives','itemsNegatives','question', 'userAuth'])

@extends('layouts.mainTemplate')

@section('head')
    @vite('resources/css/app.css')
@endsection

@section('navigation')
    <x-navigation/>
@endsection

@section('main')
    <x-items-question
        :itemsPositives="$itemsPositives"
        :itemsNegatives="$itemsNegatives"
        :question="$question"
        :userAuth="$userAuth">
    </x-items-question>
@endsection

@section('scripts')
    <script src="{{ asset('storage/js/funciones.js')}}"></script>
@endsection
