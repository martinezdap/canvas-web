<div class="container py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-label value="Nombre de contacto"/>
                <x-input 
                        wire:model.defer="contact"
                        class="w-full" 
                        type="text" 
                        placeholder="Ingrese el nombre de la persona que recibirá el prodúcto"/>
                <x-input-error for="contact"/>
            </div>

            <div>
                <x-label value="Telefono de contacto"/>
                <x-input 
                        wire:model.defer="phone"
                        class="w-full" 
                        type="text" 
                        placeholder="Ingrese un numero de telefono de contacto"/>
                <x-input-error for="phone"/>
            </div>
        </div>

        <div x-data="{ envio_type: @entangle('envio_type') }">
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envios</p>

            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4">
                <input x-model="envio_type" type="radio" value="1" name="envio_type" id="" class="text-gray-600">
                <span class="ml-2 text-gray-700">
                    Recojo en tienda (Calle falsa 123) 
                </span>
                <span class="font-semibold text-gray-700 ml-auto">
                    Gratis
                </span>
            </label>
    
            <div class="bg-white rounded-lg shadow">
                <label class="px-6 py-4 flex items-center">
                    <input x-model="envio_type" type="radio" value="2" name="envio_type" id="" class="text-gray-600">
                    <span class="ml-2 text-gray-700">
                        Envio a domicilio 
                    </span>
                </label>

                <div class="px-6 pb-6 grid grid-cols-2 gap-6" :class="{ hidden : envio_type != 2 }">
                    {{-- Departamentos --}}
                    <div>
                        <x-label value="Departamento" class="pb-2"/>
                        <select class="form-control w-full" wire:model="department_id">
                            <option value="" disabled selected>Seleccione un Departamento</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>

                        <x-input-error for="department_id"/>
                    </div>

                    {{-- Ciudades --}}
                    <div>
                        <x-label value="Ciudad" class="pb-2"/>
                        <select class="form-control w-full" wire:model="city_id">
                            <option value="" disabled selected>Seleccione una Ciudad</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="city_id"/>
                    </div>

                    {{-- Districtos --}}
                    <div>
                        <x-label value="Districto" class="pb-2"/>
                        <select class="form-control w-full" wire:model="district_id">
                            <option value="" disabled selected>Seleccione un Districto</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="district_id"/>
                    </div>

                    <div>
                        <x-label value="Dirección" class="pb-2"/>
                        <x-input class="w-full" wire:model="adress" type="text"></x-input>
                        <x-input-error for="adress"/>
                        
                    </div>

                    <div class="col-span-2">
                        <x-label value="Referencia" class="pb-2"/>
                        <x-input class="w-full" wire:model="references" type="text"></x-input>
                        <x-input-error for="references"/>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <x-button 
                wire:loading.attr="disabled"
                wire:target="create_order"
                class="mt-6 mb-4" 
                wire:click="create_order">
            Continuar con la compra
            </x-button>
        </div>

        <hr>

        <p class="text-sm text-gray-700 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, nemo odit numquam unde magnam ad autem, reprehenderit incidunt cupiditate consequatur illo adipisci! Voluptatem quod a quaerat, mollitia expedita adipisci quae? <a href="#" class="font-semibold text-orange-500">Politicas y privacidad.</a></p>
    </div>

    <div class="col-span-2">

        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover object-center mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">{{$item->name}}</h1>
    
                            <div class="flex">
                                <p>Cant: {{$item->qty}}</p>
    
                                @isset($item->options['color'])
                                    <p class="mx-2">- Color: {{__($item->options['color'])}}</p>
                                @endisset
    
                                @isset($item->options['size'])
                                    <p class="mx-2">{{ __($item->options['size']) }}</p>
                                @endisset
                            </div>
    
                            <p>USD {{$item->price}}</p>
                        </article>
                    </li>
                @empty
                    <li class="text-center text-gray-700">
                        <p class="py-6 px-4">No tiene agregado ningun item en el carrito</p>
                    </li>
                @endforelse
            </ul>

            <hr class="mt-4 mb-3">

            <div class="text-gray-700">
                <p class="flex justify-between">Subtotal <span class="font-semibold">{{ Cart::subtotal() }} USD</span></p>
                
                <p class="flex justify-between">
                    Envio 
                    <span class="font-semibold">
                        @if ($envio_type == 1 || $shipping_cost == 0)
                            Gratis
                        @else
                            {{ $shipping_cost }} USD
                        @endif
                    </span>
                </p>

                <hr class="mt-4 mb-3">

                <p class="flex justify-between font-semibold"> 
                    <span class="text-lg">Total</span> 
                    @if ($envio_type == 1)
                        {{ Cart::subtotal() }} 
                    @else
                        {{ Cart::subtotal() + $shipping_cost }} USD
                    @endif
                </p>
            </div>
        </div>

    </div>
</div>
