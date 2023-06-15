<?php

use models\articulo;

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
        $this->_view->assign('articulos',articulo::select('id','Descripcion','Precio','Stock')->get());

        $this->_view->render('index');
    }

    public function create()
    {
        $this->getMessages();

        $this->_view->assign('title','Articulos');
        $this->_view->assign('asunto','Nuevo Articulo');
        $this->_view->assign('articulo', Session::get('data'));
        $this->_view->assign('process','articulos/store');
        $this->_view->assign('send', $this->encrypt($this->getForm()));

        $this->_view->render('create');
    }

    public function store()
    {
        $this->validateForm('articulos/create',[
            'Nombre' => Filter::getText('Descripcion'),
        ]);

        $Articulo = articulo::select('id')->where('Descripcion', Filter::getText('Descripcion'))->first();

        if($Articulo){
            Session::set('msg_error','El Articulo ingresado ya existe... intente con otro');
            $this->redirect('articulo/create');
        }

        $Articulo = new articulo;
        $Articulo->Descripcion = Filter::getText('Descripcion');
        $Articulo->save();

        Session::destroy('data');

        Session::set('msg_success','El Articulo se ha registrado correctamente');
        $this->redirect('articulos');
    }

    public function show($id = null)
    {
        Validate::validateModel(articulo::class, $id, 'error/error');

        $this->getMessages();

        $this->_view->assign('title','Articulos');
        $this->_view->assign('asunto','Detalle de Articulo');
        $this->_view->assign('articulo', articulo::find(Filter::filterInt($id)));
        $this->_view->render('show');
    }

    public function edit($id = null)
    {
        Validate::validateModel(articulo::class, $id, 'error/error');

        $this->getMessages();

        $this->_view->assign('title','Articulos');
        $this->_view->assign('asunto','Editar Articulo');
        $this->_view->assign('articulo', articulo::find(Filter::filterInt($id)));
        $this->_view->assign('process',"articulos/update/{$id}");
        $this->_view->assign('send', $this->encrypt($this->getForm()));

        $this->_view->render('edit');
    }

    public function update($id = null)
    {
        $this->validatePUT();
        $this->validateForm("articulos/edit/{$id}",[
            'Descripcion' => Filter::getText('Descripcion'),
        ]);

        $Articulo = articulo::find(Filter::filterInt($id));
        $Articulo->Descripcion = Filter::getText('Descripcion');
        $Articulo->save();

        Session::set('msg_success','El Articulo se ha modificado correctamente');
        $this->redirect('articulos/show/' . $id);
    }
}