<!--<template>

  <v-data-table :headers="headers" :items="producers" class="elevation-1" :items-per-page="5">
    <template v-slot:top>
      <v-card color="basil">
        <v-card-title class="text-center justify-center py-4">
          <h1 class="font-weight-bold display-2 basil--text">LISTES DES PRODUCTEURS</h1>
        </v-card-title>
      </v-card>
        <v-spacer></v-spacer>
          <v-divider></v-divider>
      <v-toolbar flat color="blue-grey lighten-4">Producteur</v-toolbar>
        <v-spacer></v-spacer>
      <drawerProducteur @update="producteurs.push($event)" />
    </template>
    <!--<template v-slot:item.nom="{ item }">{{item.name}},</template>
    <template v-slot:item.email="{ item }">{{item.id_users.email}}</template>
    <template v-slot:item.actions="{ item }">
      <drawerProducteur :producteur="item" @update="Object.assign(item,$event)"  :isModification="true" />
    </template>
  </v-data-table>   
</template>

<script src="./managementProducteurs.js"/>

