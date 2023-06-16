<div class="col-md-6">
    <form action="{$_layoutParams.root}{$process}" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" value="{$articulo.nombre|default:""}" class="form-control" id="nombre" aria-describedby="nombre">
            <div id="nombre" class="form-text text-danger">Ingrese el nombre del artículo</div>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control">{$articulo.descripcion|default:""}</textarea>
            <div id="descripcion" class="form-text text-danger">Ingrese la descripcion del artículo</div>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" value="{$articulo.precio|default:""}" class="form-control" id="precio" aria-describedby="precio">
            <div id="precio" class="form-text text-danger">Ingrese el precio del artículo</div>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" value="{$articulo.stock|default:""}" class="form-control" id="stock" aria-describedby="stock">
            <div id="stock" class="form-text text-danger">Ingrese el stock del artículo</div>
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <select name="marca" class="form-control">
                <option value="">Seleccione...</option>
                {foreach from=$marcas item=marca}
                    <option value="{$marca.id}">{$marca.nombre}</option>
                {/foreach}
            </select>
            <div id="marca" class="form-text text-danger">Seleccione la marca del artículo</div>
        </div>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="send" value="{$send}">
        <button type="submit" class="btn btn-outline-primary btn-sm">Guardar</a>
    </form>
</div>