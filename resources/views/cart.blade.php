<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="text-gray-600 body-font">
            <div class="container px-5 mx-auto">
                <div class="overflow-auto bg-white rounded px-8 py-4 shadow">
                    <table class="w-full text-sm lg:text-base">
                        <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left">Product</th>
                            <th class="text-center pl-5 lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                            </th>
                            <th class="text-right">Unit price</th>
                            <th class="text-right">Total price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart->products() as $product)
                            <x-product-row :product="$product" />
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex flex-row-reverse pl-4 mt-12">
                    <a href="{{ route('checkout') }}" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Checkout</a>
                    <span class="self-center mr-6 font-bold">
                        Total: <span class="italic"><x-money :price="$cart->total()" /></span>
                    </span>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
