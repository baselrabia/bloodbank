{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('phone', 'Phone:') !!}
			{!! Form::text('phone') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('facebook', 'Facebook:') !!}
			{!! Form::text('facebook') !!}
		</li>
		<li>
			{!! Form::label('twitter', 'Twitter:') !!}
			{!! Form::text('twitter') !!}
		</li>
		<li>
			{!! Form::label('insta', 'Insta:') !!}
			{!! Form::text('insta') !!}
		</li>
		<li>
			{!! Form::label('youtube', 'Youtube:') !!}
			{!! Form::text('youtube') !!}
		</li>
		<li>
			{!! Form::label('about_app', 'About_app:') !!}
			{!! Form::text('about_app') !!}
		</li>
		<li>
			{!! Form::label('notification_text', 'Notification_text:') !!}
			{!! Form::textarea('notification_text') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}