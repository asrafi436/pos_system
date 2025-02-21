<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
        integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
        integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>


    @include('partials.navbar')

    <!-- Page Content -->


    <div class="container mt-4">


        <div class="row">


            <div class="col-md-8">

                <div class="container mt-4 d-flex justify-content-between align-items-center">
                    <span class="add-item" data-bs-toggle="modal" data-bs-target="#addItemModal">+ ADD NEW ITEM</span>

                    <div class="search-bar">
                        <input type="text" placeholder="Search Items here...">
                        <div class="search-icon">
                            <i class="bi bi-search"></i>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addItemModalLabel">Add New Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @include('products.create')
                            </div>
                        </div>
                    </div>
                </div>



                @isset($products)
                    <div class="container">

                        @yield('products') {{-- This will be replaced content from child views --}}

                    </div>
                @endisset


                <div class="d-flex justify-content-end gap-5 mt-5">
                    <button class="btn btn-outline-danger">Cancel Order</button>
                    <button class="btn btn-outline-success">Hold Order</button>
                </div>

            </div>



            <div class="mt-4 col-md-4">
                <div class="checkout-card">
                    <h5 class="text-center">Checkout</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th class="text-center">QTY</th>
                                <th>Price</th>
                            </tr>
                        </thead>


                        <tbody id="cart-items">
                            <!-- Cart items with price will be added dynamically here -->
                        </tbody>

                    </table>
                    <div class="total-section">
                        <div class="d-flex justify-content-between">
                            <span>Sub Total</span>
                            <span id="subtotal-amount">$0.00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Discount</span>
                            <span id="discount-amount">$0.00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tax <span class="text-success">1.5%</span></span>
                            <span id="tax-amount">$0.00</span>
                        </div>
                        <div class="d-flex justify-content-between fw-bold">
                            <span>Total</span>
                            <span id="total-price">$0.00</span>
                        </div>
                    </div>


                    <button class="pay-btn mt-3" id="payButton">Pay (<span id="total-payment">0.00</span>)</button>


                </div>
            </div>

        </div>



        <!-- Toast Notification -->
        <div class="toast-container">
            <div id="paymentToast" class="toast align-items-center text-white bg-success border-0" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        ✅ Payment Successful! Thank you for your purchase.
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"
        integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"
        integrity="sha512-sH8JPhKJUeA9PWk3eOcOl8U+lfZTgtBXD41q6cO/slwxGHCxKcW45K4oPCUhHG7NMB4mbKEddVmPuTXtpbCbFA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>

</html>