<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ResponseService extends CI_Controller
{

    public function response($argData, $argStatus = 200)
    {
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($argStatus)
            ->set_output(json_encode($argData));
    }
    public function get($argData)
    {
        return $this->response($argData);
    }

    public function store($argData)
    {
        $response = [
            "message" => "Berhasil menyimpan data",
            "data" => $argData,
        ];
        $this->response($response, 201);
    }

    public function update($argData)
    {
        $response = [
            "message" => "Berhasil memperbarui data",
            "data" => $argData,
        ];
        return $this->response($response);
    }

    public function delete($argData)
    {
        $response = [
            "message" => "Berhasil menghapus data",
            "data" => $argData,
        ];
        return $this->response($response);
    }
}
