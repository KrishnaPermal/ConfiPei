import { apiServices } from "../../_services/api.services";

export default {
    props: {
        producteurs: {
            default: function () {
                return {}
            }
        },
        producteur: {
            default: false
        },
        isModification: {
            default: false
        },
        data: () => ({
            dialog: false,
            name: '',
            id: null,
        }),

        methods: {

            addDatas(){
                apiServices.post('api/admin/producteurs', {
                    id: this.id,
                    name: this.name,
                }).then(({data}) => {
                    this.$emit('addProducteurs', data.data)
                    console.log(data.data)
                })
            },

            editProducteur(producteur) {
                this.id = producteur.id,
                this.name = producteur.name
            }
        }
    },

}