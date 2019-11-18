function readEvent(title){
    
    var data;

    var arrData = [];

    if(title.includes("::") == true){
        var flag = title.split("::");
        arrData.push(flag[0]);
        arrData.push(flag[1]);
        return arrData;
    }else if(title.includes("::") == false){
        data = title;
        return data;
    }

}