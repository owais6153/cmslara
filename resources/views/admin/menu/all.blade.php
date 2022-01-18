@foreach($menus as $menuIndex => $menu) 
<div class="parent-menu">
        <form class="user" action="{{route('roles.store')}}" method="POST" autocomplete="off">
               @csrf
               <input type="hidden" name="type" value="{{request('type')}}">
<div class="card menu-card mb-2 parent">
    <a href="#menu{{$menu->id}}" class="d-block card-header py-3 collapsed " data-toggle="collapse" role="button" aria-expanded="false" aria-controls="menu{{$menu->id}}">
        <h6 class="m-0 font-weight-bold text-primary">{{$menu->title}}</h6>
    </a>
    <div class="collapse" id="menu{{$menu->id}}" style="">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control title" name="title" value="{{$menu->title}}">
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url"  name="link" value="{{$menu->link}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="order">Parent</label>
                <select class="form-control" name="parent_id">
                    <option value="">Select Parent</option>
                    @foreach($all_menus as $option)
                        @if($option->id != $menu->id)
                            <option {{($option->id == $menu->parent_id) ? 'selected' : '' }} value="{{$option->id}}">{{$option->title}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="order">Order</label>
                <input type="number"  name="order" value="{{$menu->order}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="attr_class">Custom Class</label>
                <input type="text"  name="attr_class" value="{{$menu->attr_class}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="attr_id">Custom ID</label>
                <input type="text"  name="attr_id" value="{{$menu->attr_id}}" class="form-control">
            </div>
             <p class="mt-4"><a href="javascript:void(0)" class="btn btn-danger btn-sm">Delete Link</a>
                <a href="javascript:void(0)" class="btn btn-primary btn-sm">Update Link</a>
             </p>
        </div>
    </div>
</div>
</form>
@foreach ($menu->children as $childIndex => $children)
        <form class="user" action="{{route('roles.store')}}" method="POST" autocomplete="off">
               @csrf
               <input type="hidden" name="type" value="{{request('type')}}">
<div class="card menu-card mb-2 child">
    <a href="#menu{{$children->id}}" class="d-block card-header py-3 collapsed " data-toggle="collapse" role="button" aria-expanded="false" aria-controls="menu{{$children->id}}">
        <h6 class="m-0 font-weight-bold text-primary">{{$children->title}}</h6>
    </a>
    <div class="collapse" id="menu{{$children->id}}" style="">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control title" name="title" value="{{$children->title}}">
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url"  name="link" value="{{$children->link}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="order">Parent</label>
                <select class="form-control" name="parent_id">
                    <option value="">Select Parent</option>
                    @foreach($all_menus as $option)
                        @if($option->id != $children->id)
                            <option {{($option->id == $children->parent_id) ? 'selected' : '' }} value="{{$option->id}}">{{$option->title}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="order">Order</label>
                <input type="number"  name="order" value="{{$children->order}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="attr_class">Custom Class</label>
                <input type="text"  name="attr_class" value="{{$children->attr_class}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="attr_id">Custom ID</label>
                <input type="text"  name="attr_id" value="{{$children->attr_id}}" class="form-control">
            </div>
            <p class="mt-4"><a href="javascript:void(0)" class="btn btn-danger btn-sm">Delete Link</a>
                <a href="javascript:void(0)" class="btn btn-primary btn-sm">Update Link</a>
            </p>
        </div>
    </div>
</div>
</form>
@endforeach
</div>
@endforeach


























