<template>
  <div>
    <v-container class="fill-height">
      <v-row align="center" justify="center">
        <v-btn
          v-if="!isModification"
          color="cyan"
          fab
          dark
          icon
          small
          @click.stop="drawer = !drawer"
        >
          <v-icon>mdi-plus</v-icon>
        </v-btn>
        <v-btn
          v-if="isModification"
          color="cyan"
          fab
          dark
          icon
          small
          @click.stop="drawer = !drawer, editProducteur(producteur)"
        >
          <v-icon>mdi-pencil</v-icon>
        </v-btn>
      </v-row>
    </v-container>

    <v-navigation-drawer v-model="drawer" absolute temporary right>
      <template v-slot:prepend>
        <v-list-item v-if="isModification">Modification du producteur {{producteur.name}}</v-list-item>
        <v-list-item v-if="!isModification">Ajout d'un producteur</v-list-item>
      </template>
      <v-row col="12">
        <v-list dense nav class="py-0">
          <v-col>
            <v-list-item>
              <v-text-field v-model="producteurName" label="Nom du Producteur"></v-text-field>
            </v-list-item>
          </v-col>

          <v-col>
            <v-list-item>
              <v-text-field v-model="producteurEmail" label="Email du Producteur"></v-text-field>
            </v-list-item>
          </v-col>
        </v-list>
      </v-row>

      <template v-slot:append>
        <v-btn color="success" fab dark icon small @click="drawer = !drawer, addOrUpdate()">
          <v-icon>mdi-check</v-icon>
        </v-btn>
        <v-btn color="error" fab dark icon small @click="drawer = !drawer">
          <v-icon>mdi-cancel</v-icon>
        </v-btn>
      </template>
    </v-navigation-drawer>
  </div>
</template>
<script src="./drawerProducteur.js"/>