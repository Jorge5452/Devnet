<div class=" p-5 mt-10 flex flex-col justiy-center items-center">
    <h3 class="text-center text-white text-2xl font-bold my-4 ">Postular Vacante</h3>

    @if(session()->has('mensaje'))
        <div class="bg-green-500 font-bold p-3 w-full my-5 max-w-sm text-center text-white mx-auto">
            {{session('mensaje')}}
        </div>
    @else
        <form wire:submit.prevent='postularme' class="w-96 mt-5" action="">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum')" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full" />
            </div>

            @error('cv')
                <span class="text-red-500"> <livewire:mostrar-alerta :message="$message"/> </span>
            @enderror

            <x-primary-button class="my-5">
                {{ __('Postular') }}
            </x-primary-button>
        </form>
    @endif
</div>
