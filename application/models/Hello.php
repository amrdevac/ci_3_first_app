<?php

class Hello extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor parent::__construct();
    }

    //This method retrieves the users list and returns an array of
    //objects each containing user details
    function sidebars()
    {
        $query = $this->db->get('sidebars');
        return $query->result_array();
    }

    public function subsidebar()
    {
        $query = $this->db->get('sub_sidebars');
        return $query->result_array();
    }
}
