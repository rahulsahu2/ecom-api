@extends('admin.master_layout')
@section('title')
<title>{{__('Best Offer For You')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Best Offer For You')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Best Offer For You')}}</div>
            </div>
          </div>
​
          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        @if ($shopconcern)
                            <form action="{{ route('admin.best-offer-products.update',$shopconcern->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                
                                    <div class="form-group col-12">
                                        <label>{{__('admin.Id')}} <span class="text-danger">*</span></label>
                                        <select name="product_id" class="form-control">
                                            <option value="" disabled>Select Product</option>
                                            @foreach($products as $p)
                                            <option {{$p->id == $shopconcern->product_id ? 'selected' : ''}}  value="{{$p->id}}">{{$p->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                                    <div class="form-group col-12">
                                        <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option {{$shopconcern->status == 1 ? 'selected':''}} value="1">{{__('admin.Active')}}</option>
                                            <option {{$shopconcern->status == 0 ? 'selected':''}} value="0">{{__('admin.Inactive')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary">{{__('admin.Update')}}</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('admin.best-offer-products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>{{__('Product')}} <span class="text-danger">*</span></label>
                                        <select name="product_id" class="form-control">
                                            <option value="" disabled selected>Select Product</option>
                                            @foreach($products as $p)
                                            <option value="{{$p->id}}">{{$p->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control">
                                            <option value="1">{{__('admin.Active')}}</option>
                                            <option value="0">{{__('admin.Inactive')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary">{{__('admin.Save')}}</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>
@endsection
