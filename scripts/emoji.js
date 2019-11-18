function readEvent(title){
    
    var data = [];

    if(title.includes("::")){
        var flag = title.split("::");
        data.push(flag[1]);
        data.push(flag[0]);
        return data;
    }else{
        data.push(flag[0]);
        return data;
    }

}