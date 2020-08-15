<link rel="stylesheet" type="text/css" href="/css/app.css">
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<div class="container">
    <h1>Customer</h1>

    <div class="mb-2">
        <a class="btn btn-primary" href="/customers/create">Add new customer</a>
        <a class="btn btn-primary" id="active" href="/customers?active=1">Active customer </a>
        <a class="btn btn-primary" href="/customers?active=0">Inactive customer </a>
    </div>


    <table id="basic" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @if(!isset($_GET['active']))
            @php $active = 1 @endphp
        @elseif (isset($_GET['active']))
            @php $active = $_GET['active'] @endphp
        @endif
        <input type="hidden" data-fetch-route="{{ route('any.data', ['active' => $active]) }}" id="schoolFetch">
        {{--@forelse($customers as $customer)
            <tr>
                <td><strong><a href="/customers/{{ $customer->id }}">{{ $customer->name }}</a></strong></td>
                <td> {{ $customer->email }}</td>
            </tr>
            @empty
                <p>No customer available</p>
        @endforelse--}}
        </tbody>
    </table>
</div>


<script>
    $(function() {
        $('#basic').DataTable({
            processing: true,
            serverSide: true,
            ajax: $("#schoolFetch").attr('data-fetch-route'),
            columns: [
                { data: 'name', name: 'name', render:function(data, type, row){
                        return "<a href='/customers/"+ row.id +"'>" + row.name + "</a>"
                    }},
                { data: 'email', name: 'email' },
            ]
        });
    });
</script>
