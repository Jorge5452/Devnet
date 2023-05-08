<div>

    <livewire:filtrar-vacantes/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-300 mb-12">
                Nuestras vacantes disponibles
            </h3>

            <div class="bg-gray-800 shadow-sm rounded-lg p-6">
                
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5 divide-y divide-gray-200">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extrabold text-white" href=" {{ route('vacantes.show', $vacante->id) }} ">
                                {{ $vacante->titulo }}
                            </a>
                            <p class="text-base text-white"> {{ $vacante->empresa }} </p>
                            <p class="text-xs font-bold text-white"> {{ $vacante->categoria->categoria }} </p>
                            <p class="text-base text-white"> {{ $vacante->salario->salario }} </p>
                            <p class="font-bold text-xs text-white">
                                Ultimo dia para postularse:
                                <span class="font-normal"> {{ $vacante->ultimo_dia }} </span>  
                            </p>

                        </div>

                        <div class="mt-5 md:mt-0">
                            <a 
                            class="bg-white text-black p-3 text-sm uppercase font-bold rounded-lg block text-center" 
                            href=" {{ route('vacantes.show', $vacante->id) }} ">
                                Mas detalles
                            </a>
                        </div>
                    </div>

                @empty
                    <div class="p-3 text-sm text-gray-300 text-center">
                        No hay vacantes disponibles
                    </div>
                @endforelse

            </div>
        </div>  
    </div>
</div>
