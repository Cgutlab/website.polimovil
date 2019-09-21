@extends('adm.dashboard')

@section('content', trans('translator.main-option-edit') .' '. $model)

@section('cuerpo')

  <main>
  <div class="container" style="width: 100%;">
  <div class="row">
  	<div class="col s12 right">
      <a href="{{route(strtolower($model).'_product.index')}}" class="btn-floating btn-medium waves-effect waves-light blue right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
      <a href="{{route(strtolower($model).'_product.create') }}" class="btn-floating btn-medium waves-effect waves-light green right ml-3x"><i class="material-icons">add</i></a>
  	</div>
  </div>
  {!!Form::model($data, ['route'=>[strtolower($model).'_product.update', $data->id], 'method'=>'PUT', 'files' => true])!!}
  {{ csrf_field() }}
  <div class="row">

      <div class="input-field col m4 s12 offset-m8">
        {!!Form::label('order', trans('translator.main-order'))!!}
        {!!Form::text('order',$data->order,['class'=>'validate'])!!}
      </div>
      <div class="input-field col s12">
        {!!Form::label('title_es', trans('translator.main-title'))!!}
        {!!Form::text('title_es',$data->title_es,['class'=>'validate'])!!}
      </div>
      <div class="input-field col s12">
        <div>{!!Form::label('text_es', trans('translator.main-text'))!!}</div>
        {!!Form::textarea('text_es', $data->text_es, ['class'=>'validate', 'required', 'cols'=>'74', 'rows'=>'1', 'id' => 'text_es'])!!}
      </div>
      <div class="file-field input-field col s12">
        <div class="btn">
          <span>@lang('translator.main-ficha')</span>
          {!! Form::file('ficha') !!}
        </div>
        <div class="file-path-wrapper">
          @if($data->ficha)
          <span style="position: absolute; padding: 7px;">
            <i class="material-icons small">folder</i>
            {{-- <img src="{{asset('img/slider/'.$data->ficha)}}" class="materialboxed" style="height: 30px; width: 30px;"> --}}
          </span>
          @endif
          {!!Form::text('',$data->ficha, ['placeholder' => trans('translator.main-image-ficha'), 'class'=>'file-path validate', 'required', 'style' => 'padding-left: 40px;']) !!}
        </div>
      </div>
      <div class="input-field col m6 s12">
        {!! Form::label('esquema', trans('translator.main-esquema').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
        {!! Form::select('esquema[]', $esquema, $data->esquemas, ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
      </div>
      <div class="input-field col m6 s12">
        {!! Form::label('prestacion', trans('translator.main-prestacion').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
        {!! Form::select('prestacion[]', $prestacion, $data->prestaciones, ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
      </div>
      <div class="input-field col m6 s12">
        {!! Form::label('video', trans('translator.main-presentation').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
        {!! Form::select('video[]', $video, $data->videos, ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
      </div>
      <div class="input-field col m6 s12">
        {!! Form::label('relacion', trans('translator.main-relacion').'&nbsp;&nbsp;', ['style' => 'z-index:9; background:white; border-radius: 3px 3px 0 0; width: fit-content!important;']) !!}<br />
        {!! Form::select('relacion[]', $relacion, $data->relacionados, ['class' => 'form-control', 'multiple' => 'multiple', 'style' => 'line-height: 0;']) !!}
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
