<form method="post">
    <input name="name" value="{{ $brand->name }}">
    {{ csrf_field() }}
    <button>Edit</button>
</form>