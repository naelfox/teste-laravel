<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Venda extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cliente_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function vendaProdutos()
    {
        return $this->hasMany(VendaProduto::class, 'venda_id', 'id');
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'venda_produtos')->withPivot('produto_quantidade');
    }



}
