<template>
    <v-row>
        <v-col cols="12" sm="6" md="12">
            <v-text-field 
            type="number" 
            min="0" 
            v-model="quantity"
            :max="produit.quantity"
            label="Nombre"
            filled
            dense 
            required
            :hint="produit.quantity<5 ? 'Quantité restante: '+produit.quantity : ''"
            :persistent-hint="produit.quantity<5"
            :disabled="produit.quantity.quantity==0"
            :error-messages="produit.quantity==0 ? 'Stock épuisé' : ''" 
            ></v-text-field>
            <v-btn :disabled="quantity==0" @click="add">
                <v-icon>mdi-plus</v-icon> Ajouter
            </v-btn>
        </v-col>
    </v-row>
</template>

<script src="./addPanier.js"></script>

