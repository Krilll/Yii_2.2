var websocketPort = wsPort ? wsPort : 8080,
    conn = new WebSocket('ws://localhost:' + websocketPort),
    idMessages = 'oldMessage';
conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    console.log(e.data);

    var parent = document.getElementById(idMessages);
    var div = document.createElement('DIV');
    $(div).addClass('forumMessage');
    div = parent.appendChild(div);
    div.innerHTML = e.data + '\n' ;
};

document.getElementById('newMessage').onclick =
    function() {
        $(document.getElementById('myForm')).removeClass('hidden');
        $(document.getElementById('newMessage')).addClass('hidden');
    };

document.getElementById('addMessage').onclick =
    function(e) {
        e.preventDefault();
        let name = $(document.getElementById('author'));
        let text = $(document.getElementById('text'));

        conn.send($(name).val() + ' : ' + $(text).val());

        $(name).val("");
        $(text).val("");


        $(document.getElementById('myForm')).addClass('hidden');
        $(document.getElementById('newMessage')).removeClass('hidden');
};