<?php

class Pays extends CRUD {
    protected $table = 'pays';
    protected $primaryKey = 'id';

    protected $fillable = ['pays_nom'];
}


?>
