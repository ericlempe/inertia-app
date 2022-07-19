<template>
    <Layout>
        <v-row>
            <v-col cols="12">
                <v-data-table
                    :headers="headers"
                    :items="items"
                    :search="search"
                    show-select
                    :loading="loading"
                    loading-text="Carregando..."
                    no-data-text="Nenhum registro encontrado"
                    no-results-text="Nenhum registro encontrado"
                    :footer-props="footerProps"
                >

                    <template v-slot:top>
                        <v-toolbar flat>
                            <v-toolbar-title>Listar Usuários</v-toolbar-title>
                            <v-spacer></v-spacer>

                            <!-- Modal-->
                            <ModalUser
                                :title="formTitle"
                                :dialog="dialog"
                                :save="newItem"
                                :close="close"
                            />

                            <v-dialog v-model="dialogDelete" max-width="500px">
                                <v-card>
                                    <v-card-title class="text-h5">Are you sure you want to delete this item?
                                    </v-card-title>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                                        <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                                        <v-spacer></v-spacer>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>

                        </v-toolbar>
                        <div class="d-flex justify-end">
                            <div class="p-2">
                                <v-text-field
                                    v-model="search"
                                    append-icon="mdi-magnify"
                                    label="Pesquisar"
                                    single-line
                                    hide-details
                                ></v-text-field>
                            </div>
                        </div>
                    </template>


                    <template v-slot:item.name="props">
                        <v-edit-dialog
                            :return-value.sync="props.item.name"
                            @save="saveName(props.item.id, props.item.name)"
                        >
                            {{ props.item.name }}
                            <template v-slot:input>
                                <v-text-field
                                    v-model="props.item.name"
                                    label="Edit"
                                    single-line
                                    counter
                                ></v-text-field>
                            </template>
                        </v-edit-dialog>
                    </template>

                    <template v-slot:item.email="{ item }">
                        <v-chip color="gray" dark>
                            {{ item.email }}
                        </v-chip>
                    </template>

                    <template v-slot:item.actions="{ item }">
                        <v-btn-toggle>
                            <v-tooltip bottom>
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn
                                        small
                                        @click="editItem(item)"
                                        :disabled="parseInt(item.id) < 5"
                                        v-bind="attrs"
                                        v-on="on"
                                    >
                                        <v-icon>mdi-pencil</v-icon>
                                    </v-btn>
                                </template>
                                <span>Editar</span>
                            </v-tooltip>

                            <v-tooltip bottom>
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn
                                        small
                                        @click=""
                                        v-bind="attrs"
                                        v-on="on"
                                        @click="deleteItem(item)"
                                    >
                                        <v-icon>mdi-trash-can-outline</v-icon>
                                    </v-btn>
                                </template>
                                <span>Remover</span>
                            </v-tooltip>
                        </v-btn-toggle>
                    </template>

                </v-data-table>
            </v-col>
        </v-row>
    </Layout>
</template>

<script>
import Layout from '../Layouts/App'
import ModalUser from '../Components/ModalUser'
import {Head} from '@inertiajs/inertia-vue'

export default {
    components: {
        Layout,
        ModalUser
    },
    props: ["users"],
    mounted() {
        setTimeout(() => {
            this.items = this.users;
            this.loading = false;
        }, 2000)
    },
    data() {
        return {
            dialog: false,
            dialogDelete: false,
            singleSelect: false,
            selected: [],
            headers: [
                {text: 'ID', value: 'id', align: 'center'},
                {text: 'Nome', value: 'name', align: 'start'},
                {text: 'E-mail', value: 'email', align: 'start'},
                {text: 'Ações', value: 'actions', align: 'center', sortable: false},
            ],
            footerProps: {
                firstIcon: 'mdi-arrow-left',
                lastIcon: 'mdi-arrow-right',
                itemsPerPageOptions: [5, 10, 25, 100, 200],
                itemsPerPageText: 'Itens por página',
            },
            items: [],
            search: '',
            loading: true,
            editedIndex: -1,
            editedItem: {
                name: '',
                email: "",
            },
            defaultItem: {
                name: '',
                email: "",
            },
        }
    },
    computed: {
        formTitle() {
            return this.editedIndex === -1 ? 'Novo' : 'Editar' + ' Usuário'
        },
    },
    watch: {
        dialog(val) {
            val || this.close()
        },
        dialogDelete(val) {
            val || this.closeDelete()
        },
    },
    methods: {
        saveName(item, name) {
            console.log(item);
            console.log(name);
        },
        newItem() {

        },
        editItem(item) {
            this.editedIndex = this.items.indexOf(item)
            this.editedItem = Object.assign({}, item)
            this.dialog = true
        },
        deleteItem(item) {
            this.editedIndex = this.items.indexOf(item)
            this.editedItem = Object.assign({}, item)
            this.dialogDelete = true
        },
        deleteItemConfirm() {
            this.items.splice(this.editedIndex, 1)
            this.closeDelete()
        },
        close() {
            this.dialog = false
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
            })
        },

        closeDelete() {
            this.dialogDelete = false
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
            })
        },
    }
}
</script>
