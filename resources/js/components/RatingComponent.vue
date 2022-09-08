<template>
    <div class="container">
                <div  v-if="comments_enabled"
                class=" boxRating mt-3  text-center">
                        <strong>Star</strong>
                    <div v-for="(rating,index) in ratings"
                    :key="'rating'+index"
                    :trainer_id="rating.trainer_id"
                    :user_id="auth_id"
                    :star="rating.star"
                    >
                    
                    <span>User : {{ rating.user_id }}</span>
                    <span> Star : {{ rating.star }}</span>
                    <span>Trainer : {{ rating.trainer_id }}</span>
                  
                    </div>
                  </div>
              <div class="mt-3 " v-if="comments_enabled">
                          <strong>The Yours Comment</strong>
                <div  class="mt-3 "
                        v-for="comment in comments"
                        :key="comment.id"
                        :user_id="auth_id"
                        >
                        <div class="column">
                          <span> user : {{ comment.user_id }}</span><br>
                          <span >{{ comment.comment }}</span><br>
                        </div>
                  </div>
              </div>
                                    <hr>
              <div 
                class=" text-center ">
                    <input type="hidden" name="auth_id" :value="auth_id" >
                    <input type="hidden" name="trainer_id" :value="trainer_id">
                            Vota : 
                        <select v-model="star"> 
                        <option 
                        v-for="col in ['1','2','3','4','5']"
                        :value="col"
                        :key="col"
                        :selected="col===star ? 'selected' : ''"
                        > {{ col }}
                        </option>
                        </select>

                      <div class="star-rating"  >
                            <input type="radio" name="star" id="star5" value="5"  v-model="star"/>
                            <label for="star5"></label>

                            <input type="radio" name="star" id="star4" value="4"  v-model="star"/>
                            <label for="star4"></label>
                        
                            <input type="radio" name="star" id="star3" value="3"  v-model="star"/>
                            <label for="star3"></label>
                        
                            <input type="radio" name="star" id="star2" value="2"  v-model="star"/>
                            <label for="star2"></label>
                        
                            <input type="radio" name="star" id="star1" value="1"  v-model="star"/>
                            <label for="star1"></label>
                      </div>
                    <input type="hidden" name="auth_id" :value="auth_id" >
                    <input type="hidden" name="trainer_id" :value="trainer_id"><br>

                  <div class="form-floating my-2">
                    <textarea id="comment" v-model="comment" class="form-control" placeholder="Leave a comment here"  style="height: 100px"></textarea>
                    <label for="comment">Comments</label>
                  </div>

                    <br><button type="submit" class="btn btn-outline-danger my-3" @click="rating">Ratings</button>  
                </div>  
      
            
       
</div>
</template>

<script>
import axios from 'axios';

    export default {
       computed : {
                photo(){
                    return '/post_images/' + this.image;
                },


            },

        props:['id','name','content','email','image','auth_id','user_name','col','comments_enabled'],
        

        data(){
            return {
              star:"",
              user_id:"",
              trainer_id:this.id,
              comment:"",
              ratings:[],
              comments:[],
       
              
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
               this.read();
        },

   methods: {
            rating(){   
    
            
               axios.post('api/ratings',{user_id:this.auth_id,trainer_id:this.id,star:this.star,})
               .then((response)=>{
                    this.$emit('rating',true);
               });
               
               axios.post('api/comments',{user_id:this.auth_id,trainer_id:this.id,comment:this.comment,})
               .then((response)=>{
                    this.$emit('rating',true);
               })

            },             
       
            

               async read(){
                
                const rating = await axios.get("/api/ratings/"+this.id);
                this.ratings= rating.data.ratings;
       

                const comment = await axios.get("/api/comments/"+this.id);
                this.comments = comment.data.comments;
         
            
            },

        },

    }
</script>

<style>
    
.img_trainer{
    width: 200px;
    height: auto;
}
.boxRating{
    border: 2px solid rgb(253, 192, 78);
    border-radius: 20px;
}

.star-rating {
  display: flex;
  align-items: center;
  width: 160px;
  flex-direction: row-reverse;
  justify-content: space-between;
  margin: 40px auto;
  position: relative;
}
/* hide the inputs */
.star-rating input {
  display: none;
}
/* set properties of all labels */
.star-rating > label {
  width: 30px;
  height: 30px;
  font-family: Arial;
  font-size: 30px;
  transition: 0.2s ease;
  color: orange;
}
/* give label a hover state */
.star-rating label:hover {
  color: #ea7347;
  transition: 0.2s ease;
}
.star-rating label:active::before {
  transform:scale(1.1);
}

/* set shape of unselected label */
.star-rating label::before {
  content: '\2606';
  position: absolute;
  top: 0px;
  line-height: 26px;
}
/* set full star shape for checked label and those that come after it */
.star-rating input:checked ~ label:before {
  content:'\2605';
}

@-moz-document url-prefix() {
  .star-rating input:checked ~ label:before {
  font-size: 36px;
  line-height: 21px;
  }
}  

</style>
