<?php

// require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;


class MYSQLHandler implements DbHandler
{
    public function __construct()
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            "driver" => __driver__,
            "host" => __host__,
            "database" => __database__,
            "username" => __username__,
            "password" => __password__
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function get_data()
    {
        $glasses = capsule::table('items')->select("*")->get();
        return $glasses;
    }
    
    public function disconnect()
    {
        capsule::disconnect();
        $this->capsule = null;
    }

    public function get_by_id($id)
    {
        $id_search = capsule::table('items')->find($id);
        return $id_search;
    }

}
