<template>
    <p>{{ time.h | two_digits }}:{{ time.m | two_digits }}:{{ time.s | two_digits }}</p>
</template>

<script>
    export default {

        props: ['timestamp'],

        data: function () {
            return{
                time: {
                    h: 0,
                    m: 0,
                    s: 0
                },

                timer: null
            }
        },

        computed: {

            then: function() {
                return this.timestamp * 1000;
            }

        },


        methods: {

            tick: function() {
                var difference = this.difference();
                if(difference < 0)
                {
                    clearInterval(this.timer);
                    difference = 0;
                }

                this.time.h = Math.floor(difference / 3600);
                this.time.m = Math.floor(difference % 3600 / 60);
                this.time.s = difference % 3600 % 60
            },

            difference: function() {
                var diff = this.then - new Date().getTime();
                return Math.round(diff / 1000);
            }

        },

        mounted() {
            
            const self = this;
            this.timer = window.setInterval(function () {
                self.tick();
            }, 1000);

        }
    }
</script>
