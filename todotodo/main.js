$(document).ready(function(){
    $('.todo-item-wrap').draggable({ revert: true });
    $("#add").click(function(){

        var todoItem = document.createElement("div");
        todoItem.className = "todo-item-wrap";
        $(todoItem).css("opacity" , "0");

        var todoItemAdded = document.createElement("div");
        todoItemAdded.className = "todo-item-added";
        
        var actions = document.createElement("div");
        actions.className = "actions";

        var checked = document.createElement("input");
        $(checked).attr("type" , "checkbox");
        checked.className = "done";

        var content = document.createElement("div");
        content.className = "content";

        var title = document.createElement("input");
        title.className = "rem-content";
        $(title).attr("type" , "text");
        $(title).attr("placeholder" , "Untitled");

        var br = document.createElement("br");

        var desc = document.createElement("input");
        desc.className = "rem-content";
        $(desc).attr("type" , "text");
        $(desc).attr("placeholder" , "Untitled");

        var date = document.createElement("input");
        date.className = "rem-content";
        $(date).attr("type" , "date");

        var edit = document.createElement("div");
        edit.className = "edit";
        edit.innerHTML = "📎";

        actions.appendChild(checked);
        content.appendChild(title);
        content.appendChild(br);
        content.appendChild(desc);
        content.appendChild(br);
        content.appendChild(date);
        todoItemAdded.appendChild(actions);
        todoItemAdded.appendChild(content);
        todoItem.appendChild(todoItemAdded);
        todoItem.appendChild(edit);
        setTimeout(function(){
            $(todoItem).css("opacity" , "1");
        }, 5);
        $(todoItem).draggable({ revert: true })
        document.getElementById("app").appendChild(todoItem);
    });

    $('#delete').droppable({
        drop: function( event, ui ) {
            ui.draggable.slideUp();
            //Change this animation
        }
    });

});