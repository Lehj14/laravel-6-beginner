<link rel="stylesheet" type="text/css" href="/css/app.css">
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<div class="container">

    <br>
    <div><a href="/customers" class="btn btn-dark"> Back </a></div>
    <br>
    <div class="card">
        <div class="card-header">
            <h1>Customer details</h1>
        </div>
        <div class="card-body">
            <div><strong>Name:</strong> {{ $customer->name }}</div>
            <div><strong>Email:</strong> {{ $customer->email }}</div>

        </div>

        <div class="card-footer">
            <a class="btn btn-primary" href="/customers/{{ $customer->id }}/edit"><i class="fas fa-edit"></i> Edit</a>

            <a class="btn btn-danger" href="{{ route('customers.destroy', $customer) }}"> <i class="fas fa-trash-alt"></i> Delete</a>
        </div>
    </div>
</div>
