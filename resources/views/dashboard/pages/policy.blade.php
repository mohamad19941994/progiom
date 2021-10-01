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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">@lang('site.pages')</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{route('dashboard.users.index')}}" class="text-muted">@lang('site.pages')</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">@lang('site.edit')</a>
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
                            @lang('site.policy')
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{ route('dashboard.pages.store') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        @include('dashboard.partials._sessions')
                        <div class="card-body">
                            {{--name--}}
                            <div class="form-group">
                                <label>@lang('site.title')<span class="text-danger">*</span></label>
                                <input name="policy_name" type="text" class="form-control" value="{{ $page[0]->policy_name }}" placeholder="@lang('site.title')"/>
                            </div>
                            {{--description--}}
                            <div class="form-group">
                                <label>@lang('site.description')</label>
                                <textarea name="policy_description" class="form-control" id="mytextarea" rows="10" cols="10">{{$page[0]->policy_description}}</textarea>
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
    <!--end::Page Scripts-->
    <script src="https://cdn.tiny.cloud/1/qcr09xadljfdl3rae0j3nmcvr2i1cp414gjvk1reivd25avu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script src="{{ asset('dashboard/assets/plugins/tinymce/tiny.js') }}"></script>
@endsection