<!--ICI C'EST LA VUE POUR MON PANIER-->
<template>
<v-container>
  <div class="container">
    <div class="row justify-content-center">
      <v-row class="text-center justify-center py-2">
            <h1 class="font-weight-regular display-2 ">MON PANIER</h1>
        </v-row>
        <v-row>
        <v-card v-for="(produit,key) in itemPanier" :key="key" class="mx-auto my-5" max-width="500">
        <v-container fluid>
          <v-row dense>
            <v-col class="md-4">
              <v-card-actions>
                <v-card-title>Nom :{{produit.name}}</v-card-title>
                <v-card-subtitle class="pb-0">Prix: {{produit.price}} €</v-card-subtitle>
                <v-text-field 
                  type="number"
                  min="0"
                  v-model="produit.quantity" @input="updateQuantity(produit)">
                </v-text-field>
                <v-spacer/>
              </v-card-actions>
            </v-col>
          </v-row>
          <v-row></v-row>
          </v-container>
          </v-card>
        </v-row>
        <v-container>
            
              <v-row>
         
          <v-col cols="3">
            <v-btn width="100%" @click="commandePanier">Commander</v-btn>
          </v-col>
        </v-row>
          </v-container>
      </div>
    </div>     
  </v-container>
</template>

<script src="./Basket.js">
</script>