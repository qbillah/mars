function readEvent(title){
    
    var data;

    if(title.includes("::") == true){
        var flag = title.split("::");
        data = flag;
        return data;
    }else if(title.includes("::") == false){
        data = title;
        return data;
    }

}