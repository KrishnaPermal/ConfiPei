/* import Axios from "axios"
import {apiServices} from '../_services/api.services';
import drawerProducteur from './components/drawerProducteur.vue';

export default {
    components: {
        drawerProducteur,
    },
    data() {
        return {
            producteurs: [],
            headers: [
                {
                    text: 'Producteur',
                    align: 'start',
                    sortable: false,
                    value: 'name',
                },
                { text: 'Email', value: 'id_users.email'},
                { text: 'Name', value: 'id_users.name'},  
                { text: 'Actions', value: 'actions'},
            ],
            isModification: true, 
        }
       
    },
    created() {
        this.getProducteurs()
    },
    methods: {
        getProducteurs() {
            apiServices.get('api/producteurs').then(response => {
                response.data.data.forEach(producteur => {
                    this.producteurs.push(producteur)
                    console.log(this.producteurs)
                    
                })
            })
        },
    }
}
 */

