$(document).ready(function(){

    function addNewElement(a , b , c){
        var todoItem = document.createElement("div");
        todoItem.className = "todo-item-wrap";
        $(todoItem).css("opacity" , "0");

        var todoItemAdded = document.createElement("div");
        todoItemAdded.className = "todo-item-added";
        
        var actions = document.createElement("div");
        actions.className = "actions";

        var content = document.createElement("div");
        content.className = "content";

        var title = document.createElement("input");
        title.className = "rem-content";
        $(title).css("color" , "black");
        $(title).attr("type" , "text");
        $(title).val(a);
        
        readEvent(a);

        /**CHANGE THIS WITH THE EMOJI ALGORITHM */
        /**CHANGE ELEMENT TO A SPAN - NO CHECKBOXES */
        var checked = document.createElement("input");
        $(checked).attr("type" , "checkbox");
        checked.className = "done";
         /**CHANGE THIS WITH THE EMOJI ALGORITHM */

        var br = document.createElement("br");

        var desc = document.createElement("input");
        desc.className = "rem-content";
        $(desc).css("color" , "black");
        $(desc).attr("type" , "text");
        $(desc).val(b);

        var date = document.createElement("input");
        date.className = "rem-content";
        $(date).attr("type" , "date");
        $(date).val(c);

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
    }

    $('.todo-item-wrap').draggable({ revert: true });

    $("#add").click(function(){
        if($('#title').val() != '' && $('#date').val() != ''){
            var title = $('#title').val();
            var date = $('#date').val();
            if($('#description').val() != ''){
                var desc = $('#description').val();
            }else{
                desc = "...";
            }
            addNewElement(title , desc , date);
        }
        $('#title').val('');
        $('#description').val('');
        $('#date').val('');
    });

    $('#delete').droppable({
        //delete element
        accept: ".todo-item-wrap",
        drop: function( event, ui ) {
            ui.draggable.slideUp();
            console.log(
                $(ui.draggable).attr('class')
            );
        }
    });

    $('#done').droppable({
        //element completed
        accept: ".todo-item-wrap",
        drop: function( event, ui ) {
            ui.draggable.slideUp();
            console.log(
                $(ui.draggable).attr('class')
            );
        }
    });

});