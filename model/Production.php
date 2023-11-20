<?php

class Production extends CRUD {
    protected $table = 'production';
    protected $primaryKey = 'id';

    protected $fillable = ['year']; 
}

?>
