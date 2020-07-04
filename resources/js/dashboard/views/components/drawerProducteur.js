/*import { apiServices } from "../../_services/api.services"

export default {
    props: {
        producteur: {
            default: function () {
                return {}
            }
        },
        isModification: {
            default: false
        }
    },
    data() {
        return {
            drawer: null,
            producteurName: '',
            producteurEmail: '',
            producteurId_Users: '',
            id: '',
            editItem: {
                name: '',
                id_users: {
                    email: '',
                }
            },
        }
    },
    methods: {
        addOrUpdate() {
            apiServices.post('/api/producteurs', {
                id: this.id,
                name: this.producteurName,
                id_users: this.producteurId_Users,
                email: this.producteurEmail,
            }).then(response => {
                this.editItem = response.data.data
                this.$emit('update', this.editItem)
            });
        },
        editProducteur(producteur) {
            this.id = producteur.id
            this.producteurName = producteur.name
            this.producteurEmail = producteur.id_users.email
            this.producteurId_Users = producteur.id_users.id
        }
    },
    created() {
    }
}*/