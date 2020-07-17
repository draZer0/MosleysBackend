<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
      'merk',
      'type',
      'prijs',
      'bouwjaar',
      'categorie',
      'transmissie',
      'brandstof',
      'kmstand'       
  ];
}
