<form id="filter" action="#">
    <div class="sidebar-widget price_range range mb-30">
        <div class="widget-header position-relative mb-20 pb-10">
            <h5 class="widget-title mb-10">Fill by color</h5>
            <div class="bt-1 border-color-1"></div>
        </div>
        <div class="list-group">
            <div class="list-group-item mb-10 mt-10">
                <label class="fw-900">Tag</label><br>
                <select class="form-control select-active" name="tag" value="{{session('tag')}}">
                    <option value="{{session('tag')}}"> {{session('tag')}}</option>
                    <option value="Default"> Default</option>
                    @foreach($tags as $tag)
                        <option value="{{$tag->name}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="list-group-item mb-10 mt-10">
                <label class="fw-900">Color</label><br>
                <select class="form-control select-active" name="color">
                    <option value="{{session('color')}}"> {{session('color')}}</option>
                    <option value="Default"> Default</option>
                    @foreach($details as $detail)
                        <option value="{{$detail->value}}">{{$detail->value}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <a onclick="document.getElementById('filter').submit()" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
    </div>
</form>
