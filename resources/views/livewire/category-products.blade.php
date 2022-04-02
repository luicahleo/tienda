<div wire:init="loadPosts">

    {{-- {{$category}} --}}

    @if (count($products))
    <div class="glider-contain">
        <ul class="glider">
            @foreach ( $products as $product)

            <li class="bg-white rounded-lg shadow  {{ $loop->last ? '' : 'mr-4'}}">

                <article>
                    <figure>
                        <img src="{{ Storage::url($product->images->first()->url )}}" alt="">

                    </figure>

                    <div class="px-6 py-4">

                        <h1 class="text-lg font-semibold">
                            <a href=""> {{Str::limit($product->name, 20)}}</a>
                        </h1>

                        <p class="font-bold text-trueGray-700">
                            US$ {{$product->price}}
                        </p>
                    </div>

                </article>

            </li>
            @endforeach

        </ul>

        <button aria-label="Previous" class="glider-prev">«</button>
        <button aria-label="Next" class="glider-next">»</button>
        <div role="tablist" class="dots"></div>
    </div>

    @else
    {{-- aqui viene el spiner --}}

    <div class="flex items-center justify-center h-48 mb-4 bg-white border border-gray-100 rounded-lg shadow-xl">
        <div class="w-10 h-10 duration-300 border-2 border-indigo-500 rounded animate-spin ease"></div>
    </div>
    @endif
</div>