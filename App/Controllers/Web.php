<?php
class Web extends Controller
{
    public function _404()
    {
        return $this->view("errors.404", [], false);
    }
}