/* import Axios from "axios";
import {apiServices} from '../../_services/api.services'
import { authenticationService } from "../../_services/authentication.service";
import addProducteurs from './addProducteurs.vue';


export default {
    components: {
        addProducteurs,
       
    },
    data: () => ({
        dialog: false,
        headers: [
            { text: 'Name', value: 'name'},
            { text: 'Producteurs', value: 'id_producteur'},
            { text: 'Email', value: 'user.email'},
            { text: 'Actions', value: 'actions', sortable: false},
        ],

        producteurs: [],
        
    }),
    
    created() {
        this.getProducteurs();
    },

    methods: {
        getProducteurs() {
            apiServices.get('api/admin/producteurs').then(data => {
                data.data.data.forEach(producteur => {
                    this.producteurs.push(producteur)
                    console.log(producteur)
                })
            })
        }
    }
};
 */