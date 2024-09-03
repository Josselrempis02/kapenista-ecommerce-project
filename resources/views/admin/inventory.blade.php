@extends('layouts.admin')

@section('content')
<section class="dashboard-container">
    <div class="dashboard-text">
        <h1>Inventory</h1>
        <h3>Home > Inventory</h3>
    </div>

    <section class="dashboard-container">
        <div class="recent-orders p-3 border bg-light fw-bold" style="border-radius: 10px;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">Inventory List</h4>
                <button class="btn btn-link text-dark p-0">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr class="orders-header">
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="recent-orders-tr">
                        <td>Cafe latte</td>
                        <td>Cold Coffee</td>
                        <td>26</td>
                        <td>₱110.40</td>
                        <td>
                            <button 
                        class="button-edit" 
                        data-bs-toggle="modal" 
                        data-bs-target="#editModal"
                        data-product="Cafe latte"
                        data-stock="26"
                        data-price="₱110.40">
                        <i class="lni lni-pencil-alt alt"></i>
                              </button>
                        </td>
                    </tr>
                    <!-- Repeat similar rows for other products -->
                </tbody>
            </table>
        </div>
    </section>
</section>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="product-name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product-name" name="product_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var product = button.getAttribute('data-product');
            var stock = button.getAttribute('data-stock');
            var price = button.getAttribute('data-price');
            
            var modalTitle = editModal.querySelector('.modal-title');
            var modalProductInput = editModal.querySelector('#product-name');
            var modalStockInput = editModal.querySelector('#stock');
            var modalPriceInput = editModal.querySelector('#price');

            modalTitle.textContent = 'Edit ' + product;
            modalProductInput.value = product;
            modalStockInput.value = stock;
            modalPriceInput.value = price;

            // Set form action (if necessary)
            // var form = editModal.querySelector('form');
            // form.action = '/your-edit-route/' + productId;
        });
    });
</script>
@endsection
