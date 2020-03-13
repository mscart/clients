@extends('admin.app')
@section('page_title') @lang('clients::clients.name') &bull; @lang('clients::clients.add_client') @endsection
@section('pagetitle') @lang('clients::clients.add_client') @endsection
@section('breadcrumb')
    <span class="breadcrumb-item active">@lang('clients::clients.add_client')</span>
@endsection


@section('content')
    <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data" class="multi_validate">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">@lang('clients::clients.add_client')</h5>
            </div>
            <div class="card-body">


            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="reset" class="btn btn-light" id="reset">@lang('admin/general.reset') <i class="icon-reload-alt ml-2"></i></button>
                    <button type="submit" class="btn btn-primary ml-3">@lang('admin/general.submit') <i class="icon-paperplane ml-2"></i></button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('custom_js')
    <script src="{{ asset('backend/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{asset('backend/js/plugins/forms/selects/select2.min.js')}}"></script>

    <script src="{{ asset('backend/vendor/mscart/clients/assets/js/create.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/forms/validation/localization/messages_'.App::getLocale().'.js') }}" type="text/javascript"></script>

@endsection
