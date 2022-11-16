<?php

namespace Kw\Models;
use Kw\Models\Model;

class Product extends Model {
    protected $table = "products";
    protected $orderBy = "id";
}