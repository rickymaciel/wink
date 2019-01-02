@extends('layouts.app')
@section('content')
<section id="right-side" class="hide-right">
    <div class="content">
        <h1>Bienvenida a Wink</h1>
        <p class="text-justify">La plataforma de Anuncios mas Exclusiva de toda Latinoamerica.</p>
        <p>Hoy tienes la Oportunidad de Recebir 6 Meses de suscripción completamente gratis
             para Tú primer Anuncio.</p>
        <p>Vamos a Promocionarte con mas de 500.000 usuarios.</p>
        <p>¿Qué esperas?</p>

        {!! Form::open(['route' => '/api/register', 'files' => true, 'id' => 'contact-form', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}
        <h2>Datos de la modelo</h2>
        <div class="row">
            <!-- Name_model -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Nombre <b class="text-danger">(*)</b></label>
                    {{ Form::text('Name_model', null, array('class' => 'form-control', 'placeholder' => '¿cual es tu nombre o alias?', 'required')) }}
                </div>
            </div>
            <!-- E_mail_model -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Email <b class="text-danger">(*)</b></label>
                    {{ Form::email('E_mail_model', null, array('class' => 'form-control', 'placeholder' => 'ingresa tú Email', 'required')) }}
                </div>
            </div>
            <!-- Whatsappnumber -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Contacto de Whatsapp 1 <b class="text-danger">(*)</b></label>
                    {{ Form::number('Whatsappnumber', null, array('class' => 'form-control', 'placeholder' => 'ingresa tú Numero de whatsapp', 'required')) }}
                </div>
            </div>
            <!-- Whatsappnumber2 -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Contacto de Whatsapp 2 </label>
                    {{ Form::number('Whatsappnumber2', null, array('class' => 'form-control', 'placeholder' => 'ingresa un segundo numero de whatsapp', 'required')) }}
                </div>
            </div>
        </div>
        <br>
        <h2>Datos del anuncio</h2>
        <div class="row">
            <!-- Country_anuncio -->
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <div class="form-group">
                    <label class="text-dark" for="">Pais <b class="text-danger">(*)</b></label>
                    {{ Form::select('Country_anuncio', $countries , null,['class' => 'form form-control', 'placeholder' => 'Seleccione el pais...', 'required'] ) }}
                </div>
            </div>
            <!-- City_anuncio -->
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <div class="form-group">
                    <label class="text-dark" for="">Ciudad <b class="text-danger">(*)</b></label>
                    {{ Form::text('City_anuncio', null, array('class' => 'form-control', 'placeholder' => 'Seleccione la ciudad...', 'required')) }}
                    </select>
                </div>
            </div>
            <!-- Age_model -->
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <div class="form-group">
                    <label class="text-dark" for="">Edad <b class="text-danger">(*)</b></label>
                    {{ Form::select('Age_model', array_combine(range(18,99),range(18,99)) , null,['class' => 'form form-control', 'min'=>'18', 'placeholder' => 'Selecciona tu edad...', 'required'] ) }}
                </div>
            </div>
            <!-- Text_model -->
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="form-group">
                    <label class="text-dark" for="">Titulo <b class="text-danger">(*)</b></label>
                    {{ Form::text('Text_anuncio', null, array('class' => 'form-control', 'placeholder' => 'Escribe aquí el titulo de tú anuncio', 'min'=>18, 'required')) }}
                </div>
            </div>
            <!-- Language_model -->
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="form-group">
                    <label class="text-dark" for="">Idiomas <b class="text-danger"> (*)</b></label>
                    {{ Form::text('Language_model', null, array('class' => 'form-control', 'placeholder' => 'Escribe aquí los idiomas que hablas', 'required')) }}
                </div>
            </div>
            <!-- Address1_model -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Direccion 1 <b class="text-danger"> (*)</b></label>
                    {{ Form::text('Address1_model', null, array('class' => 'form-control', 'placeholder' => 'dirección 1 (puede ser solo un sector-Barrio-ciudad)', 'required')) }}
                </div>
            </div>
            <!-- Address2_model -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Direccion 2 <b class="text-danger">(*)</b></label>
                    {{ Form::text('Address2_model', null, array('class' => 'form-control', 'placeholder' => 'dirección 2 (puede ser solo un sector-Barrio-ciudad)', 'required')) }}
                </div>
            </div>
        </div>
        <br>
        <h2>Sobre ti</h2>
        <div class="row">
            <!-- Hight_model -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Estatura <b class="text-danger">(*)</b></label>
                    {{ Form::text('Hight_model', null, array('class' => 'form-control', 'placeholder' => '¿cuál es tú estatura?', 'required')) }}
                </div>
            </div>
            <!-- Bust_model -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Busto <b class="text-danger">(*)</b></label>
                    {{ Form::text('Bust_model', null, array('class' => 'form-control', 'placeholder' => '¿cuál es tú copa ?', 'required')) }}
                </div>
            </div>
            <!-- Waist_model -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Cintura <b class="text-danger">(*)</b></label>
                    {{ Form::text('Waist_model', null, array('class' => 'form-control', 'placeholder' => '¿cuál es tú tamaño de cintura?', 'required')) }}
                </div>
            </div>
            <!-- Skin_color_model -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Color de piel <b class="text-danger">(*)</b></label>
                    {{ Form::select('Skin_color_model', $Skin_color_model , null,['class' => 'form form-control', 'placeholder' => 'Seleccione tu color de piel...', 'required'] ) }}
                </div>
            </div>
        </div>
        <br>
        <h2>Servicios</h2>
        <div class="row">
            <!-- Hight_model -->
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="form-group">
                    <label class="text-dark" for="">Este es el tecto principal para que tu cliente pueda ver tus Preferencias y especialidades</label>
                    <textarea rows="4" name="Services_anuncio" id="Services_anuncio" class="form form-control" placeholder="Escribe aqui..."></textarea>
                </div>
            </div>
        </div>
        <br>
        <h2>Horarios de atención</h2>
        <div class="row">
            <!-- Work_days -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Dias de: </label>
                    {{ Form::select('Work_days_begining', $daysOfWeek , null,['class' => 'form form-control', 'placeholder' => 'Seleccione el dia...', 'required'] ) }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">a: </label>
                    {{ Form::select('Work_days_end', $daysOfWeek , null,['class' => 'form form-control', 'placeholder' => 'Seleccione el dia...', 'required'] ) }}
                </div>
            </div>
            <!-- Work_hour -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Horas de: </label>
                    {{ Form::time('Work_hour_begining', Carbon\Carbon::now()->format('00:00') ,['class' => 'form form-control', 'placeholder' => 'Seleccione la hora...', 'required'] ) }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">a: </label>
                    {{ Form::time('Work_hour_end', Carbon\Carbon::now()->format('00:00') ,['class' => 'form form-control', 'placeholder' => 'Seleccione la hora...', 'required'] ) }}
                </div>
            </div>
        </div>
        <br>
        <h2>Tarifas</h2>
        <div class="row">
            <!-- Work_days -->
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">Horas: </label>
                    {{ Form::select('Hour', array_combine(range(1,24),range(1,24)) , null,['class' => 'form form-control', 'placeholder' => '¿tiempo  de los servicios a prestar?', 'required'] ) }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="form-group">
                    <label class="text-dark" for="">a: </label>
                    {{ Form::number('Price_service_anuncio', null, array('class' => 'form-control', 'placeholder' => 'tarifa para este servicio', 'required')) }}
                </div>
            </div>
        </div>
        <br>
        <h2>Lugares</h2>
        <div class="row">
            <!-- Work_days -->
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        {{ Form::checkbox('Places_work_anuncio[0]', 'Lugar propio', false, array('class' => 'form-check-input')) }}
                        <label class="form-check-label text-dark" for="">Lugar propio</label>
                    </div>
                    <div class="form-check form-check-inline">
                        {{ Form::checkbox('Places_work_anuncio[1]', 'Fiestas swinger/despedidas de soltero', false, array('class' => 'form-check-input')) }}
                        <label class="form-check-label text-dark" for="">Fiestas swinger/despedidas de soltero</label>
                    </div>
                    <div class="form-check form-check-inline">
                        {{ Form::checkbox('Places_work_anuncio[2]', 'Acompañante a Eventos', false, array('class' => 'form-check-input')) }}
                        <label class="form-check-label text-dark" for="">Acompañante a Eventos</label>
                    </div>
                    <div class="form-check form-check-inline">
                        {{ Form::checkbox('Places_work_anuncio[3]', 'Domicilio/ club / hotel/ intercambio', false, array('class' => 'form-check-input')) }}
                        <label class="form-check-label text-dark" for="">Domicilio/ club / hotel/ intercambio</label>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h2>Fotos</h2>
        <div class="row">
            <!-- Lugares -->
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <p>Este es el espacio para que cargues tus fotografias, fotos que permitan a un posible cliente quien eres. utiliza tu imaginación y sorprende con tú anuncio.</p>
                <br>
                <code>Puedes seleccionar hasta 10 fotos de una vez.</code>
                <div class="form-group file-loading">
                    {{ Form::file('Pictures_anuncio[]', array('class'=>'file','id'=>'file_img','multiple'=>true,'accept'=>'image/*'))  }}
                </div>
                
                <div class="float-right btn-group">
                    <button type="button" id="img_icon" class="light-btn photo-icon" title="Seleccionar imagen"> Agregar Fotos</button>
                </div>
            </div>
        </div>
        <br>
        <h2>Video</h2>
        <div class="row">
            <!-- Lugares -->
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <p>Un Video habla mas que mil Palabras. carga un Video de menos de 30 Sg. Puedes invitar, bailar, demostrar o hacer algo super creativo. Para llamar la ateción de tus clientes.</p>
                <br>
                <div class="form-group">
                    <input id="file_video" type="file" name="Video_anuncio" class="file" data-preview-file-type="text" >
                </div>
                <div class="float-right btn-group">
                    <button type="button" id="video_icon" class="light-btn video-icon" title="Seleccionar video">Subir video</button>
                </div>
            </div>
        </div>
        <br>
        <div class="text-center">
            <hr>
            <div class="btn-group">
                <button type="reset" id="" class="light-btn close-right-part">Cancelar</button>
                <!-- Button submit -->
                <button type="submit" id="" class="action-btn-red">Publicar anuncio</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</section>
@endsection