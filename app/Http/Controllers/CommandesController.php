<?php

namespace App\Http\Controllers;

use App\Commandes;
use App\Produits;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommandesController extends Controller
{
    public function pushPanier(Request $request){

        $validator = Validator::make(
            $request->input(),
            [
                "order" => "required",
            ],
        )->validate();
        $user = $request->user();
DB::beginTransaction();
Try {
if($user){
$createCommande = new Commandes;    
$loggedUser = User::where('id','=',$user->id)->first();
if(!$loggedUser){
    throw new Exception('Pas connecté');
}
$createCommande->users()->associate($loggedUser);
$createCommande->save();
foreach($validator['order'] as $_order){
    $quantity = $_order['produitQuantity'];
    $idConfiture = $_order['id'];
    $confiture = Produits::find($idConfiture);
    if(!$confiture){
        throw new Exception('Produits incorrects');
    }
    $createCommande->produit()->attach($confiture, ['quantity'=>$quantity]);

}

}

}
catch(Exception $e){
    DB::rollback();
    return $e->getMessage();
}

DB::commit();
        return $createCommande;

    }
}
