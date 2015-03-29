@extends('theme::app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li><a href="{{ url('/') }}" class="glyphicon glyphicon-home"></a></li>
				<li><a href="{{ url('/account') }}">{{ trans('pandaac/account::login.breadcrumbs.account') }}</a></li>
				<li class="active">{{ trans('pandaac/account::login.breadcrumbs.login') }}</li>
			</ol>

			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('pandaac/account::login.title') }}</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							{!! trans('theme::error.message') !!}<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/account') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-2 control-label">{{ trans('pandaac/account::login.form.account') }}</label>
							<div class="col-md-10">
								<input type="passowrd" class="form-control" name="account" value="{{ old('account') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">{{ trans('pandaac/account::login.form.password') }}</label>
							<div class="col-md-10">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-10 col-md-offset-2">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> {{ trans('pandaac/account::login.form.remember') }}
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-10 col-md-offset-2">
								<button type="submit" class="btn btn-primary">{{ trans('pandaac/account::login.form.button') }}</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">{{ trans('pandaac/account::login.lost-password') }}</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
