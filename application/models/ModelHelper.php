<?php


class ModelHelper 
{
    
     public function getUrl($argUrl)
    {
        $currentPage = $this->getPage();

        $nextUrl = "?page=" . $currentPage + 1;
        $prevUrl = "?page=" . $currentPage - 1;

        if ($currentPage * $this->perPage + 1  >=  $this->count()) {
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
