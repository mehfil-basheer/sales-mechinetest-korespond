@extends('layout.app')

@section('content')
    <div class="content-wrapper" style="min-height: 442px;">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                item List

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
                            <h3 class="box-title">Add new item</h3>
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
                        <form role="form" action="{{ route('items.store') }}" method="POST" enctype=""
                            autocomplete="off">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Item Name<span class="red-colour">*</span></label>

                                    <input type="text" class="form-control" id="" value=""
                                        placeholder="Enter Category Name" name="item" required="">
                                </div>

                                <div class="form-group">
                                    <label for="number">price<span class="red-colour">*</span></label>

                                    <input type="text" class="form-control" id="" value=""
                                        placeholder="Enter Category Name" name="price" required="">
                                </div>
                                <div class="form-group">
                                    <label for="number">Stock<span class="red-colour">*</span></label>

                                    <input type="numeric" class="form-control" id="" value=""
                                        placeholder="Enter Category Name" name="stock" required="">
                                </div>
                                <div class="form-group">
                                    <label for="name">arab name<span class="red-colour">*</span></label>

                                    <input type="text" class="form-control" id="" value=""
                                        placeholder="Enter Category Name" name="arab_name" required="">
                                </div>




                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->

                </div>
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Items</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered dataTable no-footer" id="ttable" role="grid"
                                aria-describedby="ttable_info">

                                <thead>
                                    <tr role="row">
                                        <th style="width: 10%">#</th>
                                        <th style="width: 40%">item</th>
                                        <th style="width: 30%">price</th>
                                        <th style="width: 20%">arab name</th>
                                        <th style="width: 20%">stock</th>

                                    </tr>
                                </thead>
                                <tbody>
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
{{-- <script>
    $(document).ready(() => {


        $('.dataTable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false
        });
    });

    const deletecustomer = (id) => {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: 'DELETE',
                        url: "{{ url('customer') }}/" + id,
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                        },
                        success: (res) => {
                            if (res == 1) {
                                swal("The Menu has been deleted!", {
                                    icon: "success",
                                }).then(() => {
                                    location.reload();
                                });
                            } else if (res == 0) {
                                swal("You can't delete the Menu!", {
                                    icon: "error",
                                });
                            }
                        }
                    });

                } else {
                    swal("The Menu is safe!");
                }
            });
    };
</script> --}}
