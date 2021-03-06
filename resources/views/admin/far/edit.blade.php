@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($far, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.far.update', $far->id))) !!}

<div class="form-group">
    {!! Form::label('ots_id', 'N° de OT', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('ots_id', $ots, old('ots_id',$far->ots_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_fec', 'Fecha F.A.R.', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_fec', old('far_fec',$far->far_fec), array('class'=>'form-control datepicker')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_ali', 'Alimentacion', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_ali', old('far_ali',$far->far_ali), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_via', 'Viatico', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_via', old('far_via',$far->far_via), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_die', 'Diesel', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_die', old('far_die',$far->far_die), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_pea', 'Peaje', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_pea', old('far_pea',$far->far_pea), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_loc', 'Locomocion', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_loc', old('far_loc',$far->far_loc), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_col', 'Colacion', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_col', old('far_col',$far->far_col), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_otro', 'Otros', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_otro', old('far_otro',$far->far_otro), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_desc', 'Descripcion Otros', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_desc', old('far_desc',$far->far_desc), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_comb_efec', 'Combustibe en Efectivo', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_comb_efec', old('far_comb_efec',$far->far_comb_efec), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_comb_cred', 'Combustible a Credito', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_comb_cred', old('far_comb_cred',$far->far_comb_cred), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_mon_asig', 'Monto Asignado', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('far_mon_asig', old('far_mon_asig',$far->far_mon_asig), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('far_cli_ot', 'Cliente / OT', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('far_cli_ot', $far_cli_ot, old('far_cli_ot',$far->far_cli_ot), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.far.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection