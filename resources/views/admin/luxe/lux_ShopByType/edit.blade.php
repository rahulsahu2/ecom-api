@extends('admin.master_layout')
@section('title')
<title>{{__('Shop by Type')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{__('Shop by Type')}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">{{__('Shop by Type')}}</div>
            </div>
          </div>
​
          <div class="section-body">
          <a href="{{ route('admin.lux-shop-by-type.index') }}" class="btn btn-primary"><i class="fas fa-list"></i> {{__('Shop by Types')}}</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        @if ($shopconcern)
                            <form action="{{ route('admin.lux-shop-by-type.update',$shopconcern->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="">{{__('Image')}}</label>
                                        <div>
                                            <img class="w_300" src="{{ asset($shopconcern->image) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="">{{__('admin.New Image')}}</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>
                                   
                                    <div class="form-group col-12">
                                        <label>{{__('admin.Title')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="title" value="{{ $shopconcern->title }}" class="form-control">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{__('Link')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="link" value="{{ $shopconcern->link }}" class="form-control">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                        <select name="isactive" class="form-control">
                                            <option {{$shopconcern->isactive == 1 ? 'selected':''}} value="1">{{__('admin.Active')}}</option>
                                            <option {{$shopconcern->isactive == 0 ? 'selected':''}} value="0">{{__('admin.Inactive')}}</option>
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
                            <form action="{{ route('admin.lux-shop-by-type.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="">{{__('admin.New Image')}}</label>
                                        <input type="file" name="image" class="form-control-file">
                                    </div>
                                    
                                    <div class="form-group col-12">
                                        <label>{{__('admin.Title')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{__('Link')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="link" value="" class="form-control">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>{{__('admin.Status')}} <span class="text-danger">*</span></label>
                                        <select name="isactive" class="form-control">
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
