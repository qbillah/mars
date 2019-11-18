function readEvent(title){
    
    var data;

    if(title.includes("::") == true){
        var flag = title.split("::");
        data.push(flag[0]);
        data.push(flag[1]);
        return data;
    }else if(title.includes("::") == false){
        data = title;
        return data;
    }

}