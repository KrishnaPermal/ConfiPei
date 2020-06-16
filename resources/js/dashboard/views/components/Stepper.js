import { basketService } from "../../_services/basket.service";
import { VStripeCard } from 'v-stripe-elements/lib';

export default {
    components: {
        VStripeCard
        
      },
   
    data() {
        return {
            e1: 1,
            valid: true,
            panel: [0],
            source: null,
            apiKey: 'pk_test_51GubhuEJzq6c1uiqcKECJgrxSg2tEilK4uWtvwztd6ZxVXFraX8ZlPg3i2nVebTWq3O3SA1sNHpnpZxxcb9Xwehl00UZiqQsKD',
            order: {
                orderList: {
                },
                adresseLivraison: {
                    name: '',
                    firstname: '',
                    city: '',
                    postal_code: '',
                    country: '',
                    address: '',
                    phone: '',
                },
                adresseFacturation: {
                    name: '',
                    firstname: '',
                    city: '',
                    postal_code: '',
                    country: '',
                    address: '',
                    phone: '',
                },
            },
            rules: [
                value => !!value || 'Required.',
            ],
            selectable: false,
            hidden: true,
            checkbox: false,
        }
    },

    created() {
        this.getOrder();
        
    },
    methods: {
        getOrder() {
            this.order.orderList = basketService.getBasket();
        },
        sendOrder() {
            if (this.checkbox === false) {
                _.assign(this.order.adresseFacturation, this.order.adresseLivraison)
            }
        },
        process() {
             basketService.sendOrder(this.order)
             console.log( VStripeCard) 
        }
    }
}