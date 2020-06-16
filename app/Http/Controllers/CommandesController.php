<?php

namespace App\Http\Controllers;

use App\Adresses;
use App\Commandes;
use App\Http\Resources\CommandesResource;
use App\Produits;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommandesController extends Controller
{
    public function pushPanier(Request $request){

        $commandes = Validator::make(
            $request->all(),
            [
                "order" => "required",
                "adresseLivraison" => 'required',
                "adresseFacturation" => 'required',
            ],
        )->validate();
        $user = $request->user();
        DB::beginTransaction();
        try {
            if($user){
               $createCommande = new Commandes;
               $user = $this->addUserToOrder($user, $createCommande);
               $this->addAdresseLivraison($commandes['adresseLivraison'], $createCommande, $user);
               $this->addAdresseFacturation($commandes['adresseFacturation'], $createCommande, $user);
               $createCommande->save();
               $this->addProductsToOrder($commandes['order'], $createCommande);   
             
    
               
            }

        } catch(Exception $e){
            DB::rollback();
            return $e->getMessage();
        }

        DB::commit();
        return new CommandesResource($createCommande);

    }

    function addAdresseLivraison($adresse, &$commande, $user)
    {
        $adresse = $this->createAdresse($adresse, $user);
        $commande->adresseLivraison()->associate($adresse);
    }
    function addAdresseFacturation($adresse, &$commande, $user)
    {
        $adresse = $this->createAdresse($adresse, $user);
        $commande->adresseFacturation()->associate($adresse);
    }

    function createAdresse($_adresse, $user)
    {
        $adresse =  new Adresses;
        $adresse->name = $_adresse['name'];
        $adresse->firstname = $_adresse['firstname'];
        $adresse->country = $_adresse['country'];
        $adresse->city = $_adresse['city'];
        $adresse->address = $_adresse['address'];
        $adresse->postal_code = $_adresse['postal_code'];
        $adresse->phone = $_adresse['phone'];
        $adresse->user()->associate($user);
        $adresse->save();
        return $adresse;
    }

    function addUserToOrder($user, &$commande){

        $loggedUser = User::where('id','=',$user->id)->first();
        if(!$loggedUser){
            throw new Exception('Pas connecté');
        }
        $commande->users()->associate($loggedUser);
        return $loggedUser;
    }

    function addProductsToOrder($basket, &$commande)
    {
        foreach($basket as $_commande){
            $quantity = $_commande['quantity'];
            $idProduit = $_commande['id'];
            $produit = Produits::find($idProduit);
            if(!$produit){
               throw new Exception('Produits incorrects');
            }
            $commande->produit()->attach($produit, ['quantity'=>$quantity]); 

            

        }
        
    }

}

















