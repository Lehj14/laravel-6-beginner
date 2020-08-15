<link rel="stylesheet" type="text/css" href="/css/app.css">
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<br>
<div class="container">
    <h1>Add new customer</h1>

    <form action="/customers" method="post">
        @include('customer.form')
        <button type="submit" class="btn btn-primary">Add customer</button>
    </form>
</div>
