<link rel="stylesheet" type="text/css" href="/css/app.css">
<br>
<div class="container">
    <h1>Edit customer details</h1>

    <form action="/customers/{{ $customer->id }}" method="post">
        @method('PATCH')
        @include('customer.form')
        <button type="submit" class="btn btn-primary">Save customer</button>
    </form>
</div>
