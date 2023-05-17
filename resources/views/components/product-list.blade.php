@props(['product'])

<li class="bg-white rounded-lg shadow mb-4">
    <article class="flex">
        <figure>
            <img class="h-48 w-56 object-cover object-center"
                src="{{ Storage::url($product->images->first()->url) }}" alt="">
        </figure>
        <div class="flex-1 py-4 px-6 flex flex-col">
            <div class="flex justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-gray-700">
                        <a href="{{ route('products.show', $product) }}">
                            {{ Str::limit($product->name, 20) }}
                        </a>
                    </h1>
                    <p class="font-bold text-gray-700">US$ {{ $product->price }}</p>
                </div>

                <div class="flex items-center">
                    <ul class="flex text-sm text-yellow-400 mr-1">
                        <li> <i class="fas fa-star"></i> </li>
                        <li> <i class="fas fa-star"></i> </li>
                        <li> <i class="fas fa-star"></i> </li>
                        <li> <i class="fas fa-star"></i> </li>
                        <li> <i class="fas fa-star"></i> </li>
                    </ul>
                    <span class="text-gray-500 text-sm">(24)</span>
                </div>
            </div>
            <div class="mt-auto mb-2">
                <x-danger-enlace href="{{ route('products.show', $product) }}">
                    Mas información
                </x-danger-enlace>
            </div>
        </div>
    </article>
</li>