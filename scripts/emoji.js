function readEvent(title){
    
    var data;

    if(title.includes("::") == true){
        var flag = title.split("::");
        data = flag;
        return data;
    }else{
        data = title;
        return data;
    }

}