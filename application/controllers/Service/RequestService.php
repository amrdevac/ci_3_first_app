<?php

class RequestService extends CI_Controller
{

    public function set()
    {
        if ($this->input->raw_input_stream) {
            return $this->json();
        }
        if ($this->input->post()) {
            return $this->formData();
        }
    }


    public function toArray($request)
    {
        $arrayData = [];
        foreach ($request as $key => $value) {
            $arrayData[$key] = $value;
        }
        
        if ($this->input->method() == "POST") {
            $arrayData["created_at"] = date("Y-m-d H:i:s");
        }
        return $arrayData;
    }


    public function json()
    {
        return $this->toArray(json_decode($this->input->raw_input_stream));
    }


    public function formData()
    {
        return $this->toArray($this->input->post());
    }
}
