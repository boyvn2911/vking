<form method="post">
    <input name="name">
    {{ csrf_field() }}
    <button>Add</button>
</form>