<template>
 <div>
        <div class="form-group">
            <label for="group" >เลือกหมวดหมู่ติวเตอร์</label>
            <select class='form-control' id="group" name="group"  v-model='group' @change='getSubjects()'>
                <option value='0' >เช่น ครูสอนภาษา</option>
                <option v-for='data in groups' :value='data.id'>{{ data.group_name }}</option>
            </select>
        </div>


        <div class="form-group">
            <label for="subject">เลือกวิชาหรือบทเรียน</label>
            <select class="form-control" id="subject" name="subject" v-model="subject">
                <option value='0' >เช่น คูรภาษาไทย</option>
                <option v-for='data in subjects' :value='data.subject_name'>{{ data.subject_name }}</option>
            </select>
        </div>
 </div>
</template>

<script>
    export default {
        name: "SelectFormComponent",
        data(){
            return {
                group: 0,
                groups: [],
                subject: 0,
                subjects: []
            }
        },
        methods:{
            getGroups: function(){
                axios.get('/api/group')
                    .then(function (response) {
                        this.groups = response.data;
                    }.bind(this));

            },
            getSubjects: function() {
                axios.get('/api/subject',{
                    params: {
                        group_id: this.group
                    }
                }).then(function(response){
                    this.subjects = response.data;
                }.bind(this));
            }
        },
        created: function(){
            this.getGroups()
        }
    }
</script>

<style scoped>

</style>