<template>
    <div class ="attendanceContainer">
        <h2 id = "title">EXAMPLE COURSE</h2>
        <attendanceList :students="students" />
    </div>

</template>

<script>
import attendanceList from './attendanceList.vue';
    export default{
        components:{
            attendanceList
        },
        data: ()=>{
            return {
                students:[]
            }
        },
        methods:{
            getList(){
                axios.get('api/students')
                .then(response => {
                    this.students=response.data
                })
                .catch(error=>{
                    console.log(error);
                })
            }
        },
        created(){
            this.getList();
        }
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');  
    body{
        background: #EEE5E9;
        font-family: 'Bebas Neue', cursive;
    }

    #title{
        text-align:center;
    }
</style>