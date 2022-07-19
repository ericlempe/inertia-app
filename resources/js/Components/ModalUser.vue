<template>

    <v-dialog
        v-model="dialog"
        max-width="500px"
    >
        <template v-slot:activator="{ on, attrs }">
            <v-btn
                color="primary"
                dark
                class="mb-2"
                v-bind="attrs"
                v-on="on"
            >
                Novo Usuário
            </v-btn>
        </template>
        <v-card>
            <v-card-title>
                <span class="text-h5">{{ title }}</span>
            </v-card-title>
            <v-card-text>
                <v-container>
                    <v-row>
                        <v-col cols="12">
                            <v-text-field
                                v-model="name"
                                label="Nome"
                            ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12">
                            <v-text-field
                                v-model="email"
                                label="Email"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">
                    Fechar
                </v-btn>
                <v-btn color="blue darken-1" text @click="save">
                    Salvar
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>


</template>
<script>
export default {
    props: {
        dialog: {
            type: Boolean,
            default: false
        },
        title: {
            type: String,
            required: true
        },
        name: {
            type: String,
        },
        email: {
            type: String,
        },
    },
    methods: {
        close() {
            this.$emit('close');
        },
        save() {
            this.$emit('save', {
                name: this.name,
                email: this.email
            });
        }
    }
}
</script>
