<div class="d-flex flex-wrap align mx-5">

    @foreach ($products as $product)
        <div class="card mt-2 mb-2 size-item">
            <a href="#">
                <div>
                    <img class="size-item" src="{{ asset('product_images/no-image.png') }}" alt="Card image cap" />
                    <div class="card-body">
                        <h6 class="card-title text-success" style="font-size: small">
                            <b>{{ $product->name }}</b>
                        </h6>
                        <p class="card-text">Rp. {{ $product->price }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach

    {{-- Tombol untuk menambah postingan,
         <a class="add-post-btn" href="{{ route('post.create') }}">
        <img class="add-post-img" src="{{ asset('img/add-button.png') }}" alt="add-button icon" width="50" height="50">
    </a> --}}

</div>
