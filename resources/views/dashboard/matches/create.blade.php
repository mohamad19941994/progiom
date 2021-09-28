@extends('layouts.dashboard.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">@lang('site.matches')</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{route('dashboard.matches.index')}}" class="text-muted">@lang('site.matches')</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">@lang('site.add')</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
            @include('dashboard.partials._errors')
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            @lang('site.matches')
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('dashboard.matches.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            {{--category--}}
                            <div class="form-group">
                                <label for="categories">@lang('site.categories')
                                    <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control" id="categories">
                                    <option value="0">@lang('site.all_categories')</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--name--}}
                            <div class="form-group">
                                <label>@lang('site.name')<span class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control"  placeholder="@lang('site.name')"/>
                            </div>
                            {{--start_time--}}
                            <div class="form-group">
                                <label>@lang('site.start_time')<span class="text-danger">*</span></label>
                                <input name="start_time" type="datetime-local" class="form-control"  placeholder="@lang('site.start_time')"/>
                            </div>
                            {{--url--}}
                            <div class="form-group">
                                <label>@lang('site.url')<span class="text-danger">*</span></label>
                                <input name="url" type="text" class="form-control"  placeholder="@lang('site.url')"/>
                            </div>

                            <div id="kt_repeater_1">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label text-right">المباريات:</label>
                                        <div data-repeater-list="" class="col-lg-10">

                                            <div data-repeater-item="" class="form-group row align-items-center" style="">
                                                <div class="col-md-3">
                                                    <label>رابط:</label>
                                                    <input type="text" name="first_name" class="form-control" placeholder="ادخل رابط المباراة">
                                                    <div class="d-md-none mb-2"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>الاسم:</label>
                                                    <input type="text" name="last_name" class="form-control" placeholder="ادخل اسم المباراة">
                                                    <div class="d-md-none mb-2"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                                        <i class="la la-trash-o"></i>حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-lg-2 col-form-label text-right"></label>
                                    <div class="col-lg-4">
                                        <a href="javascript:;" onclick="i++" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                            <i class="la la-plus"></i>إضافة مباراة جديدة</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">@lang('site.submit')</button>
                            <button type="reset" class="btn btn-secondary">@lang('site.reset')</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@section('scripts')
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('dashboard/assets/js/pages/crud/forms/widgets/form-repeater.js')}}"></script>
    <!--end::Page Scripts-->

    <script>
        var i = 1;

        console.log(i);
    </script>

@endsection