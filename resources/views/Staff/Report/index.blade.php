<br>
<link rel="stylesheet" href="{{ asset('assets/riktheme/jquery.dataTables.min.css') }}">
<script src="{{ asset('/assets/riktheme/jquery.dataTables.min.js') }}" defer></script>        
        <br>
        <div class="container">
            <nav class="navbar navbar-dark bg-secondary">
                <div class="container text-center">
                    <h4>Product Storage</h4>
                </div>
            </nav>
            <br>
            <table class="table table-bordered table-hover" id="users-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th>Brand</th>
                        <th>Stock</th>
                        <th>Description</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- DataTables -->
        <script type="text/javascript">
             $(document).ready(function () {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url('report/get_storage') }}',
                    columns: [
                        { data: 'no', name:'id', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        { data: 'product_name', name: 'product_name' },
                        { data: 'name', name: 'category' },
                        { data: 'buying_price', name: 'buying_price' },
                        { data: 'selling_price', name: 'selling_price'},
                        { data: 'brand', name: 'brand' },
                        { data: 'stock', name: 'stock' },
                        { data: 'description', name: 'description' }
                    ]
                });
            });
        </script>