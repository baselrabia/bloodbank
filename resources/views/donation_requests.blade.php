{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('client_id', 'Client_id:') !!}
			{!! Form::text('client_id') !!}
		</li>
		<li>
			{!! Form::label('patient_name', 'Patient_name:') !!}
			{!! Form::text('patient_name') !!}
		</li>
		<li>
			{!! Form::label('patient_age', 'Patient_age:') !!}
			{!! Form::text('patient_age') !!}
		</li>
		<li>
			{!! Form::label('blood_type_id', 'Blood_type_id:') !!}
			{!! Form::text('blood_type_id') !!}
		</li>
		<li>
			{!! Form::label('bags_num', 'Bags_num:') !!}
			{!! Form::text('bags_num') !!}
		</li>
		<li>
			{!! Form::label('hospital_address', 'Hospital_address:') !!}
			{!! Form::text('hospital_address') !!}
		</li>
		<li>
			{!! Form::label('city_id', 'City_id:') !!}
			{!! Form::text('city_id') !!}
		</li>
		<li>
			{!! Form::label('latitude', 'Latitude:') !!}
			{!! Form::text('latitude') !!}
		</li>
		<li>
			{!! Form::label('longitude', 'Longitude:') !!}
			{!! Form::text('longitude') !!}
		</li>
		<li>
			{!! Form::label('phone', 'Phone:') !!}
			{!! Form::text('phone') !!}
		</li>
		<li>
			{!! Form::label('notes', 'Notes:') !!}
			{!! Form::textarea('notes') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}