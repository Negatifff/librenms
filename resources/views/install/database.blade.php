@extends('layouts.install')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <form id="database-form" class="form-horizontal" role="form" method="post" action="{{ route('install.test-database') }}">
                @csrf
                <div class="form-group">
                    <label for="host" class="col-sm-4 control-label">@lang('install.database.host')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="host" id="host" value="{{ $host ?? 'localhost' }}" placeholder="@lang('install.database.socket_empty')">
                    </div>
                </div>
                <div class="form-group">
                    <label for="port" class="col-sm-4 control-label">@lang('install.database.port')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="port" id="port" value="{{ $port ?? 3306 }}" placeholder="@lang('install.database.socket_empty')">
                    </div>
                </div>
                <div class="form-group">
                    <label for="unix_socket" class="col-sm-4 control-label">@lang('install.database.socket')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="unix_socket" id="unix_socket" value="{{ $unix_socket }}" placeholder="@lang('install.database.ip_empty')">
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-4 control-label">@lang('install.database.username')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="username" id="username" value="{{ $username ?? 'librenms' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">@lang('install.database.password')</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" id="password" value="{{ $password }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="database" class="col-sm-4 control-label">@lang('install.database.name')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="database" id="database" value="{{ $database ?? 'librenms' }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success pull-right">Test</button>
            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#database-form').submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: $('#database-form').attr('action'),
                data: $('#database-form').serialize(),
                success: function (response) {
                    alert(response.message)
                },
            });
        });
    </script>
@endsection
