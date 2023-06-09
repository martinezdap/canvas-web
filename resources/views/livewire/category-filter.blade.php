<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $category->name }}</h1>

            <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200">
                <i class="fas fa-border-all p-3 text-gray-500 cursor-pointer {{ $view == 'grid' ? 'text-orange-500' : '' }}"
                    wire:click="$set('view', 'grid')"></i>
                <i class="fa-solid fa-list p-3 text-gray-500 cursor-pointer {{ $view == 'list' ? 'text-orange-500' : '' }}"
                    wire:click="$set('view', 'list')"></i>
            </div>
        </div>
    </div>

    <div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

            <aside>
                <h1 class="font-semibold text-center mb-2">Subcategorías</h1>
                <ul class="divide-y divide-gray-200">
                    @foreach ($category->subcategories as $subcategory)
                        <li class="py-2 text-sm">
                            <a wire:click="$set('subcategoria', '{{ $subcategory->name }}')"
                                class="cursor-pointer hover:text-orange-500 capitalize {{ $subcategoria == $subcategory->name ? 'text-orange-500 font-semibold' : '' }}">
                                {{ $subcategory->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <h1 class="font-semibold text-center mt-4 mb-2">Marcas</h1>
                <ul class="divide-y divide-gray-200">
                    @foreach ($category->brands as $brand)
                        <li class="py-2 text-sm">
                            <a wire:click="$set('marca', '{{ $brand->name }}')"
                                class="cursor-pointer hover:text-orange-500 capitalize {{ $marca == $brand->name ? 'text-orange-500 font-semibold' : '' }}">
                                {{ $brand->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <x-button class="mt-4" wire:click="limpiar">Eliminar filtros</x-button>
            </aside>

            <div class="md:col-span-2 lg:col-span-4">
                @if ($view == 'grid')
                    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach ($products as $product)
                            <li class="bg-white rounded-lg shadow">
                                <article>
                                    <figure>
                                        <img class="h-48 w-full object-cover object-center"
                                            src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                    </figure>
                                    <div class="py-4 px-6">
                                        <h1 class="text-lg font-semibold ">
                                            <a href="{{ route('products.show', $product) }}">
                                                {{ Str::limit($product->name, 10) }}
                                            </a>
                                        </h1>
                                        <p class="font-bold text-trueGray-700">US$ {{ $product->price }}</p>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <ul>
                        @foreach ($products as $product)
                            
                            <x-product-list :product="$product"></x-product-list>

                        @endforeach
                    </ul>
                @endif

                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
