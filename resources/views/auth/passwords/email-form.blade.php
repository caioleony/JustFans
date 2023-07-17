<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="form-group ">
        <label for="email" class=" col-form-label ">E-mail</label>
        <div class="">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col">
            <button type="submit" class="btn btn-grow btn-lg btn-primary bg-gradient-primary btn-block">
                Recuperar senha
            </button>
        </div>
    </div>
</form>
<hr>
<div class=" text-center">
    <p class="mb-4">
        Não possui uma conta?
        @if(isset($mode) && $mode == 'ajax')
        <a href="javascript:void(0);" onclick="LoginModal.changeActiveTab('register')" class="text-primary text-gradient font-weight-bold">Criar uma conta</a>
        @else
        <a href="{{route('register')}}" class="text-primary text-gradient font-weight-bold">Criar uma conta</a>
        @endif
    </p>
</div>