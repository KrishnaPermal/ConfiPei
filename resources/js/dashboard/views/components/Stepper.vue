<template>
<v-container>
  <v-stepper v-model="e1">
    <v-stepper-header>
      <v-stepper-step :complete="e1 > 1" step="1">Confirmation de la commande</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step :complete="e1 > 2" step="2">Adresse de livraison</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step step="3">Paiement</v-stepper-step>
    </v-stepper-header>

    <v-stepper-items>
      <v-stepper-content step="1">
        <v-row dense v-for="(product, i) in order.orderList" :key="i" cols="12">
          <v-col>
            <v-card>
              <div class="d-flex justify-space-between">
                <div>
                  <v-card-title class="headline" v-text="product.name"></v-card-title>
                  <v-card-subtitle v-text="'Prix:'+product.price"></v-card-subtitle>
                  <v-card-subtitle v-text="'Nombre de produit:'+product.quantity"></v-card-subtitle>
                  <v-card-subtitle v-text="'Total:'+product.price * product.quantity"></v-card-subtitle>
                </div>
              </div>
            </v-card>
          </v-col>
        </v-row>

        <v-btn color="primary" @click="e1 = 2">Valider</v-btn>

        <v-btn to="/basket" text>Annuler</v-btn>
      </v-stepper-content>

      <v-stepper-content step="2" class="text-center">
        <span>Adresse de livraison</span>
          <v-row>
            <v-col col="2" md="4">
              <v-text-field label="Nom*" :rules="rules" v-model="order.adresseLivraison.name"></v-text-field>
            </v-col>
            <v-col col="2" md="4">
              <v-text-field label="Prenom*" :rules="rules" v-model="order.adresseLivraison.firstname"></v-text-field>
            </v-col>
            <v-col col="2" md="4">
              <v-text-field label="Pays*" :rules="rules" v-model="order.adresseLivraison.country"></v-text-field>
            </v-col>
            <v-col col="2" md="4">
              <v-text-field label="Ville*" :rules="rules" v-model="order.adresseLivraison.city"></v-text-field>
            </v-col>
            <v-col col="2" md="4">
              <v-text-field
                label="Adresse*"
                :rules="rules"
                v-model="order.adresseLivraison.address"
              ></v-text-field>
            </v-col>
            <v-col col="2" md="4">
              <v-text-field
                label="Code Postal*"
                :rules="rules"
                v-model="order.adresseLivraison.postal_code"
              ></v-text-field>
            </v-col>
            <v-col col="2" md="4">
              <v-text-field label="Téléphone*" :rules="rules" v-model="order.adresseLivraison.phone"></v-text-field>
            </v-col>
          </v-row>
        <v-switch v-model="selectable" label="Adresse de livraison est la même que l'adresse de facturation"></v-switch>
        <div v-if="selectable">
          <v-divider></v-divider>

          <span>Adresse de facturation</span>
            <v-row>
              <v-col col="2" md="4">
                <v-text-field label="Nom*" :rules="rules" v-model="order.adresseFacturation.name"></v-text-field>
              </v-col>
              <v-col col="2" md="4">
                <v-text-field
                  label="Prenom*"
                  :rules="rules"
                  v-model="order.adresseFacturation.firstname"
                ></v-text-field>
              </v-col>
              <v-col col="2" md="4">
                <v-text-field label="Pays*" :rules="rules" v-model="order.adresseFacturation.country"></v-text-field>
              </v-col>
              <v-col col="2" md="4">
                <v-text-field
                  label="Ville*"
                  :rules="rules"
                  v-model="order.adresseFacturation.city"
                ></v-text-field>
              </v-col>
              <v-col col="2" md="4">
                <v-text-field
                  label="Adresse*"
                  :rules="rules"
                  v-model="order.adresseFacturation.address"
                ></v-text-field>
              </v-col>
              <v-col col="2" md="4">
                <v-text-field
                  label="Code Postal*"
                  :rules="rules"
                  v-model="order.adresseFacturation.postal_code"
                ></v-text-field>
              </v-col>
              <v-col col="2" md="4">
              <v-text-field label="Téléphone*" :rules="rules" v-model="order.adresseLivraison.phone"></v-text-field>
            </v-col>
            </v-row>
        </div>
        <v-btn color="primary" :disabled="!valid" @click="e1 = 3,sendOrder() ">Valider</v-btn>

        <v-btn text @click="e1 = 1">Retour</v-btn>
      </v-stepper-content>


<!--Récapitulatif-->
      <v-stepper-content step="3">
         <v-row justify="center">
           <v-expansion-panels v-model="panel" multiple hover>
             <v-expansion-panel>
               <v-expansion-panel-header>
                 <span>Récapitulatif de la commande :</span>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row dense cols="12">
                    <v-col v-for="(product, i) in order.orderList" :key="i">
                      <v-card max-width="400">
                        <div class="d-flex justify-space-between">
                          <div>
                            <v-card-title class="headline" v-text="product.name"></v-card-title>
                            <v-card-subtitle v-text="'Prix:'+product.price"></v-card-subtitle>
                            <v-card-subtitle v-text="'Nombre de produit:'+product.quantity"></v-card-subtitle>
                            <v-card-subtitle v-text="'Total:'+product.price * product.quantity"></v-card-subtitle>
                          </div>
                        </div>
                      </v-card>
                    </v-col>
                  </v-row>
        
              </v-expansion-panel-content>
            </v-expansion-panel>
            <v-expansion-panel>
              <v-expansion-panel-header>
                <span>Paiement :</span>
              </v-expansion-panel-header>
              <v-expansion-panel-content>
                  <v-stripe-card v-model="source" :api-key="apiKey"></v-stripe-card>
              </v-expansion-panel-content>
            </v-expansion-panel>
          </v-expansion-panels>
        </v-row>
        <v-row>
          <v-col md="12">
            <v-btn color="success" @click="process" :disabled="!source">Payer</v-btn>
          </v-col>
        </v-row>
                     
        <v-btn text @click="e1 =2">Retour</v-btn>

<!--Récapitulatif-->
      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
</v-container>
</template>

<script src="./Stepper.js"/>