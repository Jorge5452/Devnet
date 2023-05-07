<form action="md:w-1/2 py-6 bg-gray-500" wire:submit.prevent='CrearVacante'>

    <div class="py-5">
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Titulo Vacante" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />


        @error('titulo')
            <span class="text-red-500"> <livewire:mostrar-alerta :message="$message"/> </span>
        @enderror

    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select wire:model="salario" id="salario" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">

            <option value="">Seleccione</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}"> {{$salario->salario}} </option>
            @endforeach
        </select>

        @error('salario')
            <span class="text-red-500"> <livewire:mostrar-alerta :message="$message"/> </span>
        @enderror
        
    </div>

    <div class="py-5">
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select wire:model="categoria" id="categoria" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">

            <option value="">Seleccione Categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}"> {{$categoria->categoria}} </option>
            @endforeach

        </select>

        @error('categoria')
            <span class="text-red-500"> <livewire:mostrar-alerta :message="$message"/> </span>
        @enderror

    </div>

    <div class="py-5">
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="" />
        
        @error('empresa')
            <span class="text-red-500"> <livewire:mostrar-alerta :message="$message"/> </span>
        @enderror

    </div>
    
    <div class="py-5">
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" placeholder="" />
        
        @error('ultimo_dia')
            <span class="text-red-500"> <livewire:mostrar-alerta :message="$message"/> </span>
        @enderror

    </div>

    <div class="py-5">
        <x-input-label for="ultimo_dia" :value="__('Descripcion Puesto')" />
        <textarea wire:model="descripcion" placeholder="Descripcion General del puesto" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"></textarea>

        @error('descripcion')
            <span class="text-red-500"> <livewire:mostrar-alerta :message="$message"/> </span>
        @enderror

    </div>


    <div class="py-5">
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />
        

        <div class="my-5 w-96">
            @if ($imagen)
                <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen Vacante">
            @endif
        </div>

        @error('imagen')
            <span class="text-red-500"> <livewire:mostrar-alerta :message="$message"/> </span>
        @enderror

    </div>

    <x-primary-button class="w-full justify-center mt-4">
        Crear Vacante
    </x-primary-button>

</form>