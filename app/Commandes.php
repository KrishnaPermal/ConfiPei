<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    protected $table = "commande";
    public $timestamps = false;
    
    function produit()
    {
        return $this->belongsToMany(Produits::class, 'commande_has_produit', 'id_commande','id_produit');
    }
    
    function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    function adresseLivraison(){
        return $this->belongsTo(Adresses::class, 'id_adresse_livraison');
    }
    function adresseFacturation(){
        return $this->belongsTo(Adresses::class, 'id_adresse_facturation');
    }
}
