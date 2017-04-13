@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.ots.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>

@if ($ots->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>N° de OT</th>
<th>HES</th>
<th>Codigo Cliente</th>
<th>Origen</th>
<th>Destino</th>
<th>N° Pedido</th>
<th>Modelo Camion</th>
<th>N° Chasis</th>
<th>Placa Patente</th>
<th>Especial</th>
<th>Tipo de Camion</th>
<th>Kms. Ruta</th>
<th>Nota</th>
<th>Observacion</th>
<th>Conductor</th>
<th>N° Licencia</th>
<th>N° Guia</th>
<th>Valor Final</th>
<th>Valor Ruta</th>
<th>Valor Especial</th>
<th>Adicionales (FR)</th>
<th>Moneda</th>
<th>Usuario</th>
<th>N° Factura</th>
<th>Tipo de Cambio</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($ots as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ $row->ots_not }}</td>
<td>{{ $row->ots_hes }}</td>
<td>{{ isset($row->clientes->cli_cod) ? $row->clientes->cli_cod : '' }}</td>
<td>{{ $row->ots_ori }}</td>
<td>{{ $row->ots_des }}</td>
<td>{{ $row->ots_npe }}</td>
<td>{{ $row->ots_mod }}</td>
<td>{{ $row->ots_cha }}</td>
<td>{{ $row->ots_pat }}</td>
<td>{{ $row->ots_esp }}</td>
<td>{{ $row->ots_tip_cam }}</td>
<td>{{ $row->ots_kms }}</td>
<td>{{ $row->ots_nota }}</td>
<td>{{ $row->ots_obs }}</td>
<td>{{ isset($row->conductores->cond_nom) ? $row->conductores->cond_nom : '' }}</td>
<td>{{ $row->ots_lic }}</td>
<td>{{ $row->ots_gui }}</td>
<td>{{ $row->ots_val_fin }}</td>
<td>{{ $row->ots_val_rut }}</td>
<td>{{ $row->ots_val_esp }}</td>
<td>{{ $row->ots_adic }}</td>
<td>{{ $row->ots_mon_asig }}</td>
<td>{{ $row->ots_usr }}</td>
<td>{{ $row->ots_fact }}</td>
<td>{{ $row->ots_tip_camb }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.ots.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.ots.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.ots.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
	</div>
@else
    {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@stop