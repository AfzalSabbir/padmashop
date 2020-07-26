@extends('backend.layouts.master')

@section('fav_title', 'Category List')

@section('styles')
  <style>
    .action{
      min-width: 70px;
    }
    .table th, .table td{
      vertical-align: middle;
    }
    .drag-sort-enable>tr{
      cursor: move;
    }
    .table tr.drag-sort-active {
      border: 1px solid #4ca1af;
    }
    .table tr.drag-sort-active>*{
      visibility: hidden;
    }
  </style>
@endsection

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-pie-chart"></i> {{ __('backend/category.category_management') }}</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg fa-fw"></i><a href="{{ route('admin.home') }}">{{ __('backend/default.dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('backend/category.category') }}</li>
  </ul>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6"><h2><i class="fa fa-table"></i> {{ __('backend/category.category') }}</h2></div>
          <div class="col-md-6">
            <div class="btn-group float-right">
              <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{ __('backend/default.add_new') }}</a>
              <a id="dragSorting" class="btn btn-warning" title="Enable Drag Sorting"><i class="fa fa-arrows" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        <div id="alert"></div>
        @php
        $permissions = \App\Models\Menu::orderBy('id', 'desc')->where('url', substr(url()->current(), 1+strlen(url('/'))))
        ->orWhere('url', substr(url()->current(), strlen(url('/'))))->first();
        $bodyMenu = \App\Models\Role::where('role', Auth::guard('admin')->user()->admin_role)->first();
        @endphp
        {{-- <div class="toggle-table-column">
          <strong>{{ __('backend/default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>SL</b></a> | 
          <a href="#" class="toggle-vis" data-column="1"><b>Name</b></a> | 
          <a href="#" class="toggle-vis" data-column="2"><b>Image</b></a> | 
          <a href="#" class="toggle-vis" data-column="2"><b>Status</b></a> | 
          <a href="#" class="toggle-vis" data-column="9"><b>Action</b></a>
        </div> --}}
        
        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th>SL</th>
              <th>Name</th>
              <th>Image</th>
              <th>Status</th>
              <th class="action">Action</th>
            </thead>

            <tbody id="drag_sortable">
              @foreach ($categories as $key => $row)
              <tr class="{{ $row->status == 0 ? 'deactive_':'' }}" data-id="{{ $row->id }}" data-position="{{ $row->position }}">
                <td> {{ $key+1 }} </td>
                <td> {{ $row->title_en }} <br> {{ $row->title_bn }} </td>
                <td> <img width="50" src="{{ asset($row->image) }}" alt=""> </td>
                <td> 
                  {{  $row->status=='1' ? 'Active':'Deactive' }}
                </td>
                <td class="action">
                  <div class="btn-group">
                    @foreach($permissions->submenus as $key => $permission)
                      @if(\App\Models\Menu::checkBodyMenu($permission->id, $bodyMenu->in_body))
                        @if($key == 0)
                          <a href="{{ route($permission->route, $row->slug) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        @else
                          {{-- <button class="btn btn-danger" onClick="deleteMethod({{ json_encode($row->slug) }})" role="button"><i class="fa fa-minus-circle"></i></button> --}}
                          <button class="btn btn-danger" onClick="deleteMethod({{ json_encode($row->slug) }})"><i class="fa fa-trash"></i></button>
                        @endif
                      @endif
                    @endforeach
                  </div>
                </tr>
                @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection


@section('scripts')
  <script>
    /*drag and dropt start*/
    function enableDragSort(listClass) {
      const sortableLists = document.getElementsByClassName(listClass);
      Array.prototype.map.call(sortableLists, (list) => {enableDragList(list)});
    }

    function enableDragList(list) {
      Array.prototype.map.call(list.children, (item) => {enableDragItem(item)});
    }

    function enableDragItem(item) {
      item.setAttribute('draggable', true)
      item.ondrag = handleDrag;
      item.ondragend = handleDrop;
    }

    function handleDrag(item) {
      const selectedItem = item.target,
            list = selectedItem.parentNode,
            x = event.clientX,
            y = event.clientY;
      
      selectedItem.classList.add('drag-sort-active');
      let swapItem = document.elementFromPoint(x, y) === null ? selectedItem : document.elementFromPoint(x, y);
          swapItem = swapItem.parentNode;
      
      
      if (list === swapItem.parentNode) {
        swapItem = swapItem !== selectedItem ? swapItem : swapItem;
        list.insertBefore(selectedItem, swapItem);
      }
    }

    function handleDrop(item) {
      item.target.classList.remove('drag-sort-active');
      
      let dragSortEnable         = document.querySelector(".drag-sort-enable"),
          dragSortEnableChildren = dragSortEnable.children,
          i                      = 0,
          position_and_id        = {};
          
      
      for(i; i<dragSortEnableChildren.length; i++){
        dragSortEnableChildren[i].setAttribute('data-position', i);

        /*get and set position and id*/
        position_and_id[i]=dragSortEnableChildren[i].dataset.id;

        /*formate table sirial*/
        console.log(dragSortEnableChildren[i].firstElementChild.innerHTML = (i+1));
      }

      /*pass position and id to ajax to store in database*/
      updatePosition(position_and_id);
    }




    /*ajax using for updating position of the category*/
    function updatePosition(obj) {
        objJSON = JSON.stringify(obj);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {}
        }
        xmlhttp.open("GET", "{{ route('admin.category.editPosition') }}"+'/'+objJSON, true);
        xmlhttp.send();
    }
    /*drag and dropt start*/
    let dragSorting   = document.querySelector('#dragSorting'),
        drag_sortable = document.querySelector('#drag_sortable');

    dragSorting.addEventListener('click',function(){
      if(drag_sortable.classList.contains('drag-sort-enable') === false){
        this.innerHTML = '<i class="fa fa-check"></i>';
        this.style.cssText="color:#fff;";
        this.classList.remove('btn-warning');
        this.classList.add('btn-success');
        drag_sortable.classList.add('drag-sort-enable');
        enableDragSort('drag-sort-enable');
      }else{
        location.reload();
      }

      document.getElementById('alert').classList.add('alert');
      document.getElementById('alert').classList.add('alert-warning');
      document.getElementById('alert').innerHTML = "Drag <b>Category</b> to sort it.";
    });
  </script>
@endsection