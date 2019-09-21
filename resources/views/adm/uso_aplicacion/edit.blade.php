@extends('adm.dashboard')

@section('content', trans('translator.main-option-edit') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
  	<div class="col s12 right">
      <a href="{{route(strtolower($model).'.index')}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
      <a href="{{route(strtolower($model).'.create') }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
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
          {{-- 
    		<div class="file-field input-field col m8 s12">
    			<div class="btn">
    				<span>@lang('translator.main-image')</span>
    				{!! Form::file('image') !!}
    			</div>
    			<div class="file-path-wrapper">
            @if($data->image)
            <span style="position: absolute; padding: 7px;">
              <i class="material-icons small">image</i>
            </span>
            @endif
    				{!!Form::text('',$data->image, ['placeholder' => trans('translator.main-image-slider'), 'class'=>'file-path validate', 'required', 'style' => 'padding-left: 40px;']) !!}
    			</div>
    		</div>
 --}}
        <div class="input-field col m8 s12">
          {!!Form::label('title_es', trans('translator.main-title'))!!}
          {!!Form::text('title_es',$data->title_es,['class'=>'validate'])!!}
        </div>
        <div class="input-field col m4 s12">
          {!!Form::label('order', trans('translator.main-order'))!!}
          {!!Form::text('order',$data->order,['class'=>'validate'])!!}
        </div>
        {{-- 
        <div class="input-field col s12">
          {!!Form::label('code', trans('translator.main-code'))!!}
          {!!Form::text('code',$data->code,['class'=>'validate', 'required'])!!}
        </div>
        --}}
        <div class="input-field col s12">
          <div>{!!Form::label('text_es', trans('translator.main-text'))!!}</div>
          {!!Form::textarea('text_es', $data->text_es, ['class'=>'validate', 'required', 'cols'=>'74', 'rows'=>'1', 'id' => 'text_es'])!!}
        </div>
        <div class="input-field col m6 s12">
          {!! Form::label('uso_id', trans('translator.main-product-rubro').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
          {!! Form::select('uso_id[]', $productos, $data->product, ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
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
