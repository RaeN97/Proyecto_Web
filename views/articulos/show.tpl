<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<div class="col-md-12">
    <div class="card">
        <h3 class="card-header">
            {$asunto}
        </h3>
        <div class="card-body">
            {include file="../partials/_messages.tpl"}
            <table class="table table-hover">
                <tr>
                    <th>Codigo:</th>
                    <td>{$articulo.id}</td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td>{$articulo.Descripcion}</td>
                </tr>
                <tr>
                    <th>Fecha de creación:</th>
                    <td>{$articulo.created_at}</td>
                </tr>
                <tr>
                    <th>Fecha de actualización:</th>
                    <td>{$articulo.updated_at}</td>
                </tr>
            </table>
            <a href="{$_layoutParams.root}articulos" class="btn btn-outline-primary btn-sm">Volver</a>      
        </div>
    </div>
</div>