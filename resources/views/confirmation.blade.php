<x-app-layout>
    <div class="grid flex items-center justify-center">
        <div class='text-xl mb-8 mt-4'>
            <span>Ihre Bestellung ist angekommen!</span>
        </div>
        @foreach ($orders as $order)
            <div>
                <span class="text-gray-800">Bestellung für den: {{ date('d.m.Y', strtotime($order->orderDate)) }}</span>
            </div>       
            <div>
                @foreach(explode(';', $order->order) as $item)
                    <p class="text-gray-600">{{ $item }}</p>
                @endforeach
            </div>
            <div class="text-gray-900 mb-8 mt-4">        
                <p>Bitte <e>{{ $order->total }}€</e> an Joshua weitergeben.</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
