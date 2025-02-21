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

        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        
</head>

<body>


    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <span class="menu-icon">&#9776;</span>
            <a class="navbar-brand ms-2" href="#">Business Automation Ltd</a>

            <div class="ms-auto user-profile text-white">
                @include('layouts.navigation')
            </div>
        </div>
    </nav>

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
                                    <form id="addItemForm" method="POST"">
                                        @csrf
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Product Type</label>
                                        <select class="form-control" required>
                                            <option value="">Select Type</option>
                                            <option value="Beverage">Beverage</option>
                                            <option value="Food">Food</option>
                                            <option value="Snack">Snack</option>
                                            <option value="coffee">Coffee</option>
                                            <option value="Desserts">Desserts</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Purchase Price</label>
                                        <input type="number" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Selling Price</label>
                                        <input type="number" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Total Sold Quantity</label>
                                        <input type="number" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100">Add Item</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row product-list mt-5">
                    <div class="col-md-4 mb-3">
                        <div class="product-card">
                            <img src="./image/coffee1.jpg" alt="" height="100px" srcset="">
                            <p class="mt-2">Costa Coffee</p>
                            <p class="text-success">$7.99</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="product-card">
                            <img src="./image/smoothie.png" alt="" height="100px" srcset="">
                            <p class="mt-2">Mocha/Hot Chocolate</p>
                            <p class="text-success">$9.99</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="product-card">
                            <img src="./image/coffee2.png" alt="" height="100px" srcset="">
                            <p class="mt-2">Costa Caramel Latte Coffee</p>
                            <p class="text-success">$5.54</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="product-card">
                            <img src="./image/coffee3.jpg" alt="" height="100px" srcset="">
                            <p class="mt-2">Costa Coffee</p>
                            <p class="text-success">$7.99</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="product-card">
                            <img src="./image/smoothie1.png" alt="" height="100px" srcset="">
                            <p class="mt-2">Mocha/Hot Chocolate</p>
                            <p class="text-success">$9.99</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="product-card">
                            <img src="./image/smoothie2.png" alt="" height="100px" srcset="">
                            <p class="mt-2">Costa Caramel Latte Coffee</p>
                            <p class="text-success">$5.54</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="product-card">
                            <img src="./image/coffee2.png" alt="" height="100px" srcset="">
                            <p class="mt-2">Costa Coffee</p>
                            <p class="text-success">$7.99</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="product-card">
                            <img src="./image/tea2.png" alt="" height="100px" srcset="">
                            <p class="mt-2">Milk tas</p>
                            <p class="text-success">$9.99</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="product-card">
                            <img src="./image/tea1.png" alt="" height="100px" srcset="">
                            <p class="mt-2">Green tea</p>
                            <p class="text-success">$5.54</p>
                        </div>
                    </div>
                </div>

                <div class="container mt-4">
                    <div class="d-flex gap-3 justify-content-start">
                        <button class="category-btn active">
                            <img src="https://cdn-icons-png.flaticon.com/512/590/590836.png" alt="Coffee">
                            Coffee
                        </button>
                        <button class="category-btn">
                            <img src="https://cdn-icons-png.flaticon.com/512/1046/1046786.png" alt="Beverages">
                            Beverages
                        </button>
                        <button class="category-btn">
                            <img src="https://cdn-icons-png.flaticon.com/512/857/857681.png" alt="BBQ">
                            BBQ
                        </button>
                        <button class="category-btn">
                            <img src="https://cdn-icons-png.flaticon.com/512/2914/2914876.png" alt="Snacks">
                            Snacks
                        </button>
                        <button class="category-btn">
                            <img src="https://cdn-icons-png.flaticon.com/512/1046/1046785.png" alt="Desserts">
                            Desserts
                        </button>
                    </div>
                </div>


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
                        <tbody>
                            <tr>
                                <td><i class="bi bi-trash text-danger"></i> Risus Fringilla</td>
                                <td class="text-center">
                                    <div class="qty-control">
                                        <button class="qty-btn">-</button>
                                        <span>1</span>
                                        <button class="qty-btn">+</button>
                                    </div>
                                </td>
                                <td>$22.00</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-trash text-danger"></i> Commodo Fusce</td>
                                <td class="text-center">
                                    <div class="qty-control">
                                        <button class="qty-btn">-</button>
                                        <span>2</span>
                                        <button class="qty-btn">+</button>
                                    </div>
                                </td>
                                <td>$40.00</td>
                            </tr>
                            <tr>
                                <td><i class="bi bi-trash text-danger"></i> Lorem Pharetra</td>
                                <td class="text-center">
                                    <div class="qty-control">
                                        <button class="qty-btn">-</button>
                                        <span>2</span>
                                        <button class="qty-btn">+</button>
                                    </div>
                                </td>
                                <td>$32.00</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="total-section">
                        <div class="d-flex justify-content-between">
                            <span>Sub Total</span>
                            <span>$94.00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Discount</span>
                            <span>$20</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tax <span class="text-success">1.5%</span></span>
                            <span>$1.41</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold">
                            <span>Total</span>
                            <span>$75.41</span>
                        </div>
                    </div>

                    <button class="pay-btn mt-3" id="payButton">Pay ($85.50)</button>

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






            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"
                integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"
        integrity="sha512-sH8JPhKJUeA9PWk3eOcOl8U+lfZTgtBXD41q6cO/slwxGHCxKcW45K4oPCUhHG7NMB4mbKEddVmPuTXtpbCbFA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])

            <script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>

</html>