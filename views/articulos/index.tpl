<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<div class="col-md-12">
    <div class="card">
        <h3 class="card-header">
            {$asunto}
            <a href="{$_layoutParams.root}articulos/create" class="btn btn-outline-primary btn-sm">Nuevo Articulo</a>
        </h3>
        <div class="card-body">
            {include file="../partials/_messages.tpl"}
            {if isset($articulos) && count($articulos)}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$articulos item=model}
                            <tr>
                                <td>{$model.id}</td>
                                <td>{$model.Descripcion}</td>
                                <td>
                                <a href="{$_layoutParams.root}articulos/show/{$model.id}" class="btn btn-outline-primary btn-sm">Ver</a>
                                <a href="{$_layoutParams.root}articulos/edit/{$model.id}" class="btn btn-outline-primary btn-sm">Editar</a>
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            {else}
                <p class="text-info">{$mensaje}</p>
            {/if}
        </div>
    </div>
</div>