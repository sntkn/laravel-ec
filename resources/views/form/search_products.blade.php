<form method="GET" action="{{ url('/search') }}" class="form-inline">
    <div class="form-group">
        <label for="search_products">Search</label>
        <input id="search_products" type="text" class="form-control" name="q" value="{{ Request::input('q') }}" placeholder="input keyword...">
    </div>
</form>