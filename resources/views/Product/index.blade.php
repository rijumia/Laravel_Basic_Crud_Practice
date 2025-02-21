<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons (Optional) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

    <div class="container">
        <div class="row mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="card-title">Product List</h2>
                    <a href="{{route('product.create')}}" class="btn btn-outline-primary p-3">Add New</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td><span class="badge {{$product->status == 1 ? 'bg-success':'bg-danger'}}">{{$product->status == 1 ? 'Active':'Inactive'}}</span></td>
                                    <td>{{date('d M, Y',strtotime($product->created_at))}}</td>
                                    <td>{{$product->updated_at != $product->created_at ? date('d M, Y', strtotime($category->updated_at)) : 'Null'}}</td>
                                    <td>
                                        <a href="{{ route('product.status', $product->id) }}" class="btn btn-sm {{$product->status == 1 ? 'btn-warning':'btn-success'}}">
                                            {{$product->status == 1 ? 'Inactive':'Active'}}
                                        </a>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="{{ route('product.delete', $product->id) }}" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                        </a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <!-- Pagination buttons will be dynamically populated here -->
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (Popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
