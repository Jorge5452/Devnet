<div>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


        @forelse($vacantes as $vacante)
        <div class="p-6 dark:text-gray-100 md:flex md:justify-between md:items-center">
            <div class="leading-10">
                <a href=" {{ route('vacantes.show', $vacante->id) }} " class="text-xl font-bold">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-sm text-gray-600 font-bold"> {{$vacante->empresa}} </p>
                <p class="text-sm text-gray-500 font-bold"> Ultimo dia: {{ $vacante->ultimo_dia }}
            </div>

            <div class="flex flex-col md:flex-row items-stretch gap-3  mt-5 md:mt-0">
                <a class="bg-white py-2 px-4 rounded-lg text-black text-xs font-bold uppercase text-center" href="{{ route('candidatos.index', $vacante) }}">
                    {{ $vacante->candidatos->count() }}
                    Candidatos
                </a>
                <a class="bg-blue-900 py-2 px-4 rounded-lg text-black text-xs font-bold uppercase text-center" href="{{ route('vacantes.edit', $vacante->id) }}">
                    Editar
                </a>
                <button 
                wire:click="$emit('mostrarAlerta', {{ $vacante->id }} )"
                class="bg-red-600 py-2 px-4 rounded-lg text-black text-xs font-bold uppercase text-center" >
                    Eliminar
                </button>
            </div>
        </div>


        @empty
        <p class="p-3 text-center font-bold text-white">No hay vacantes</p>

        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: 'Estas seguro?',
                text: "Esta accion no puede deshacerse!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminalo!',
                cancelButtonText: 'No, Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    //eliminar vacante

                    Livewire.emit('eliminarVacante', vacanteId)

                    Swal.fire(
                        'Eliminado!',
                        'La vacante ha sido eliminada.',
                        'success'
                    )
                }
            })
        })
    </script>

@endpush