<?php

class TodoModel extends CI_Model
{

    public $table = "todo";
    protected $primaryKey = "kd_todo";
    private $perPage = 2;
    private $page = null;
    private $modelService;

    public function __construct()
    {
        parent::__construct();

        require(BaseController("Service\ModelService.php"));
        $this->modelService = new ModelService;
        $this->page = intval($this->input->get('page')) ?? 0;
    }


    function paginate()
    {
        $data = $this->db
            ->order_by("created_at", "DESC")
            ->get(
                $this->table,
                $this->perPage,
                $this->page * $this->perPage,
            )->result();

        return $this->modelService->paginate(
            $data,
            $this->table,
            $this->perPage,
            $this->page,
            $this->count(),
        );
    }


    public function all()
    {
        return ["data" => $this->db->get($this->table)->result(), "total" => $this->count()];
    }

    public function getById($argTodoPrimary)
    {
        return $this->db->where("kd_todo", $argTodoPrimary)->get($this->table)->result();
    }

    public function count()
    {
        return $this->db->count_all($this->table);
    }
}
