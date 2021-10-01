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
                    <form method="post" id="dynamic_form">
                        @csrf
                        <div class="card-body">
                            <span id="result"></span>
                            @if($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif
                            <!--category-->
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

                            <!--start_time-->
                            <div class="form-group">
                                <label>@lang('site.start_time')<span class="text-danger">*</span></label>
                                <input name="start_time" type="datetime-local" class="form-control"  placeholder="@lang('site.start_time')"/>
                            </div>

                            <table class="table table-bordered table-striped" id="user_table">
                                <thead>
                                <tr>
                                    <th width="35%">@lang('site.name')</th>
                                    <th width="35%">@lang('site.url')</th>
                                    <th width="5%">@lang('site.actions')</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>

                        </div>
                        <div class="card-footer">
                            <button type="submit" id="save" class="btn btn-primary mr-2">@lang('site.submit')</button>
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
        $(document).ready(function(){

            var count = 1;

            dynamic_field(count);

            function dynamic_field(number)
            {
                html = '<tr>';
                html += '<td><input type="text" name="name[]" class="form-control" /></td>';
                html += '<td><input type="text" name="url[]" class="form-control" /></td>';
                if(number > 1)
                {
                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">حذف</button></td></tr>';
                    $('tbody').append(html);
                }
                else
                {
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success">إضافة</button></td></tr>';
                    $('tbody').html(html);
                }
            }

            $(document).on('click', '#add', function(){
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function(){
                count--;
                $(this).closest("tr").remove();
            });

            $('#dynamic_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:'{{ route("dynamic-field.insert") }}',
                    method:'post',
                    data:$(this).serialize(),
                    dataType:'json',
                    beforeSend:function(){
                        $('#save').attr('disabled','disabled');
                    },
                    success:function(data)
                    {
                        console.log(data);
                        if(data.error)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<p>'+data.error[count]+'</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                        }
                        else
                        {
                            dynamic_field(1);
                            $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                        }
                        $('#save').attr('disabled', false);
                    },



                })
            });

        });
    </script>

@endsection