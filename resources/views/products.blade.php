
<x-app-layout>
<div class="container mx-auto py-4">
    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">     
    @csrf 
        <div class="flex flex-row">
            <div class="basis-1/2 self-auto"><label for='bestellungsdatum'>Bestellung für den:</label></div>
            <div class="basis-1/2 self-auto"><input required type='date' id='bestellungsdatum' name='bestellungsdatum'></input></div>
        </div>
        
        <h1 class="text-xl font-semibold text-gray-700 uppercase py-2" >Broetchen</h1>
        @foreach ($products as $product)
            @if ($product->group === 'broetchen')       
            <div class="flex flex-row">  
                    <div class="basis-1/2"><h3 class="text-gray-700 ">{{ $product->name }}</h3></div>
                    <div class="basis-1/4"><h3 class="text-gray-700 ">${{ $product->price }}</h3></div>
                    <div class="basis-1/4"><input type="number" min="0" name="quantity[]" class='w-16 text-center h-6 text-gray-800 rounded border border-gray-500'/></div>
                    <input type="hidden" value="{{ $product->name }}" name="name[]">
                    <input type="hidden" value="{{ $product->price }}" name="price[]">
            </div>
            @endif
        @endforeach
        
        <h1 class="text-xl font-semibold text-gray-700 uppercase py-2">Getraenke</h1>
        @foreach ($products as $product)
            @if ($product->group === 'getraenke')
                <div class="flex flex-row">
                    <div class="basis-1/2"><h3 class="text-gray-700 ">{{ $product->name }}</h3></div>
                    <div class="basis-1/4"><h3 class="text-gray-700 ">${{ $product->price }}</h3></div>
                    <div class="basis-1/4"><input type="number" min="0" name="quantity[]" class='w-16 text-center h-6 text-gray-800 rounded border border-gray-500'/></div>
                    <input type="hidden" value="{{ $product->name }}" name="name[]">
                    <input type="hidden" value="{{ $product->price }}" name="price[]">
                </div>
            
            @endif
        @endforeach
        <h1 class="text-xl font-semibold text-gray-700 uppercase py-2">snacks</h1>
        @foreach ($products as $product)
            @if ($product->group === 'snacks')
                <div class="flex flex-row">
                    <div class="basis-1/2"><h3 class="text-gray-700 uppercase">{{ $product->name }}</h3></div>
                    <div class="basis-1/4"><h3 class="text-gray-700 uppercase">${{ $product->price }}</h3></div>
                    <div class="basis-1/4"><input type="number" min="0" name="quantity[]" class='w-16 text-center h-6 text-gray-800 rounded border border-gray-500'/></div>
                    <input type="hidden" value="{{ $product->name }}" name="name[]">
                    <input type="hidden" value="{{ $product->price }}" name="price[]">
                </div>
            
            @endif
        @endforeach
        <div class='flex flex-col items-center justify-center py-4'>
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full">
              <input type='submit' id='submit' value='Bestellen'/>
        </button>
        </div>
    </form>  
</div>
</x-app-layout>

<script>
    const $ = (x) => document.getElementById(x)

    // to prevent ordering too late
    var today = new Date();
    var nextmonday = new Date();
    nextmonday.setDate(today.getDate() + (1 + 7 - today.getDay()) % 7);
    
    if (today.getDay()===1 || today.getDay()===2 || today.getDay()===3) {
        $("bestellungsdatum").min = nextmonday.toLocaleDateString('fr-ca');
    } else {
        $("bestellungsdatum").min = nextmonday.toLocaleDateString('fr-ca');
    }
</script>
