<form method="POST" action="{{ route('login') }}">
    @csrf
    @if(getSetting('social-login.facebook_client_id') || getSetting('social-login.twitter_client_id') || getSetting('social-login.google_client_id'))
    <div class="my-1">
        <p class="mb-0">
            {{__("Don't have an account?")}}
            @if(isset($mode) && $mode == 'ajax')
            <a href="javascript:void(0);" onclick="LoginModal.changeActiveTab('register')" class="text-primary text-gradient font-weight-bold">{{__('Sign up')}}</a>
            @else
            <a href="{{route('register')}}" class="text-primary text-gradient font-weight-bold">{{__('Sign up')}}</a>
            @endif
        </p>
    </div>
    @endif
    <div class="form-group ">
        <label for="email" class="col-form-label">E-mail</label>
        <div class="">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-form-label">Senha</label>
        <div class="">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="loginHelpers form-group d-flex flex-row-reverse">
        @if (Route::has('password.request'))
        <div class="pull-right">
            @if(isset($mode) && $mode == 'ajax')
            <a href="javascript:void(0);" onclick="LoginModal.changeActiveTab('forgot')" class="" id="forgotPass-label">Esqueceu sua senha?</a>
            @else
            <a href="{{ route('password.request') }}" class="" id="forgotPass-label">Esqueceu sua senha?</a>
            @endif
        </div>
        @endif
    </div>

    <div class="clearfix"></div>
    <div class="form-group row mb-0 mt-4">
        <div class="col">
            <button type="submit" class="btn btn-grow btn-lg btn-primary bg-gradient-primary btn-block">
                Continuar
            </button>
        </div>
    </div>

</form>

@if(!getSetting('social-login.facebook_client_id') && !getSetting('social-login.twitter_client_id') && !getSetting('social-login.google_client_id'))
<hr>
<div class=" text-center py-2">
    <p class="">
        Não possui uma conta?
        @if(isset($mode) && $mode == 'ajax')
        <a href="javascript:void(0);" onclick="LoginModal.changeActiveTab('register')" class="text-primary text-gradient font-weight-bold">Criar uma conta</a>
        @else
        <a href="{{route('register')}}" class="text-primary text-gradient font-weight-bold">Criar uma conta</a>
        @endif
    </p>
</div>
@endif