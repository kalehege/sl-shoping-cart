<tr>
    <td class="hidden pb-4 md:table-cell">
        <a href="#">
            <img src="https://dummyimage.com/80x80" class="w-20 rounded" alt="Thumbnail">
        </a>
    </td>
    <td>
        <span>
            <p class="mb-2 md:ml-4">{{ $product->name }}</p>
            <a href="{{ route('add-to-cart', ['product' => $product, 'count' => 0]) }}" class="text-gray-700 md:ml-4">
                <small>(Remove item)</small>
            </a>
        </span>
    </td>
    <td class="text-center">
        <div class="inline-flex">
            <a href="{{ route('add-to-cart', ['product' => $product, 'count' => $count - 1]) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">-</a>
            <span class="bg-gray-200 p-2">{{ $count }}</span>
            <a href="{{ route('add-to-cart', ['product' => $product, 'count' => $count + 1]) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">+</a>
        </div>
    </td>
    <td class="hidden text-right md:table-cell">
        <span class="text-sm lg:text-base font-medium">
            <x-money :price="$product->price" />
        </span>
    </td>
    <td class="text-right">
        <span class="text-sm lg:text-base font-medium">
            <x-money :price="$product->priceFor($count)" />
        </span>
    </td>
</tr>
