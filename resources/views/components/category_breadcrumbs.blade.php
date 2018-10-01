<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    @foreach($category->getAncestors() as $item)
    <li class="breadcrumb-item"><a href="/nav/{{$item->name}}">{{$item->name}}</a></li>
    @endforeach
    <li class="breadcrumb-item active">{{$category->name}}</li>
</ol>
