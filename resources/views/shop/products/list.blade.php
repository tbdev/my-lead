<x-mylead>

    @if (session('status'))
        <div class="alert alert-success mt-5">
            {{ session('status') }}
        </div>
    @endif

    <h1 class="text-5xl mt-4">Products list</h1>
        @auth
        <a class="btn btn-primary" href="{{ route('product.new') }}">Add new</a>
        @endauth
    
    <div class="mt-5">
        {{$products->links()}}
    </div>    
        
    @foreach ($products as $product)
        <div class="card mb-2">
            <h5 class="card-header">Product: {{ $product->name }}</h5>
            <div class="card-body">
            <p class="card-text">Desription:  {{ $product->description }}</p>
            
            @auth
            <p>Prices: 
                @forelse($product->prices as $price)
                    {{$price->getPrice()}}$@if (!$loop->last), @endif
                @empty
                    no prices.
                @endforelse
            </p>   

            <p>
                <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn-sm btn-secondary">Edit</a>
                <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn-sm btn-secondary">Delete</a>
            </p>

            @else
            <p>Prices: 
            @if($product->prices->first()->getPrice())
                {{ $product->prices->first()->getPrice() }}$
            @else
                no price.
            @endif

            <p>Login to show all prices avaible.</p>

            @endauth
            
            </div>
        </div>
    @endforeach

    <div class="mt-5">
        {{ $products->links() }}
    </div>

</x-mylead>