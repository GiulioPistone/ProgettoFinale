<template>

    <div class="container my-3">

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" ><i class="fa-solid fa-magnifying-glass"></i></span>
        <input v-model="keyword" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        <ul  v-if="trainers.length > 0">
            <li style="display: none;" v-for="trainer in trainers" :key="trainer.id" v-text="trainer.name"></li>
        </ul>
   </div>
        <trainer-component 
            v-for="trainer in trainers"
            :id="trainer.id"
            :name="trainer.name"
            :image="trainer.image"
            :content="trainer.content"
            :email="trainer.email"
            :key="trainer.id"
            :auth_id="auth_id"
            :user_username="user_username"
            :users_avatar="users_avatar"
            :trainer_id="trainer_id"
            :comments_enabled="false"
            @rating="rating"
        >
        </trainer-component>

    
     
     
        
    </div>
</template>

<script>
    import TrainerComponent from "./TrainerComponent.vue";
    import axios from 'axios';


    export default {
        components:{
            TrainerComponent,
           
      
        },
        props : [ 'auth_id','user_username','trainer_id','star','users_avatar','comments_enabled','name'],
           
        
        data(){
            return {
                trainers: [],
                ratings:[],
                comments:[],
                keyword: null,

               
       
            }
        },
        mounted() {
            console.log('Component mounted.');
      
        },
        created(){
            this.read();

        },     
        
        watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
        methods: {
           async read(){
                const data = await axios.get("/api/trainers");
                data.data.forEach(trainer => this.trainers.push(trainer));
                const rating = await axios.get("/api/ratings");
                rating.data.forEach(rating => this.ratings.push(rating));
                const comment = await axios.get("/api/comments");
                comment.data.forEach(comment => this.comments.push(comment));
              
                
            },
            async rating(){
                await axios.get("/api/ratings").then((response)=>{
                    this.ratings = response.data;
                })
              

            },
                getResults() {
            axios.get('/livesearch', { params: { keyword: this.keyword } })
                .then(res => this.trainers = res.data)
                .catch(error => {});
        }
        


        }

      
    }
</script>
