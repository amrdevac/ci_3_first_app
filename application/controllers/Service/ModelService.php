<?php

class ModelService extends CI_Model
{


    private $table;
    private $perPage;
    private $page;
    private $total;

    public function initializeData($argTable, $argPerPage, $argPage, $argTotal)
    {
        $this->table = $argTable;
        $this->perPage = $argPerPage;
        $this->page = $argPage;
        $this->total = $argTotal;
    }


    public function paginate($argData, $argTable, $argPerPage, $argPage, $argTotal)
    {
        $this->initializeData(
            $argTable,
            $argPerPage,
            $argPage,
            $argTotal
        );

        return [
            "data" => $argData,
            "total" => $this->total,
            "perPage" => $this->perPage,
            "nextUrl" =>  $this->getUrl("nextUrl"),
            "prevUrl" =>  $this->getUrl("prevUrl"),
            "page" => $this->page
        ];
    }

    public function getUrl($argUrl)
    {
        $currentPage = $this->page;

        $nextUrl = "?page=" . $currentPage + 1;
        $prevUrl = "?page=" . $currentPage - 1;

        if ($currentPage * $this->perPage + 1  >=  $this->total) {
            $nextUrl = "null";
        }

        if ($currentPage * $this->perPage - 1  <  0) {
            $prevUrl = "null";
        }

        $url = compact(
            "nextUrl",
            "prevUrl"
        );

        return $url[$argUrl];
    }
}
