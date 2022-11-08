<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Featured Products</h4>
                <div class="underline mb-4"></div>
            </div>


            @forelse ($featuredProducts as $productItem)
               
                        <div class="col-md-2">
                            <div class="product-card">
                                <div class="product-card-img">
                                    <label class="stock bg-danger">New</label>
                                    @if ($productItem->productImages->count() > 0)
                                        <figure class=" img-hover-scale overflow-hidden">
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                                <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                    alt="{{ $productItem->name }}">
                                            </a>
                                        </figure>
                                    @endif
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{ $productItem->brand }}</p>
                                    <h5 class="product-name">
                                        <a
                                            href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                            {{ $productItem->name }}
                                        </a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">${{ $productItem->original_price }}</span>
                                        <span class="original-price">${{ $productItem->selling_price }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                   
            @empty
                <div class="col-md-12">
                    <h2>No Products Available for</h2>
                </div>
            @endforelse

        </div>
        <div class="text-center mt-4">
            <a href="{{ url('collections') }}" class="btn btn-warning px-3">Shop More</a>
        </div>
    </div>
</div>

</div>
