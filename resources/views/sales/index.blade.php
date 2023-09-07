@extends('layout.app')

@section('content')
    <div class="content-wrapper" style="min-height: 442px;">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sales List

            </h1>
            {{-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Customer</a></li>
            <li class="active">Customer List</li>
        </ol> --}}
        </section>
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add new Sale</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('sales.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="item_id">Item:</label>
                                <select class="form-control" id="item_id" name="item_id">
                                    <option value="" disabled selected>Select an item</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}" data-price="{{ $item->price }}">
                                            {{ $item->item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" id="selected_items" name="selected_items" value="">
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" name="price" readonly>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1">
                            </div>

                            <button type="button" class="btn btn-success" id="add-entry">Add Entry</button>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="total_amount">Total Amount:</label>
                                <input type="number" class="form-control" id="total_amount" name="total_amount" readonly>
                            </div>
                            <br>
                            <div class="form-group mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="entries-container">
                                        @foreach ($items as $key => $item)
                                            <tr role="row" class="odd">
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->item }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->arab_name }}</td>
                                                <td>{{ $item->stock }}</td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Sales Entries</button>
                        </form>
                    </div>
                    <!-- /.box -->

                </div>
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sales</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered dataTable no-footer" id="ttable" role="grid"
                                aria-describedby="ttable_info">

                                <thead>
                                    <tr role="row">
                                        <th style="width: 10%">#</th>
                                        <th style="width: 40%">cart Id</th>
                                        <th style="width: 30%">total Amt</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $key => $item)
                                        <tr role="row" class="odd">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->amount }}</td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->


            </div>
    </div>
    </section>

    </div>
@endsection


<script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addEntryButton = document.getElementById('add-entry');
        const entriesContainer = document.getElementById('entries-container');
        const totalAmountInput = document.getElementById('total_amount');
        const selectedItemsInput = document.getElementById('selected_items');

        let selectedItems = [];

        addEntryButton.addEventListener('click', function() {
            const itemSelect = document.getElementById('item_id');
            const itemOption = itemSelect.options[itemSelect.selectedIndex];
            const quantityInput = document.getElementById('quantity');
            const priceInput = document.getElementById('price');

            const item = itemOption.text;
            const quantity = quantityInput.value;
            const price = priceInput.value;
            const totalAmount = (quantity * price).toFixed(2);
            const itemId = itemOption.value;

            if (quantity > 0 && totalAmount >= 0) {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                <td>${item}</td>
                <td>${price}</td>
                <td>${quantity}</td>
                <td>${totalAmount}</td>
            `;
                entriesContainer.appendChild(newRow);

                const currentTotalAmount = parseFloat(totalAmountInput.value) || 0;
                totalAmountInput.value = (currentTotalAmount + parseFloat(totalAmount)).toFixed(2);

                selectedItems.push(itemId);

                const selectedItemsJson = JSON.stringify(selectedItems);

                selectedItemsInput.value = selectedItemsJson;


                itemSelect.selectedIndex = 0;
                quantityInput.value = '';
                priceInput.value = '';
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const itemSelect = document.getElementById('item_id');
        const priceInput = document.getElementById('price');

        itemSelect.addEventListener('change', function() {
            const selectedItem = itemSelect.options[itemSelect.selectedIndex];
            const itemPrice = selectedItem.getAttribute('data-price');

            if (itemPrice) {
                priceInput.value = itemPrice;
            } else {
                priceInput.value = '';
            }
        });
    });
</script>
