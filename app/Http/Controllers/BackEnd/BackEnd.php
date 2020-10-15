<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BackEnd extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;

    }// end of __construct function

    public function index()
    {
        $rows = $this->model;

        $rows = $this->filter($rows);

        $rows = $rows->paginate(5);

        $moduleName = $this->pluralModelName();

        $sModelName = $this->getModelName();

        $pageTitle  = 'Control '.$moduleName ;

        $routeName =  $this->getClassNameFromModel();

        $pageDes    = 'Here you can add / edit / update / delete ' . $moduleName;

        return view('back-end.'.$this->getClassNameFromModel().'.index' , compact(
            'rows',
            'moduleName',
            'sModelName',
            'pageTitle',
            'pageDes',
            'routeName'
        ));
    }// end of index function

    public function create()
    {
        $moduleName = $this->getModelName();

        $pageTitle  = ' Create ' .$moduleName  ;

        $pageDes    = 'Here you can  create new ' . $moduleName;

        return view('back-end.'.$this->getClassNameFromModel().'.create' , compact(
            'moduleName',
            'pageTitle',
            'pageDes'
        ));
    }// end of create function

    public function edit($id)
    {
        $row = $this->model->findOrFail($id);

        $moduleName = $this->getModelName();

        $pageTitle  = 'Edit ' . $moduleName ;

        $pageDes    = 'Here you can  edit ' . $moduleName;


        return view('back-end.'.$this->getClassNameFromModel().'.edit' , compact(
            'row',
            'moduleName',
            'pageTitle',
            'pageDes'
        ));
    }// end of edit function


    public function destroy($id)
    {

        $this->model->findOrFail($id)->delete();

        return redirect(route($this->getClassNameFromModel().'.index'));

    }// end of destroy function


    protected function filter($rows)
    {
        return $rows;
    }

    protected function getClassNameFromModel()
    {
        return strtolower($this->pluralModelName());
    }// end of getClassNameFromModel function

    protected function pluralModelName()
    {
        return str::plural($this->getModelName());
    }// end of pluralModelName function

    protected function getModelName()
    {
        return class_basename($this->model) ;
    }



}// end of Parant controller
