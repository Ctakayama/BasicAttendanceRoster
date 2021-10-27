<template>
    <div class ="attendanceList">
        <table class ="roster" border="1">
            <thead>
              <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Is Present?</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(student) in students">
                    <td>{{student.student_id}}</td>
                    <td>{{student.first_name}}</td>
                    <td>{{student.last_name}}</td>
                    <td>{{student.email}}</td>

                    <td><input type="checkbox" 
                        @change="toggleStatus(student)" 
                        v-model="student.is_present">
                    </td>
              </tr>
            </tbody>
     </table>
    </div>

</template>

<script>
    export default{
        props: ['students'],
        methods:{
            //toggles between present/absent
            toggleStatus(s){
                axios.put('/api/student/' + s.student_id, {
                    "student": {
                        "is_present": s.is_present
                     }       
                })
                .then(response=>{
                    if( response.status ==200){
                        console.log(s.first_name + " status changed to " + s.is_present);
                    }
                })
                .catch(error=>{
                    console.log(error);
                })
            }
        }
    }
</script>

<style>
    .attendanceList{
        text-align:center;
    }

    .roster{
        margin-left: auto;
        margin-right: auto;
    }
</style>