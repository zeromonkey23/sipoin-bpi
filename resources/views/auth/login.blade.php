@extends('template')

@section('main')
<div class="container">
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Form Masuk</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}
					<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
						<label for="username" class="col-md-4 control-label">Nama Pengguna/NIK:</label>

						<div class="col-md-6">
							<input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

							@if ($errors->has('username'))
							<span class="help-block">
								<strong>{{ $errors->first('username') }}</strong>
							</span>
							@endif
						</div>
					</div>

					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password" class="col-md-4 control-label">Kata Sandi:</label>

						<div class="col-md-6">
							<input id="password" type="password" class="form-control" name="password" required>

							@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-8 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
								Masuk
							</button>
						</form>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>

@endsection
