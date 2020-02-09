<template>
    <div>
        test
        <div class="col-xl-4 col-md-6 col-sm-12" v-for="event in events">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">{{ event.name }}</h4>
                        <p class="card-text">
                            <span class="badge badge-pill bg-success"></span>
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <!--                        @foreach($e->eventdates as $ed)-->
                        <!--                        <li class="list-group-item">-->
                        <!--                            <a href="#" class="btn-outline-primary btn-sm waves-effect waves-light float-right">Sign Up</a>-->
                        <!--                            -->
                        <!--                        </li>-->
                        <!--                        @endforeach-->
                    </ul>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import EventComponent from './EventComponent.vue'

    export default {
        data() {
            return {
                events: []
            }
        },
        methods: {
            getEvents() {
                axios.get('/api/events').then( (reponse) => {

                })
            }
        }
    }
</script>

<style scoped>

</style>
