<?php
class Web extends Controller
{
    public function _404()
    {
        return $this->render("errors.404", [], false);
    }
}