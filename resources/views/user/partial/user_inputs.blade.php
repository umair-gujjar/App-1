{{-- users --}}
@if (!isset($user) || \Auth::user()->hasRole(['person','admin']))

	<div class="form-group" ng-show="role != 'business' || role != 'nonprofit'">

		<div class="col-md-4 col-lg-4 ">
			{!! Form::label('first_name',trans('user.first_name')) !!}:
			<div class="input-group">
      			<div class="input-group-addon input-sm"><span class="fa fa-align-justify"></span></div>
				{!! Form::text('first_name', $user->profile->first_name, ['ng-disabled'=>'disabled','class'=>'form-control input-sm']) !!}
			</div>
		</div>

		<div class="col-md-4 col-lg-4 ">
			{!! Form::label('last_name',trans('user.last_name')) !!}:
			<div class="input-group">
      			<div class="input-group-addon input-sm"><span class="fa fa-align-justify"></span></div>
				{!! Form::text('last_name', $user->profile->last_name, ['ng-disabled'=>'disabled','class'=>'form-control input-sm']) !!}
			</div>
		</div>

	</div>

	<div class="form-group">
		<div class="col-md-4">
			{!! Form::label('birthday',trans('user.birth_date')) !!}:
			<div class="input-group">
      			<div class="input-group-addon input-sm"><span class="glyphicon glyphicon-calendar"></span></div>
				{!! Form::date('birthday', $user->profile->birthday ?? \Carbon\Carbon::now(), ['ng-disabled'=>'disabled','class'=>'input-sm form-control']) !!}
			</div>
		</div>
		<div class="col-md-4">
			{!! Form::label('gender',trans('user.gender')) !!}:
			{!! Form::select('gender', trans('globals.person_sex'), $user->profile->gender, ['ng-disabled'=>'disabled','class'=>'input-sm form-control']) !!}
		</div>
	</div>

{{-- business --}}
@else

	<div class="form-group">
		<div class="col-md-4">
			{!! Form::label('business_name',trans('user.business_name')) !!}:
			<div class="input-group">
      			<div class="input-group-addon input-sm"><span class="glyphicon glyphicon-user"></span></div>
				{!! Form::text('business_name', $user->profile->business_name, ['ng-disabled'=>'disabled','class'=>'form-control input-sm']) !!}
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-4">
			{!! Form::label('work_phone',trans('user.company_phone')) !!}:
			<div class="input-group">
      			<div class="input-group-addon input-sm"><span class="glyphicon glyphicon-phone-alt"></span></div>
				{!! Form::text('work_phone', $user->profile->local_phone, ['ng-disabled'=>'disabled','class'=>'form-control input-sm']) !!}
			</div>
		</div>
	</div>

@endif

{{-- common --}}
<div class="form-group">
	<div class="col-md-4 col-lg-4">
		{!! Form::label('nickname',trans('user.nickname')) !!}:
		<div class="input-group">
      		<div class="input-group-addon input-sm"><span class="fa fa-user-secret"></span></div>
			{!! Form::text('nickname', $user->nickname, ['ng-disabled'=>'disabled','class'=>'form-control input-sm']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-lg-4">
		{!! Form::label('email',trans('user.email')) !!}:
		<div class="input-group">
      		<div class="input-group-addon input-sm"><span class="fa fa-envelope"></span></div>
			{!! Form::email('email', $user->email ?? null, ['ng-disabled'=>'disabled','class'=>'form-control input-sm']) !!}
		</div>
	</div>
</div>

@if (!\Auth::check())
	<div class="row">&nbsp;</div>
	<h5>{{ trans('user.password_confirmation') }}</h5>
	@include('user.partial.security_inputs')
@endif
{{-- end personal info --}}