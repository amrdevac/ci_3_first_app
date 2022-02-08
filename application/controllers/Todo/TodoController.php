<?php

class TodoController extends CI_Controller
{

    private $todoService;
    private $response;
    private $request;

    public function __construct()
    {
        parent::__construct();
        require_once(BaseController('Service\ResponseService.php'));

        require_once(BaseController('Service\RequestService.php'));
        require("TodoService.php");
        $this->todoService = new TodoService;
        $this->response = new ResponseService;
        $this->request = new RequestService;
    }

    public function index()
    {
        return $this->response->get($this->todoService->mendapatkanSeluruhData());
    }


    public function store()
    {
        return $this->response->store($this->todoService->menyimpanData($this->request->set()));
    }


    public function update($argTodoPrimary)
    {
        return $this->response->update($this->todoService->memperbaruiData($this->request->set(), $argTodoPrimary));
    }


    public function destroy($argTodoPrimary)
    {
        return $this->response->delete($this->todoService->menghapusData($argTodoPrimary));
    }
}
