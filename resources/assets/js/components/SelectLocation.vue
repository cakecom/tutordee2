<template>
    <div>
        <div class="form-group">
            <label for="province" >เลือกจังหวัด</label>
            <select class='form-control' id="province" name="province"  v-model='province' @change='getAmphures()'>
                <option value='0' >จังหวัด</option>
                <option v-for='data in provinces' :value='data.id'>{{ data.name_th }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="amphures">เลือกอำเภอ</label>
            <select class="form-control" id="amphures" name="amphures" v-model="amphure">
                <option value='0' >อำเภอ</option>
                <option v-for='data in amphures' :value='data.name_th'>{{ data.name_th }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SelectLocation",
        data(){
            return {
                province: 0,
                provinces: [],
                amphure: 0,
                amphures: []
            }
        },
        methods:{
            getProvinces: function(){
                axios.get('/api/province')
                    .then(function (response) {
                        this.provinces = response.data;
                    }.bind(this));

            },
            getAmphures: function() {
                axios.get('/api/amphure',{
                    params: {
                        province_id: this.province
                    }
                }).then(function(response){
                    this.amphures = response.data;
                }.bind(this));
            }
        },
        created: function(){
            this.getProvinces()
        }
    }
</script>

<style scoped>

</style>