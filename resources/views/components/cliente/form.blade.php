<div class="row g-3 pb-5">
    <div class="col-sm-6">
        {{  $cliente->nombre }}
        <label for="validationCustom01" class="form-label">Nombre</label>
        <input  type="text" value="@isset($cliente->nombre) {{ $cliente->nombre }} @else {{ old('nombre') }} @endisset"
                class="form-control @error('nombre') is-invalid @enderror"
                name="nombre" id="validationCustom01" placeholder="Nombre">
        @error('nombre')
        <div class="invalid-feedback">
            Nombre es requerido.
        </div>
        @enderror
        <div class="valid-feedback">
            Looks good!
        </div>

    </div>

    <div class="col-sm-6">
        <label for="apellido" class="form-label">Apellido</label>
        <input  type="text" value="{{ old('apellido') }}"
                class="form-control @error('apellido') is-invalid @enderror"
                name="apellido" id="apellido" placeholder="Apellido">
        @error('apellido')
        <div class="invalid-feedback">
            Apellido es requerido
        </div>
        @enderror
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>

    <div class="col-12">
        <label for="cedula" class="form-label">Cedula</label>
        <div class="input-group has-validation">
            <input  type="text" value="{{ old('cedula') }}"
                    class="form-control @error('cedula') is-invalid @enderror"
                    name="cedula" id="cedula" placeholder="Cedula">
            @error('cedula')
            <div class="invalid-feedback">
                Cedula es requerida
            </div>
            @enderror
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <label for="telefono" class="form-label">Telefono</label>
        <div class="input-group has-validation">
            <input  type="text" value="{{ old('telefono') }}" 
                    class="form-control @error('telefono') is-invalid @enderror"
                    name="telefono" id="telefono" placeholder="Telefono">
            @error('telefono')
            <div class="invalid-feedback">
                Telefono es requerido
            </div>
            @enderror
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
    </div>

    <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <input  type="email"value="{{ old('email') }}"
                class="form-control @error('email') is-invalid @enderror"
                name="email" id="email" placeholder="you@example.com" >
        @error('email')
        <div class="invalid-feedback">
            Por favor introduce un email valido.
        </div>
        @enderror
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>

    <div class="col-12">
        <label for="direccion" class="form-label">Direccion</label>
        <input  type="text" value="{{ old('direccion') }}"
                class="form-control @error('direccion') is-invalid @enderror"
                name="direccion" id="direccion" placeholder="1234 Main St" ="">
        @error('direccion')
        <div class="invalid-feedback">
            Por favor introduce una direccion.
        </div>
        @enderror
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>

    <div class="col-sm-6">
        <label for="estadoCivil" class="form-label">Estado civil</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                >
            <label class="form-check-label" for="flexRadioDefault1">
                Soltero
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                >
            <label class="form-check-label" for="flexRadioDefault2">
                Casado
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                >
            <label class="form-check-label" for="flexRadioDefault2">
                Union libre
            </label>
        </div>
        <div class="invalid-feedback">
            Por favor introduce un estado civil.
        </div>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-primary btn-lg" type="submit">Guardar</button>
    </div>
</div>