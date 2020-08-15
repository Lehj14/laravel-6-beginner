<div class="form-group">
    <label for="name">Name</label>
    <input name="name" class="form-control" type="text" value="{{ old('name') ?? $customer->name }}" placeholder="Name">
    <p style="color: red">@error('name') {{ $message }} @enderror </p>
</div>

<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') ?? $customer->email }}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <p style="color: red">@error('email') {{ $message }} @enderror </p>
</div>
@csrf
