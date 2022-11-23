@extends('layouts.mainTemplate')

@section('head')
    @vite('resources/css/app.css')
@endsection

@section('navigation')
    <x-navigation/>
@endsection

@section('main')
    <main class="container">
        <h1 class="m-3 text-center font-light text-6xl">DECISION HELPER</h1>

        <div class="logo mb-2"></div>

        <div class="grid grid-col-1">
            <div class="grid grid-rows-2 place-items-center md:flex md:justify-center gap-x-3">
                <div class="rounded overflow-clip shadow-2xl border w-72 h-96 md:w-80 lg:w-2/5 lg:h-72 mb-10">
                    <div class="p-9">
                        <div class="text-3xl font-medium mb-3">Como funciona</div>
                        <p class="text-gray-700 text-base mb-3">
                            <strong>Decision Helper</strong> es una herramienta sencilla que te ayudará a tomar las dificiles decisiones de la vida :).
                        </p>
                        <p class="text-gray-700 text-base mb-3">
                            Escribe los aspectos positivos, los negativos y puntualos de 1 a 4.
                        </p>
                        <p class="text-gray-700 text-base mb-3">
                            Cuando creas haber terminado pide el consejo de <strong>Decision Helper</strong>
                        </p>
                    </div>
                </div>

                <div class="rounded overflow-hidden shadow-2xl border w-72 h-96 md:w-80 lg:w-2/5 lg:h-72 mb-10">
                    <div class="p-9">
                        <div class="text-3xl font-medium mb-3">Aspectos Positivos</div>
                        <p class="text-gray-700 text-base mb-3">
                            Todos aquellos aspectos o valores que creas que puedan influenciar positivamente el resultado de tu elección.
                        </p>
                        <p class="text-gray-700 text-base mb-3">
                            Acuerdate de puntuar cada aspecto de menor a mayor 1-4.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-col-1">
            <div class="grid grid-rows-2 place-items-center md:flex md:justify-center  gap-x-3">
                <div class="rounded overflow-hidden shadow-2xl border w-72 h-96 md:w-80 lg:w-2/5 lg:h-72 mb-10">
                    <div class="p-9">
                        <div class="text-3xl font-medium mb-3">Aspectos Negativos</div>
                        <p class="text-gray-700 text-base mb-3">
                            Todos aquellos aspectos o valores que creas que puedan influenciar negativamente el resultado de tu elección.
                        </p>
                        <p class="text-gray-700 text-base mb-3">
                            Acuerdate de puntuar cada aspecto de menor a mayor 1-4.
                        </p>
                    </div>
                </div>

                <div class="rounded overflow-hidden shadow-2xl border w-72 h-96 md:w-80 lg:w-2/5 lg:h-72 mb-10">
                    <div class="p-9">
                        <div class="text-3xl font-medium mb-3">Consejo</div>
                        <p class="text-gray-700 text-base mb-3">
                            Cuando quieras saber el consejo de <strong>Decision Helper</strong> nuestro
                            algoritmo de IA calculará un Match Learning específico y te aconsejará mediante colores
                            (<span class="text-green-600">Verde</span>, <span class="text-amber-300">Ambar</span>, <span class="text-red-600">Rojo</span>) que dejes en manos
                            de <strong>Decision Helper</strong> tan importantes decisiones.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('storage/js/funciones.js')}}"></script>
@endsection
