<!-- <template>
    <v-data-table :headers="headers" :items="producteurs" class="elevation-1" :items-per-page="20">
      <template v-slot:top>
      
<v-card color="basil">
   
    <v-card-title class="text-center justify-center py-4">
      <h1 class="font-weight-bold display-2 basil--text">LISTES DES PRODUCTEURS</h1>
    </v-card-title>
  </v-card>



<v-spacer></v-spacer>
<v-divider></v-divider>

        <v-toolbar flat color="blue-grey lighten-4">
          <v-spacer></v-spacer>

          <addProduit v-on:addProducteurs="producteurs.push($event)"/>
        </v-toolbar>
      </template>
      <template v-slot:item.producteur="{ item }">{{item.name}}</template>
      <template v-slot:item.id_producteur="{ item }">{{item.name}}</template>

      <template v-slot:item.actions="{ item }"><addProducteurs v-on:addProducteurs="producteurs.push($event)" :producteur="item" :isModification='true'></addProducteurs></template>
    </v-data-table>
</template>

<script src="./ProducteursTable.js"/> -->