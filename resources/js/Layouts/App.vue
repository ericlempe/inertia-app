<template>

    <v-app>

        <Drawer/>

        <v-main>
            <v-container fluid>
                <slot/>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
import Drawer from "../Components/Drawer";

export default {
    components: {
        Drawer,
    }
}
</script>
