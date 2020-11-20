import apiClient from "../plugins/axios";

function storeTime(data){
    try{
        return apiClient.post('/time',data);
    }catch (err){
        return err.response
    }
}