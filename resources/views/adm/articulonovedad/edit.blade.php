@extends('adm.dashboard')

@section('content', trans('translator.main-option-edit') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
    <div class="col s8">
  		<h4 style="color: var(--main-color-links)">{!!$data->category->title_es!!}</h4>
  		{{-- @include('adm.layouts.report') --}}
  	</div>
  	<div class="col s4">
      <a href="{{ route(strtolower($model).'.show', ['id' => $data->novedad_id]) }}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
  		<a href="{{ route(strtolower($model).'.create', ['id' => $data->novedad_id]) }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
  	</div>
  </div>
  {!!Form::model($data, ['route'=>[strtolower($model).'.update', $data->id], 'method'=>'PUT', 'files' => true])!!}
  {{ csrf_field() }}
  	<div class="row">
      {{--
          <div class="file-field input-field col s12 right">
            {!! Form::label('section', trans('translator.main-section')) !!}
            {!! Form::select('section', ['home' => trans('translator.main-section') . ' home',
                                      'empresa' => trans('translator.main-section') . ' empresa'],
                                      $section, ['class'=>'validate', 'required', 'id' => 'section']) !!}
          </div>
          --}}
    		<div class="file-field input-field col m8 s12">
    			<div class="btn">
    				<span>@lang('translator.main-image')</span>
    				{!! Form::file('image') !!}
    			</div>
    			<div class="file-path-wrapper">
            @if($data->image)
            <span style="position: absolute; padding: 7px;">
              <i class="material-icons small">image</i>
    					{{-- <img src="{{asset('img/slider/'.$data->image)}}" class="materialboxed" style="height: 30px; width: 30px;"> --}}
            </span>
            @endif
    				{!!Form::text('',$data->image, ['placeholder' => trans('translator.main-image-slider'), 'class'=>'file-path validate', 'required', 'style' => 'padding-left: 40px;']) !!}
    			</div>
    		</div>
        <div class="input-field col m4 s12">
          {!!Form::label('order', trans('translator.main-order'))!!}
          {!!Form::text('order',$data->order,['class'=>'validate'])!!}
        </div>

        <div class="input-field col s12">
            {!!Form::label('title_es', trans('translator.main-title'))!!}
            {!!Form::text('title_es',$data->title_es,['class'=>'validate'])!!}
          </div>
          
        <div class="input-field col s12">
            {!!Form::label('extract_es', trans('translator.main-extract'))!!}
            {!!Form::text('extract_es',$data->extract_es,['class'=>'validate'])!!}
          </div>
          <div class="input-field col s12">
              <div>{!!Form::label('text_es', trans('translator.main-text'))!!}</div>
              {!!Form::textarea('text_es', $data->text_es, ['class'=>'validate', 'cols'=>'74', 'rows'=>'1', 'id' => 'text_es'])!!}
            </div>
  	</div>
  {!!Form::submit(trans('translator.main-option-update'), ['class' => 'btn right'])!!}
  {!!Form::close()!!}
  </div>
  </main>
  <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
  <script>
  	CKEDITOR.replace('text_es');
  	CKEDITOR.config.width = '100%';
  </script>
@endsection
