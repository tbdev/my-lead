<x-mylead>
    
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h1>Edit Product</h1>
           
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('product.update') }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" class="form-control" id="product_id" name="product_id" placeholder="" value="{{ $product->id }}" />

                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Product name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ old('name') ?? $product->name}}" required />

                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="name" class="form-label">Product description:</label>
                        <textarea type="text" class="form-control mh-100" id="name" name="description" required>{{ old('description') ?? $product->description}}</textarea>

                        @error('description')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="prices" class="form-label">Product prices:</label>
                            <select name="prices[]" id="prices" multiple class="form-control mh-100" size="6">
                                @foreach($prices as $price)
                                    <option value="{{ $price->id }}" 
                                        @if(in_array($price->id, $selected)) selected="selected"@endif>
                                        {{ $price->getPrice() }}$
                                    </option>
                                @endforeach
                            </select>
                            
                            @error('prices')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary mt-2">Save</button>
                <a class="btn btn-light mt-2" href="{{ route('home') }}">Back</button>
            </form>
        </div>      
    </div>      
                
</x-mylead>