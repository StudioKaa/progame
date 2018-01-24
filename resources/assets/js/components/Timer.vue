<template>
    <div class="timer">
        <div class="timer-vertical">
            <div class="time">{{ time.w }}</div>
            <div class="label">weken</div>

            <div class="time">{{ time.d }}</div>
            <div class="label">dagen</div>

            <div class="time">{{ time.h | two_digits }}</div>
            <div class="label">uur</div>

            <div class="time">{{ time.m | two_digits }}</div>
            <div class="label">minuten</div>

            <div class="time">{{ time.s | two_digits }}</div>
            <div class="label">seconden</div>
        </div>
    </div>
</template>


<script>
    export default {

        props: ['actual_end', 'secpersec', 'daysperweek', 'hoursperday'],

        data: function () {
            return{
                
                time: {
                    w: 0,
                    d: 0,
                    h: 0,
                    m: 0,
                    s: 0
                },

                timer: null
            }
        },

        methods: {

            tick: function() {

                var actual_delta = this.actual_end*1000 - Date.now();
                var virtual_delta = actual_delta * this.secpersec;

                this.time.w = Math.floor(virtual_delta/(1000*60*60*this.hoursperday*this.daysperweek) % 8);
                this.time.d = Math.floor(virtual_delta/(1000*60*60*this.hoursperday) % this.daysperweek);
                this.time.h = Math.floor(virtual_delta/(1000*60*60) % this.hoursperday); 
                this.time.m = Math.floor(virtual_delta/(1000*60) % 60);
                this.time.s = Math.round(virtual_delta/1000 % 60);
            },
            
        },

        mounted() {

            this.tick();

            const self = this;
            this.timer = window.setInterval(function () {
                self.tick();
            }, 100);

        }
    }

//     export default {

//         props: ['actual_end', 'secpersec', 'daysperweek', 'hoursperday'],

//         data: function () {
//             return{
//                 time_left: 0,
//                 secsperweek: 0,
//                 secsperday: 0,

//                 time: {
//                     w: 0,
//                     d: 0,
//                     h: 0,
//                     m: 0
//                 },

//                 timer: null
//             }
//         },

//         methods: {

//             tick: function() {

//                 this.time_left--;
//                 if(this.time_left <= 0)
//                 {
//                     clearInterval(this.timer);
//                     this.time_left = 0;
//                 }

//                 this.time.w = Math.floor(this.time_left / this.secsperweek);
//                 this.time.d = Math.floor(this.time_left % this.secsperweek / this.secsperday);
//                 this.time.h = Math.floor(this.time_left % this.secsperday / 3600); 
//                 this.time.m = Math.floor(this.time_left % this.secsperday % 3600 / 60); 

//             },
            
//         },

//         mounted() {

//             this.secsperweek = this.hoursperday * this.daysperweek * 3600;
//             this.secsperday = this.hoursperday * 3600;

//             //calculate time_left
//             this.time_left = (this.actual_end - Date.now()/1000) * this.secpersec;
//             var frequency = Math.round(1 / this.secpersec * 1000);
//             this.tick();

//             //set-up timer
//             const self = this;
//             this.timer = window.setInterval(function () {
//                 self.tick();
//             }, frequency);

//         }
//     }
</script>