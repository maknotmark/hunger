<x-app-layout>
    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
    <div class="p-6 flex bg-gray-600 text-gray-200 space-x-2">
        <h1>Bestellungshistorie</h1>
    </div>
    @foreach ($orders as $order)
        <div class="p-6 flex space-x-2">
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-gray-800">Bestellung für den: {{ date('d.m.Y', strtotime($order->orderDate)) }}</span>
                    </div>
                    <div>
                        <small class="ml-2 text-sm text-gray-600">Bestellt am: {{ $order->created_at->format('j M Y, g:i a') }}</small>
                    </div>
                </div>
                <div>
                @foreach(explode(';', $order->order) as $item)
                    <p class="text-gray-600">{{ $item }}</p>
                @endforeach
                </div>
                <p class="mt-4 text-lg text-gray-900">Gesamt: {{ $order->total }}€</p>
            </div>
        </div>
    @endforeach
    </div>
</x-app-layout>
