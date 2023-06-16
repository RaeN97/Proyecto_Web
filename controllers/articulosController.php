<?php

use models\Articulo;
use models\Marca;

class articulosController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->getMessages();

        $this->_view->assign('title','Articulos');
        $this->_view->assign('asunto','Lista de Articulos');
        $this->_view->assign('mensaje','No hay articulos registrados');
        $this->_view->assign('articulos',Articulo::with('marca')->get());

        $this->_view->render('index');
    }

    public function create()
    {
        $this->getMessages();

        $this->_view->assign('title','Articulos');
        $this->_view->assign('asunto','Nuevo Articulo');
        $this->_view->assign('articulo', Session::get('data'));
        $this->_view->assign('process','articulos/store');
        $this->_view->assign('marcas', Marca::select('id','nombre')->get());
        $this->_view->assign('send', $this->encrypt($this->getForm()));

        $this->_view->render('create');
    }

    public function store()
    {
        $this->validateForm('articulos/create',[
            'nombre' => Filter::getText('nombre'),
            'descripcion' => Filter::getText('descripcion'),
            'precio' => Filter::getText('precio'),
            'stock' => Filter::getText('stock'),
            'marca' => Filter::getText('marca')
        ]);

        $articulo = Articulo::select('id')->where('nombre', Filter::getText('nombre'))->first();

        if($articulo){
            Session::set('msg_error','El Articulo ingresado ya existe... intente con otro');
            $this->redirect('articulos/create');
        }

        $articulo = new Articulo;
        $articulo->nombre = Filter::getText('nombre');
        $articulo->descripcion = Filter::getText('descripcion');
        $articulo->precio = Filter::getInt('precio');
        $articulo->stock = Filter::getInt('stock');
        $articulo->marca_id = Filter::getInt('marca');
        $articulo->save();

        Session::destroy('data');

        Session::set('msg_success','El Articulo se ha registrado correctamente');
        $this->redirect('articulos');
    }

    public function show($id = null)
    {
        Validate::validateModel(Articulo::class, $id, 'error/error');

        $this->getMessages();

        $this->_view->assign('title','Articulos');
        $this->_view->assign('asunto','Detalle de Articulo');
        $this->_view->assign('articulo', Articulo::with('marca')->find(Filter::filterInt($id)));
        $this->_view->render('show');
    }

    public function edit($id = null)
    {
        Validate::validateModel(Articulo::class, $id, 'error/error');

        $this->getMessages();

        $this->_view->assign('title','Articulos');
        $this->_view->assign('asunto','Editar Articulo');
        $this->_view->assign('articulo', Articulo::with('marca')->find(Filter::filterInt($id)));
        $this->_view->assign('marcas', Marca::select('id','nombre')->get());
        $this->_view->assign('process',"articulos/update/{$id}");
        $this->_view->assign('send', $this->encrypt($this->getForm()));

        $this->_view->render('edit');
    }

    public function update($id = null)
    {
        $this->validatePUT();
        $this->validateForm("articulos/edit/{$id}",[
            'nombre' => Filter::getText('nombre'),
            'descripcion' => Filter::getText('descripcion'),
            'precio' => Filter::getText('precio'),
            'stock' => Filter::getText('stock'),
            'marca' => Filter::getText('marca')
        ]);

        $articulo = Articulo::find(Filter::filterInt($id));
        $articulo->nombre = Filter::getText('nombre');
        $articulo->descripcion = Filter::getText('descripcion');
        $articulo->precio = Filter::getInt('precio');
        $articulo->stock = Filter::getInt('stock');
        $articulo->marca_id = Filter::getInt('marca');
        $articulo->save();

        Session::set('msg_success','El Articulo se ha modificado correctamente');
        $this->redirect('articulos/show/' . $id);
    }
}