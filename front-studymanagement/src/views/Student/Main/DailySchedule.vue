<template>
    <div class="wrapper" :style="{backgroundColor : backGroundColor}">
        <div class="card-title" >
            <h2><slot name="date" class="date"></slot></h2>
            <h2><slot name="day" class="day"></slot></h2>
        </div>
        <div class="taskBack">
                <div class="taskName">ریاضی</div>
                <div class="taskTime">8 تا ۱۲</div>
                <div class="taskStatus">
                    <v-radio></v-radio>
                      <input type="radio">
                    <div class="input-container d-flex">
                        <input class="preset" type="text" >
                        <div class="PercentIcon">%</div>
                    </div>
                    <input type="radio">
                </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : {
          color : String,
        },
        data () {
            return {
            backGroundColor : this.color

            }
        },

    }
</script>

<style scoped>
.wrapper {
    border-width: thin;
    display: block;
    max-width: 100%;
    outline: none;
    text-decoration: none;
    transition-property: box-shadow, opacity;
    overflow-wrap: break-word;
    white-space: normal;
    border-radius: 8px;
    box-shadow: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
    height: 245px;
    width: 414px;
    padding: 1rem;
}
.card-title{
    display: flex;
    justify-content: space-between;

}
.taskBack{
    width: 100%;
    height: 50px;
    background-color: #E2FDD5;
    border-radius: 11px;
    display: flex;
    justify-content: space-between;
    padding-right:10px ;
    padding-left:10px ;
    align-items: center;
}
.taskName{
        font-size: 1.25rem;
}
.taskTime{
    font-size: 1.25rem;
}
.taskStatus{
    width:150px;
    max-height: 100%;
    display: flex;
    justify-content: space-between;
}
    .preset{
        width: 40px;
        height: 30px;
        border: 2px solid #073576;
        box-sizing: border-box;
        border-radius: 0px 6px 6px 0px;
        padding-left: 2px;
    }
    .PercentIcon{
        background: rgba(5, 181, 229, 0.35);
        border: 2px solid #073576;
        border-radius: 6px 0px 0px 6px;
        display: inline-block;
        height: 30px;
        border-right: 0;
    }
</style>