<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Credenciais</h3>
        </div>
        <div class="panel-body">
            {{ Form::hidden('profile_key', Crypt::encrypt('companies')) }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Dados de Perfil</h3>
        </div>
        <div class="panel-body">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nome</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('localy') ? ' has-error' : '' }}">
                <label for="localy" class="col-md-4 control-label">Localidade</label>

                <div class="col-md-6">
                    <input id="localy" type="text" class="form-control" name="localy" value="{{ old('localy') }}" autofocus>

                    @if ($errors->has('localy'))
                        <span class="help-block">
                            <strong>{{ $errors->first('localy') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                <label for="website" class="col-md-4 control-label">Website</label>

                <div class="col-md-6">
                    <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}" autofocus>

                    @if ($errors->has('website'))
                        <span class="help-block">
                            <strong>{{ $errors->first('website') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('activity') ? ' has-error' : '' }}">
                <label for="activity" class="col-md-4 control-label">Área de Actividade</label>

                <div class="col-md-6">
                    <input id="activity" type="text" class="form-control" name="activity" value="{{ old('activity') }}">

                    @if ($errors->has('activity'))
                        <span class="help-block">
                            <strong>{{ $errors->first('activity') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Registar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
