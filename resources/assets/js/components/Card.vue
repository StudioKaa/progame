<template>
    <div class="card-container">
        <div class="card" v-if="show">
            <p>This is a card..</p>
        </div>
        <button v-else v-on:click="toggle()">Kaart</button>
    </div>
</template>

<script>
    export default {

        data: function () {
            return{
                show: false
            }
        },

        methods: {

            toggle: function() {
                this.show = this.show ? false : true;
            }

        },

    }
</script>
