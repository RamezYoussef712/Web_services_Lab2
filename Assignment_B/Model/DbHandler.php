<?php
interface DbHandler
{
    //public function connect();
    public function get_data();
    public function disconnect();
    public function get_by_id($id);
}
