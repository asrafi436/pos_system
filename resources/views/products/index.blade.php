@extends('layouts.app')

@section('products')

<div>

    <div class="row product-list mt-5" id="product-container">
        @foreach($products as $product)
            <div class="col-md-4 mb-3 product-card-container" data-type="{{ $product->type }}" 
                 style="display: {{ $product->type === 'Coffee' ? 'block' : 'none' }};">
                <div class="product-card"
                    onclick="addToCart({{ $product->id }}, '{{ $product->name }}', '{{ $product->selling_price }}')">
                    <img src="{{ asset('assets/image/demoImage.png') }}" alt="" height="80px">
                    <p class="mt-2">{{ $product->name }}</p>
                    <p class="text-success">${{ $product->selling_price }}</p>
                </div>
            </div>
        @endforeach
    </div>
    

    <div class="container mt-4">
        <div class="d-flex gap-3 justify-content-start">
            <button class="category-btn active d-flex flex-column" data-category="Coffee">
                <i class="fa-solid fa-mug-hot"></i>
                Coffee
            </button>
            <button class="category-btn d-flex flex-column" data-category="Beverages">
                <i class="fa-solid fa-martini-glass-citrus"></i>
                Beverages
            </button>
            <button class="category-btn d-flex flex-column" data-category="BBQ">
                <i class="fa-solid fa-fire-burner"></i>
                BBQ
            </button>
            <button class="category-btn d-flex flex-column" data-category="Snacks">
                <i class="fa-solid fa-burger"></i>
                Snacks
            </button>
            <button class="category-btn d-flex flex-column" data-category="Desserts">
                <i class="fa-solid fa-ice-cream"></i>
                Desserts
            </button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const buttons = document.querySelectorAll(".category-btn");
            const productContainer = document.getElementById("product-container");

            buttons.forEach(button => {
                button.addEventListener("click", function () {
                    const category = this.getAttribute("data-category");

                    // Update active button class
                    buttons.forEach(btn => btn.classList.remove("active"));
                    this.classList.add("active");

                    fetch(`/products/category/${encodeURIComponent(category)}`)
                        .then(response => response.json())
                        .then(products => {
                            productContainer.innerHTML = "";
                            products.forEach(product => {
                                productContainer.innerHTML += `
                                <div class="col-md-4 mb-3 product-card-container" data-type="${product.type}">
                                    <div class="product-card" onclick="addToCart(${product.id}, '${product.name}', '${product.selling_price}')">
                                        <img src="{{ asset('assets/image/demoImage.png') }}" alt="" height="80px">
                                        <p class="mt-2">${product.name}</p>
                                        <p class="text-success">$${product.selling_price}</p>
                                    </div>
                                </div>`;
                            });
                        })
                        .catch(error => console.error('Error fetching products:', error));
                });
            });
        });

        function addToCart(id, name, price) {
            console.log(`Adding to cart: ID=${id}, Name=${name}, Price=${price}`);
            // Implement your add-to-cart logic here
        }
    </script>

</div>

@endsection
