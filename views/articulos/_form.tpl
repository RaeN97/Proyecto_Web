<form action="{$_layoutParams.root}{$process}" method="post">
    <div class="mb-3">
        <label for="articulo" class="form-label">Articulo</label>
        <input type="text" name="Descripcion" value="{$articulo.Descripcion|default:""}" class="form-control" id="articulo" aria-describedby="articulo">
        <div id="articulo" class="form-text text-danger">Ingrese el nombre del articulo</div>
    </div>
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="send" value="{$send}">
    <button type="submit" class="btn btn-outline-primary btn-sm">Guardar</a>
</form>