@props(['puntuacionP','puntuacionN','semaforo', 'question'])

@extends('layouts.mainTemplate')

@section('head')
    @vite('resources/css/app.css')
@endsection

@section('navigation')
    <x-navigation/>
@endsection

@section('main')
    <x-question-tip
        :puntuacionP=$puntuacionP
        :puntuacionN=$puntuacionN
        :semaforo=$semaforo
        :question=$question>
    </x-question-tip>
@endsection

@section('scripts')
    <script src="{{ asset('storage/js/funciones.js')}}"></script>
@endsection
