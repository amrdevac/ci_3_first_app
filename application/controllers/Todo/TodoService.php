<?php

class TodoService extends CI_Controller
{

    private $instance = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('todoModel');
    }

    public function todoTable()
    {
        return $this->todoModel;
    }

    public function mendapatkanSeluruhData()
    {
        return  $this->todoTable()->paginate();
    }


    public function menghitungSeluruhData()
    {
        return  $this->todoTable()->count();
    }


    public function menyimpanData($argRequest)
    {
        $argRequest["kd_todo"] = substr(rand() * time(), 0, 9);
        $this->db->insert($this->todoTable()->table, $argRequest);
        return $argRequest;
    }

    public function memperbaruiData($argRequest, $argTodoPrimary)
    {
        dataNotFoundException($this->todoTable()->getById($argTodoPrimary), $argTodoPrimary);
        $this->db->where("kd_todo", $argTodoPrimary)->update($this->todoTable()->table, $argRequest);
        return $argRequest;
    }

    public function menghapusData($argTodoPrimary)
    {
        dataNotFoundException($this->todoTable()->getById($argTodoPrimary), $argTodoPrimary);
        $this->db->where("kd_todo", $argTodoPrimary)->delete($this->todoTable()->table, $argTodoPrimary);
        return $argTodoPrimary;
    }

    public function apply()
    {
        return $this->instance;
    }
}
