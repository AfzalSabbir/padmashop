@php
	$created = ucwords(preg_replace("/[\-_]/", " ",  $created));
	$created_ = strtolower(preg_replace("/[\s+]/", "_", $created));
	$created = preg_replace("/[\s+]/", "", $created);
@endphp
{!! $tab !!}/**<br>
{!! $tab !!}* <strong>{{ ucwords($created) }}</strong><br>
{!! $tab !!}**/<br>
@if($type_ == 'oneClickAll')
{!! $tab !!}Route::group(['prefix' => '{{ $created_ }}'], function(){<br>
{!! $tab.$tab !!}Route::get('/', 'Backend\{{ ucfirst($created) }}Controller&commat;index')->name('admin.{{ $created_ }}.index');<br>
{!! $tab.$tab !!}Route::get('/add', 'Backend\{{ ucfirst($created) }}Controller&commat;add')->name('admin.{{ $created_ }}.add');<br>
{!! $tab.$tab !!}Route::post('/add', 'Backend\{{ ucfirst($created) }}Controller&commat;store')->name('admin.{{ $created_ }}.store');<br>
{!! $tab.$tab !!}Route::get('/edit/{id}', 'Backend\{{ ucfirst($created) }}Controller&commat;edit')->name('admin.{{ $created_ }}.edit');<br>
{!! $tab.$tab !!}Route::post('/edit/{id}', 'Backend\{{ ucfirst($created) }}Controller&commat;update')->name('admin.{{ $created_ }}.update');<br>
{!! $tab.$tab !!}Route::get('/delete/{id}', 'Backend\{{ ucfirst($created) }}Controller&commat;delete')->name('admin.{{ $created_ }}.delete');<br>
{!! $tab !!}});<br>

@elseif($type_ == 'oneClickAllWithView')
{!! $tab !!}Route::group(['prefix' => '{{ $created_ }}'], function(){<br>
{!! $tab.$tab !!}Route::get('/', 'Backend\{{ ucfirst($created) }}Controller&commat;index')->name('admin.{{ $created_ }}.index');<br>
{!! $tab.$tab !!}Route::get('/add', 'Backend\{{ ucfirst($created) }}Controller&commat;add')->name('admin.{{ $created_ }}.add');<br>
{!! $tab.$tab !!}Route::post('/add', 'Backend\{{ ucfirst($created) }}Controller&commat;store')->name('admin.{{ $created_ }}.store');<br>
{!! $tab.$tab !!}Route::get('/view/{id}', 'Backend\{{ ucfirst($created) }}Controller&commat;view')->name('admin.{{ $created_ }}.view');<br>
{!! $tab.$tab !!}Route::get('/edit/{id}', 'Backend\{{ ucfirst($created) }}Controller&commat;edit')->name('admin.{{ $created_ }}.edit');<br>
{!! $tab.$tab !!}Route::post('/edit/{id}', 'Backend\{{ ucfirst($created) }}Controller&commat;update')->name('admin.{{ $created_ }}.update');<br>
{!! $tab.$tab !!}Route::get('/delete/{id}', 'Backend\{{ ucfirst($created) }}Controller&commat;delete')->name('admin.{{ $created_ }}.delete');<br>
{!! $tab !!}});<br>

@elseif($type_ == 'modal')
{!! $tab !!}Route::group(['prefix' => '{{ $created_ }}'], function(){<br>
{!! $tab.$tab !!}Route::get('/', 'Backend\{{ ucfirst($created) }}Controller&commat;index')->name('admin.{{ $created_ }}.index');<br>
{!! $tab.$tab !!}Route::post('/add', 'Backend\{{ ucfirst($created) }}Controller&commat;store')->name('admin.{{ $created_ }}.store');<br>
{!! $tab.$tab !!}Route::post('/edit/{id}', 'Backend\{{ ucfirst($created) }}Controller&commat;update')->name('admin.{{ $created_ }}.update');<br>
{!! $tab.$tab !!}Route::get('/delete/{id}', 'Backend\{{ ucfirst($created) }}Controller&commat;delete')->name('admin.{{ $created_ }}.delete');<br>
{!! $tab !!}});<br>

@else
{!! $tab !!}Route::group(['prefix' => '{{ $created_ }}'], function(){<br>
{!! $tab.$tab !!}Route::get('/<strong>{{ $created_ }}</strong>{{ $type_ == 'index' ? '' : '/'.$type_ }}', 'Backend\{{ ucfirst($created) }}Controller&commat;{{ $type_ }}')->name('admin.{{ $created_ }}.{{ $type_ }}');<br>
{!! $tab !!}});<br>

@endif