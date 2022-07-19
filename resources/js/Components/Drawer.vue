<template>
    <div>
        <v-navigation-drawer v-model="drawer" app>
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title class="text-h6">
                        {{ this.$page.props.auth.user.name }}
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        {{ this.$page.props.auth.user.email }}
                    </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>

            <v-divider></v-divider>
            <v-list dense nav>
                <Link href="/home" replace>
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon>mdi-view-dashboard</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>Dashboard</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </Link>

                <v-list-item @click="logout">
                    <v-list-item-icon>
                        <v-icon>mdi-exit-run</v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                        <v-list-item-title>Sair</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar app elevation="1">
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
        </v-app-bar>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue'

export default {
    components: {
        Link,
    },
    data() {
        return {
            drawer: true,
        }
    },
    methods: {
        logout() {
            setTimeout(() => {
                this.$inertia.post('/logout')
            }, 1000);
        },
    },
}
</script>
