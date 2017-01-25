@extends('app')

@section('contentheader_title')

	<div class="row">
		<div class="col-md-10">
			{!! Breadcrumbs::render('show_economic_complement', $economic_complement) !!}
		</div>
		<div class="col-md-2 text-right">
			<a href="{!! url('economic_complement') !!}" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Atrás">
				&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;
			</a>
		</div>
	</div>

@endsection

@section('main-content')

	<div class="row">
	    <div class="col-md-6">
			@include('affiliates.simple_info')
		</div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="box-title"><span class="glyphicon glyphicon-info-sign"></span> Información Adicional</h3>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-responsive" style="width:100%;">
                                <tr>
                                    <td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Semestre
                                            </div>
                                            <div class="col-md-6">
                                                {!! $semester !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Gestión
                                            </div>
                                            <div class="col-md-6">
                                                {!! $year !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
								<tr>
                                    <td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Tipo
                                            </div>
                                            <div class="col-md-6">
                                                {!! $eco_com_type !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-responsive" style="width:100%;">
                                <tr>
                                    <td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Ciudad
                                            </div>
                                            <div class="col-md-6">
                                                {!! $economic_complement->city->name !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
								<tr>
									<td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
										<div class="row">
											<div class="col-md-6">
												Estado
											</div>

                                            <div class="col-md-6">
												{!! $economic_complement->economic_complement_state->economic_complement_state_type->name !!}
											</div>
										</div>
									</td>
								</tr>
                                <tr>
									<td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
										<div class="row">
											<div class="col-md-6">
												Por
											</div>
                                            <div class="col-md-6">
												{!! $economic_complement->economic_complement_state->name !!}
											</div>
										</div>
									</td>
								</tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

    <div class="row">
        <div class="col-md-6">
			<div class="box box-warning">
                <div class="box-header with-border">
					<h3 class="box-title"><span class="fa fa-user-plus"></span> Información de Beneficiario</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<table class="table" style="width:100%;">
								<tr>
									<td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
										<div class="row">
											<div class="col-md-6">
												Carnet Identidad
											</div>
											<div class="col-md-6">
												{!! $eco_com_applicant->identity_card !!}
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
										<div class="row">
											<div class="col-md-6">
												Apellido Paterno
											</div>
											<div class="col-md-6">
												{!! $eco_com_applicant->last_name !!}
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
										<div class="row">
											<div class="col-md-6">
												Apellido Materno
											</div>
											<div class="col-md-6">
												{!! $eco_com_applicant->mothers_last_name !!}
											</div>
										</div>
									</td>
								</tr>
								@if ($eco_com_applicant->surname_husband)
	                                <tr>
	                                    <td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                Apellido de Esposo
	                                            </div>
	                                            <div class="col-md-6">
	                                                {!! $eco_com_applicant->surname_husband !!}
	                                            </div>
	                                        </div>
	                                    </td>
	                                </tr>
								@endif
								<tr>
                                    <td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Primer Nombre
                                            </div>
                                            <div class="col-md-6">
                                                {!! $eco_com_applicant->first_name !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
								<tr>
                                    <td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Segundo Nombre
                                            </div>
                                            <div class="col-md-6">
                                                {!! $eco_com_applicant->second_name !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
							</table>
						</div>
						<div class="col-md-6">
                            <table class="table" style="width:100%;">
                                <tr>
                                    <td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Fecha Nacimiento
                                            </div>
                                            <div class="col-md-6">
                                                 {!! $eco_com_applicant->getShortBirthDate() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Edad
                                            </div>
                                            <div class="col-md-6">
                                                {!! $eco_com_applicant->getHowOld() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
								<tr>
                                    <td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                NUA/CUA
                                            </div>
                                            <div class="col-md-6">
                                                {!! $eco_com_applicant->nua !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Estado Civil
                                            </div>
                                            <div class="col-md-6">
                                                {!! $eco_com_applicant->getCivilStatus() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
								<tr>
									<td style="border-top:0px;border-bottom:1px solid #f4f4f4;">
										<div class="row">
											<div class="col-md-6">
												Teléfono(s)
											</div>
											<div class="col-md-6">
												{!! $eco_com_applicant->getPhone() !!}
											</div>
										</div>
									</td>
								</tr>
                            </table>
                        </div>
					</div>
				</div>
			</div>
			<div class="box box-warning">
                <div class="box-header with-border">
					<h3 class="box-title"><span class="glyphicon glyphicon-inbox"></span> Requisitos Presentados</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered table-hover" style="width:100%;font-size: 14px">
								<thead>
									<tr>
										<th>Nombre de Requisito</th>
										<th class="text-center">Estado</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($eco_com_submitted_documents as $item)
										<tr>
											<td>{!! $item->economic_complement_requirement->shortened !!}</td>
											<td>
												<div class="text-center">
													@if($item->status)
													<span class="fa fa-check-square-o fa-lg"></span>
													@else
													<span class="fa fa-square-o fa-lg"></span>
													@endif
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-warning">
                <div class="box-header with-border">
					<h3 class="box-title"><span class="fa fa-money"></span> Cálculo de Totales</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered table-hover" style="width:100%;font-size: 14px">
								<tbody>
									<tr>
										<td>Renta Total Cotizable</td>
										<td>{!! $sub_total_rent !!}</td>
									</tr>
									<tr>
										<td>Referente Salarial</td>
										<td></td>
									</tr>
									<tr>
										<td>Antigüedad</td>
										<td></td>
									</tr>
									<tr>
										<td>Salario Cotizable</td>
										<td></td>
									</tr>
									<tr>
										<td>Diferencia</td>
										<td></td>
									</tr>
									<tr>
										<td>Meses de Pago</td>
										<td></td>
									</tr>
									<tr>
										<td>Total Semestre</td>
										<td></td>
									</tr>
									<tr>
										<td>Factor de Complementación</td>
										<td></td>
									</tr>
									<tr>
										<td>Total a Cancelar</td>
										<td></td>
									</tr>
								</tbody>
							</table>

                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('scripts')
<script>

	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();
	});

</script>
@endpush