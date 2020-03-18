<fieldset class="scheduler-border">
    <legend class="scheduler-border">Nombre Completo <i class="fa fa-address-book"></i></legend>
    <input type="text" name="nombre" placeholder="Nombre Completo" class="form-control" required />
    </fieldset>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Nombre De Usuario <i class="fa fa-user"></i></legend>
        <input type="text" name="user" placeholder="Nombre De Usuario" class="form-control" required/>
        <?php
            $validador -> mostrar_error_usuario();
        ?>
    </fieldset>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Contraseña <i class="fa fa-key"></i></legend>
        <input type="password" name="pass" placeholder="Contraseña" class="form-control" required/>
    </fieldset>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Email <i class="fa fa-envelope"></i></legend>
        <input type="email" name="correo" placeholder="Correo" class="form-control" required/>
    </fieldset>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Edad <i class="fa fa-user"></i></legend>
        <input type="number" name="edad" placeholder="Edad" min="1" max="120" class="form-control" required/>
    </fieldset>
    <fieldset class="scheduler-border" class="icono-s">
        <legend class="scheduler-border">Sexo <i class="fas fa-venus-mars"></i></legend>
        <input type="text" name="sexo" placeholder="Sexo (M o F)" maxlength="1" onkeyup="this.value=this.value.toUpperCase();" class="form-control" pattern="M|F" required/>
    </fieldset>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Envio de datos <i class="fa fa-envelope"></i></legend>
        <input type="submit" name="registrar" value="Enviar" class="btn-primary form-control">
</fieldset> 