<form action="{{url('/search')}}" method="GET">
    <label for="exampleSelect1exampleFormControlSelect1"><strong>Cateogry</strong></label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" name="title" id="defaultCheck2"@if (Request::input('title')) checked @endif>
        <label class="form-check-label" for="defaultCheck2">Include title</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" name="description" id="defaultCheck3"@if (Request::input('description')) checked @endif>
        <label class="form-check-label" for="defaultCheck3">Include description</label>
    </div>
<br>
    <label for="exampleSelect1exampleFormControlSelect1"><strong>Price range</strong></label>
    <div class="form-row">
        <div class="form-group col-md-6">
            <select class="form-control" id="exampleFormControlSelect1" name="price_low">
                <option value="">-</option>
                <option value="1000"@if (Request::input('price_low')=='1000') selected @endif>1000</option>
                <option value="2000"@if (Request::input('price_low')=='2000') selected @endif>2000</option>
                <option value="3000"@if (Request::input('price_low')=='3000') selected @endif>3000</option>
                <option value="4000"@if (Request::input('price_low')=='4000') selected @endif>4000</option>
                <option value="5000"@if (Request::input('price_low')=='5000') selected @endif>5000</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <select class="form-control" id="exampleFormControlSelect2" name="price_high">
                <option value="">-</option>
                <option value="1000"@if (Request::input('price_high')=='1000') selected @endif>1000</option>
                <option value="2000"@if (Request::input('price_high')=='2000') selected @endif>2000</option>
                <option value="3000"@if (Request::input('price_high')=='3000') selected @endif>3000</option>
                <option value="4000"@if (Request::input('price_high')=='4000') selected @endif>4000</option>
                <option value="5000"@if (Request::input('price_high')=='5000') selected @endif>5000</option>
            </select>
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Search">
    <input type="hidden" name="q" value="{{Request::input('q')}}">
</form>