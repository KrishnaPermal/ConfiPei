<template>
  <div>

<!--  Navbar -->
    <v-app-bar color="cyan darken-1" dark fullscreen>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
     <v-toolbar-title>
          <h1 class="headline font-italic">CONFIPEI</h1>
      </v-toolbar-title>

      <v-spacer></v-spacer>
       <!--ajout component Panier-->
        <Panier></Panier>
      <!--ajout component Panier--> 
    </v-app-bar>

     <v-divider></v-divider>

 <!-- Navigation vertical -->
    <v-navigation-drawer v-model="drawer" absolute temporary>
     <v-img :aspect-ratio="16/9" src="https://www.mycuisine.com/wp-content/uploads/2017/06/pots_de_confiture-768x461.jpg"></v-img>
      <v-list-item>
        <v-list-item-content color="black">
          <v-list-item-title class="font-italic">CONFIPEI</v-list-item-title>
          <v-list-item-subtitle class="font-italic">BIENVENUE SUR NOTRE SITE</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

<v-divider></v-divider>

      <v-list rounded>
        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-home</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold">
              <router-link :to="{name:'home'}">Accueil</router-link>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

 <v-divider></v-divider>

         <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-view-dashboard</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold">
              <router-link :to="{name:'dashboard'}">Dashboard</router-link>
            </v-list-item-title>
          </v-list-item-content>
         </v-list-item>

<v-divider></v-divider>

         <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-shopping</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold">
              <router-link :to="{name:'confitures'}">Confitures</router-link>
            </v-list-item-title>
          </v-list-item-content>
         </v-list-item>

<v-divider></v-divider>

         <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-shopping</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold">
              <router-link :to="{name:'dashproducteur'}">DashProducteurs</router-link>
            </v-list-item-title>
          </v-list-item-content>
         </v-list-item>

<v-divider></v-divider>

         <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-shopping</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold">
              <router-link :to="{name:'client'}">Clients</router-link>
            </v-list-item-title>
          </v-list-item-content>
         </v-list-item>

<v-divider></v-divider>


         <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-shopping</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold">
              <router-link :to="{name:'producteurs'}">Producteurs</router-link>
            </v-list-item-title>
          </v-list-item-content>
         </v-list-item>

<v-divider></v-divider>

          <v-list-item link v-if="isChecked">
            <v-list-item-icon>
              <v-icon>mdi-logout</v-icon>
            </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold">
              <a @click="logout" class="nav-item nav-link">Se deconnecter</a>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

<v-divider></v-divider>

         <v-list-item link v-if="!isChecked">
          <v-list-item-icon>
            <v-icon>mdi-login-variant</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title class="font-weight-bold">
              <router-link :to="{name:'login'}">Login</router-link>
            </v-list-item-title>
          </v-list-item-content>
         </v-list-item>


      </v-list>
    </v-navigation-drawer>
<!-- Navigation vertical -->
  </div>
</template>




<script>
import { authenticationService } from '../_services/authentication.service';
import Panier from '../views/components/Panier.vue';
import { Role } from '../_helpers/role';
import router from '../routes';
export default {

  components:{
    Panier
  },

  data() {
    return {
      currentUser: null,
      drawer: null,
      items: [
        { title: "Accueil", icon: "mdi-home" },
        { title: "Dashboard", icon: "mdi-view-dashboard" },
        { title: "Confitures", icon: "mdi-shopping" },
        { title: "DashProducteurs", icon: "mdi-account" },
        { title: "Client", icon: "mdi-account" },
        { title: "Producteurs", icon: "mdi-account" },
        { title: "Login", icon: "mdi-login-variant" },
      ], 
    };
  },
  computed: {
    isAdmin() {
      return this.currentUser && this.currentUser.role.role === Role.Admin;
    },
    isChecked() {
      return this.currentUser;
    }
  },
  created() {
    authenticationService.currentUser.subscribe(x => (this.currentUser = x));
  },
  methods: {
    logout() {
      authenticationService.logout();
      router.push("/login");
    }
  }
};
</script>
