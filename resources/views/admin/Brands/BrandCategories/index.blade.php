@extends('admin.master_layout')
@section('title')
<title>{{__('Brand Categoriess')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Brand Categoriess')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Brand Categoriess')}}</div>
            </div>
          </div>

          <div class="section-body">
            <a href="{{ route('admin.create-brand-categories') }}" class="btn btn-primary"><i class="fas fa-plus"></i> {{__('admin.Add New')}}</a>
            <div class="row mt-4">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive table-invoice">
                        <table class="table table-striped" id="dataTable">
                            <thead>
                                <tr>
                                    <th>{{__('admin.SN')}}</th>
                                    <th width="20%">{{__('Image')}}</th>
                                    <th width="10%">{{__('admin.Title')}}</th>
                                    <th width="30%">{{__('admin.Link')}}</th>
                                    <th>{{__('admin.Status')}}</th>
                                    <th>{{__('admin.Action')}}</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($BrandCategories as $index => $service)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td><img class="w_300" src="{{ asset($service->image) }}" alt=""></td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->link }}</td>
                                        <td>
                                            @if($service->isactive == 1)
                                            <a href="javascript:;" onclick="changeStatus({{ $service->id }})">
                                                <input id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="{{__('admin.Active')}}" data-off="{{__('admin.InActive')}}" data-onstyle="success" data-offstyle="danger">
                                            </a>
                                            @else
                                            <a href="javascript:;" onclick="changeStatus({{ $service->id }})">
                                                <input id="status_toggle" type="checkbox" data-toggle="toggle" data-on="{{__('admin.Active')}}" data-off="{{__('admin.InActive')}}" data-onstyle="success" data-offstyle="danger">
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.show-brand-categories',$service->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $service->id }})"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                  @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>

<script>
    function deleteData(id){
        $("#deleteForm").attr("action",'{{ url("admin/delete-brand-categories/") }}'+"/"+id)
    }
    function changeStatus(id){
        $.ajax({
            type:"put",
            data: { _token : '{{ csrf_token() }}' },
            url:"{{url('/admin/brand-categories-status')}}"+"/"+id,
            success:function(response){
                toastr.success(response)
            },
            error:function(err){
                console.log(err);

            }
        })
    }
</script>
@endsection
