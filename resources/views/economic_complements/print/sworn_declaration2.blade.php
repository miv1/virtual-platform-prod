@extends('globalprint.wkhtml')

@section('content')

<style type="text/css">
  body{
    font-size: 10px
  }
</style>

<div class="title2"><strong class="code">DOC - {!! $doc_number !!} </strong><strong class="code">Trámite: Nº {!! $economic_complement->code !!}</strong></div>
<div id="project">
        {{--Información beneficiario--}}
  @if($economic_complement->economic_complement_modality->economic_complement_type->id > 1)
  <table class="table" style="width:100%;">
    <tr>
      <td colspan="8" class="grand info_title">
        INFORMACIÓN DEL AFILIADO 
        @if($economic_complement->economic_complement_modality->economic_complement_type->id > 1)
        - CAUSAHABIENTE
        @endif
      </td>
    </tr>
    <tr>
      <td colspan="1"><strong>NOMBRE:</strong></td><td colspan="2" nowrap>{!! $affiliate->getFullNamePrintTotal() !!}</td>
      <td><strong>GRADO:</strong></td><td>{!! $economic_complement->degree->shortened ?? '' !!}</td>
      <td><strong>CATEGORÍA:</strong></td><td>{!! $economic_complement->category->getPercentage() !!}</td>
    </tr>
    <tr>
      <td><strong>C.I.:</strong></td><td nowrap colspan="2">  {!! $affiliate->identity_card !!} {!! $affiliate->city_identity_card->first_shortened ?? '' !!}</td><td><strong>FECHA DE NAC.:</strong></td><td> {!! $affiliate->getShortBirthDate() !!}</td><td><strong>EDAD:</strong></td><td>{!! $affiliate->getAge() !!} AÑOS</td>
    </tr>
  </table>
  @endif
  {{--Información derechohabiente--}}
  <table class="table" style="width:100%;">
    <tr>
      <td colspan="6" class="grand info_title">
        INFORMACIÓN DEL BENEFICIARIO
        @if($eco_com_applicant->economic_complement->economic_complement_modality->economic_complement_type->id > 1)
        - DERECHOHABIENTE
        @endif
      </td>
    </tr>
    <tr >
      <td colspan="1"><strong>NOMBRE:</strong></td><td colspan="5" nowrap>{!! $eco_com_applicant->getFullName() !!}</td>
    </tr>
    <tr>
      <td><strong>C.I.:</strong></td><td nowrap>{!! $eco_com_applicant->identity_card !!} {{$eco_com_applicant->city_identity_card->first_shortened ?? ''}}</td>
      <td><strong>FECHA NAC:</strong></td><td> {!! $eco_com_applicant->getShortBirthDate() !!}</td>
      <td><strong>EDAD:</strong></td><td>{!! $eco_com_applicant->getAge() !!} AÑOS</td>
    </tr>
    <tr>
      <td><strong>TELÉFONO:</strong></td>
      <td>
        {!! explode(',',$eco_com_applicant->phone_number)[0] !!}<br/>
      </td>
      <td><strong>CELULAR:</strong></td>
      <td>
        {!! explode(',',$eco_com_applicant->cell_phone_number)[0] !!}<br/>
      </td>
      <td><strong>LUGAR DE NAC.:</strong></td>
      <td>{!! $eco_com_applicant->city_birth->second_shortened ?? '' !!}</td>
    </tr>
  </table>
  <p align="justify">Yo, <strong>{!! $eco_com_applicant->getTitleNameFull() ?? '' !!}</strong> boliviano (a) de nacimiento con Cédula de Identidad <strong>  N° {!! $eco_com_applicant->identity_card !!} {!! $eco_com_applicant->city_identity_card->shortened ?? ''!!} </strong> .
    con estado civil <strong>{!! $eco_com_applicant->getCivilStatus() ?? '' !!}</strong> y con residencia actualmente en el Departamento de <strong>{!! $economic_complement->city->name !!}</strong>.; mayor de edad,
    y hábil por derecho; consiente de la responsabilidad que asumo ante la Mutual de Servicios al Policía – MUSERPOL,
    de manera voluntaria y sin que medie ningún tipo de presión, mediante la presente, <strong>DECLARO LO SIGUIENTE:</strong>
  </p>
  <table>
    <tr>
      <td>1</td>
      <td style="text-align:justify;">No percibo una pensión de jubilación por Riesgo Común y/o Profesional e Invalidez Común y/o Profesional o Muerte, por lo cual, la pensión en curso de pago que percibo por parte de las Administradoras del Fondo de Pensiones (AFP’S), Aseguradoras o del Sistema de Reparto corresponde a una <strong>PRESTACIÓN POR VIUDEDAD DERIVADA DE VEJEZ DEL CAUSAHABIENTE.</strong> Sin embargo, puedo acceder al beneficio cumpliendo lo establecido por el <strong>D.S. 3231 de 28 de junio de 2017, que modifica el Artículo Nº 17, Parágrafo I del Decreto Supremo Nº 1446 de 19 de diciembre de 2012.</strong></td>
    </tr>
    <tr>
      <td>2</td>
      <td style="text-align:justify;">Mi causahabiente perteneció al sector pasivo de la Policía Boliviana y acredita en la Certificación de Años de Servicio emitido por el Comando General de la Policía Boliviana como mínimo de 16 años de servicio, asimismo, <strong>No</strong> fue dado de baja en forma obligatoria o voluntaria de la Policía Boliviana.</td>
    </tr>
    <tr>
      <td>3</td>
      <td style="text-align:justify;">La información y documentación proporcionada por mi persona, tanto verbal como la contenida en documentos respecto a los requisitos mínimos para acceder al Beneficio del Complemento Económico, es totalmente <strong>real y fidedigna</strong>, por lo que me hago totalmente responsable de la misma.</td>
    </tr>
    <tr>
      <td>4</td>
      <td style="text-align:justify;">Mi causahabiente y mi persona no tienen sentencia condenatoria ejecutoriada por delitos cometidos contra la MUSEPOL y/o MUSERPOL.</td>
    </tr>
    <tr>
      <td>5</td>
      <td style="text-align:justify;">No he contraído nuevo matrimonio; estado que puede ser verificado según Certificación original de verificación de partidas matrimoniales emitida por el Servicio de Registro Civil – SERECI.</td>
    </tr>
    <tr>
      <td>6</td>
      <td style="text-align:justify;">Estoy consciente de que existe la probabilidad de ser excluido (a) por salario, por percibir una prestación por vejez<strong>&nbsp;IGUAL O SUPERIOR</strong> al haber básico más categoría que perciban los miembros del servicio activo de la Policía Boliviana en el grado correspondiente, tal como lo señala en el Decreto Supremo N° 1446, Artículo 17, Parágrafo I y el Reglamento del Beneficio del Complemento Económico.</td>
    </tr>
    <tr>
      <td>7</td>
      <td style="text-align:justify;">Estoy de acuerdo en proceder con la devolución de montos percibidos indebidamente en caso de producirse alguna inconsistencia a causa del contenido de la documentación presentada, información proporcionada por entidades externas, error del sistema u otros que se presenten.
      </td>
    </tr>
    <tr>
      <td>8</td>
      <td style="text-align:justify;">De presentarse una tercera persona que acredite igual o mayor derecho para acceder al Beneficio del Complemento Económico por mi causahabiente, estoy de acuerdo en que la Mutual de Servicios al Policía no se hace responsable por la suspensión del mencionado Beneficio y estoy de acuerdo a realizar devolución de montos cobrados.</td>
    </tr>
  </table>
  <p align="justify">En mérito de los datos registrados en forma precedente, el interesado aprueba y ratifica su tenor de manera íntegra, quien en señal de conformidad en forma expresa y voluntaria firma el presente documento en la ciudad de {!! $user->city->name ?? 'La Paz' !!}, {!! $date !!}.</p>
  <table>
            
          <tr>
              <th class="no-border"> <img src="http://chart.apis.google.com/chart?cht=qr&chs=110x110&chl=<?php echo (($title ?? '').' || '.'Trámite Nº: '.($economic_complement->code).' || '.$eco_com_applicant->getFullName().' || '.'Carnet de Identidad: '.$eco_com_applicant->identity_card.' '.($eco_com_applicant->city_identity_card->first_shortened ?? '').' || '.'Regional: '.($economic_complement->city->name ?? '') .' || '.'Fecha: '.($date ?? '') .' || '.$user->id); ?>&chld=L|0"></th>
              <th class="info" style="border: 0px;text-align:center; width:60%"><p>&nbsp;</p><br>----------------------------------------------------
                <strong>
                <br>
                {!! $eco_com_applicant->getTitleNameFull() !!}
                <br>
                C.I. {!! $eco_com_applicant->identity_card !!} {!! $eco_com_applicant->city_identity_card->first_shortened ?? ''!!}
                </strong>
              </th>
              <th class="no-border"> <div class="info" style="border: 1px solid  #3c3c3c!IMPORTANT;text-align:center;width: 150px;"><p>&nbsp;</p><br><br><br><br></div><br><span class="info" style="border: 0px;text-align:center;">Impresión Digital Pulgar Derecho</span></th>

          </tr>
        
</table>
  <p align="justify"><strong class="size-10">Nota.- El presente documento tiene carácter de DECLARACIÓN JURADA, por lo que en caso de evidenciarse la falsedad de este, se procederá con las acciones legales pertinentes. </strong></p>
</div>
@endsection
