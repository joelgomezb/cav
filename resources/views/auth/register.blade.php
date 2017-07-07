@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        @if ($message = Session::get('errors'))
                          <div class="alert alert-warning">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif

                        @if ($message = Session::get('success'))
                          <div class="alert alert-success">
                            <p>
                              {{ $message }}
                            </p>
                          </div>
                        @endif
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label for="apellido" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required autofocus>

                                @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('documento_identidad') ? ' has-error' : '' }}">
                            <label for="documento_identidad" class="col-md-4 control-label">Documento de Identidad</label>

                            <div class="col-md-2">
                                <select class="form-control" id="nacionalidad" name="nacionalidad">
                                    <option value="V">V</option>
                                    <option value="E">E</option>
                                    <option value="P">P</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <input id="documento_identidad" type="text" class="form-control" name="documento_identidad" value="{{ old('documento_identidad') }}" required autofocus>

                                @if ($errors->has('documento_identidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('documento_identidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                              <label for="fecha_nacimiento" class="col-md-4 control-label">Fecha de Nacimiento</label>

                              <div class="col-md-3 has-feedback">
                                  <input type="text" name="fecha_nacimiento"  id="fecha_nacimiento" class="form-control datepicker" name="date" required>
                                  <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                              </div>
                        </div>

                        <div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label">Género</label>

                              <div class="col-md-3 has-feedback">
                                <input type="radio" name="genero" value="F"> Femenino<br>
                                <input type="radio" name="genero" value="M"> Masculino<br>
                              </div>
                          </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Teléfono</label>
                              <div class="col-md-4">
                                <input type="text" class="form-control" id="telefono" name="telefono" data-inputmask="'mask': '(9999)-9999999'" required/>
                              </div>
                        </div>

                        <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Celular</label>
                              <div class="col-md-4">
                                <input type="text" class="form-control" id="celular" name="celular" data-inputmask="'mask': '(9999)-9999999'" required/>
                              </div>
                        </div>

                          <div class="form-group{{ $errors->has('grado_instruccion') ? ' has-error' : '' }}">
                              <label for="documento_identidad" class="col-md-4 control-label">Grado de Instrucción</label>

                              <div class="col-md-6">
                                  <select class="form-control" id="grado_instruccion" name="grado_instruccion">
                                      <option value="Bachiller">Bachiller</option>
                                      <option value="Universitario Graduado">Universitario Graduado</option>
                                      <option value="Universitario en Curso">Universitario en Curso</option>
                                      <option value="Especializacion">Especialización</option>
                                      <option value="Postgrado Graduado">Postgrado Graduado</option>
                                      <option value="Postgrado en Curso">Postgrado en Curso</option>
                                  </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                                <label for="cargo" class="col-md-4 control-label">Cargo</label>

                                <div class="col-md-6">
                                    <input id="cargo" type="text" class="form-control" name="cargo" value="{{ old('cargo') }}" required>

                                    @if ($errors->has('cargo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cargo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tipo_empresa') ? ' has-error' : '' }}">
                                <label for="tipo_empresa" class="col-md-4 control-label">Tipo de Empresa</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="tipo_empresa" name="tipo_empresa">
                                        <option value="">Seleccione</option>
                                        <option value="1">Afiliada CAV</option>
                                        <option value="2">Afiliada FECOPROSE/CAVECOSE</option>
                                        <option value="0">No Afiliada</option>
                                    </select>
                                  </div>
                                  <div id="divLoading" name="divLoading" class="col-md-2 hide">
                                    <i class="fa fa-circle-o-notch fa-spin fa-2 x fa-fw"></i>
                                    <span class="sr-only">Loading...</span>
                                  </div>
                            </div>

                            <div id="divEmpresa" name="divEmpresa" class="form-group{{ $errors->has('cod_empresa') ? ' has-error' : '' }} hide">
                                <label for="documento_identidad" class="col-md-4 control-label">Empresas</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="cod_empresa" name="cod_empresa">
                                        <option value="">Seleccione</option>
                                    </select>
                                  </div>
                            </div>

                            <div class="form-group{{ $errors->has('contacto_facturacion') ? ' has-error' : '' }}">
                                <label for="contacto_facturacion" class="col-md-4 control-label">Contacto de Facturación</label>

                                <div class="col-md-6">
                                    <input id="contacto_facturacion" type="text" class="form-control" name="contacto_facturacion" value="{{ old('contacto_facturacion') }}" required>

                                    @if ($errors->has('contacto_facturacion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contacto_facturacion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('correo_contacto') ? ' has-error' : '' }}">
                                <label for="correo_contacto" class="col-md-4 control-label">Correo de Contacto</label>

                                <div class="col-md-6">
                                    <input id="correo_contacto" type="mail" class="form-control" name="correo_contacto" value="{{ old('correo_contacto') }}" required>

                                    @if ($errors->has('correo_contacto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('correo_contacto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telefono_contacto') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Teléfono de Contacto</label>
                                  <div class="col-md-4">
                                    <input type="text" class="form-control" id="telefono_contacto" name="telefono_contacto" data-inputmask="'mask': '(9999)-9999999'" required/>
                                  </div>

                                  @if ($errors->has('telefono_contacto'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('telefono_contacto') }}</strong>
                                      </span>
                                  @endif
                            </div>

                            <div class="form-group">
                                  <div class="col-md-4 col-md-offset-4">
                                  {!! app('captcha')->display() !!}
                                  </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('datepicker')
  <!-- Datepicker Files -->
  <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
  <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
  <!-- Languaje -->
  <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
  <script type="text/javascript">
  $('#fecha_nacimiento').datepicker({
    format: "dd/mm/yyyy",
    language: "es",
    autoclose: true,
    todayHighlight: true
  });
  </script>
@endsection

@section('inputmask')
  <script src="{{ asset('inputMask/jquery.inputmask.bundle.js') }} "></script>
  <script type="text/javascript">
    $("#telefono").inputmask();
    $("#celular").inputmask();
    $("#telefono_contacto").inputmask();
  </script>
@endsection

@section('empresa')
  <script type="text/javascript">
      $("#tipo_empresa").change(function(){
        var tipo_empresa = $("#tipo_empresa").val();
        $("#divLoading").removeClass('hide');
        if (!tipo_empresa || tipo_empresa === "0"){
          $("#divEmpresa").addClass('hide');
        }else{
          $("#divEmpresa").removeClass('hide');
          $.ajax({
            data: {"cod_empresa" : tipo_empresa},
            type: "GET",
            dataType: "json",
            url: "api/empresas",
          })
          .done(function( data, textStatus, jqXHR ) {
            if ( console && console.log ) {
              $('#cod_empresa')
               .empty()
               .append('<option selected="selected" value="">Seleccione</option>');

              $.each(data, function (index, value) {
                  $('#cod_empresa').append($('<option/>', {
                      value: value.cod_empresa,
                      text : value.nombre
                    }));
              });
            }
          })
          .fail(function( jqXHR, textStatus, errorThrown ) {
            if ( console && console.log ) {
              console.log( "La solicitud a fallado: " +  textStatus);
            }
          });
        }
        $("#divLoading").addClass('hide');
      });
  </script>
@endsection
