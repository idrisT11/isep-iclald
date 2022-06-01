

window.onload = ()=>{

    const user_pic_src = document.getElementById('user_pic_src').value;

    var last_message_id = -1;


    var messages_conteneur = document.getElementById('message_conteneur'),
        input_chat = document.getElementById('input_chat'),
        send_button = document.getElementById('send_button');

    get_conversation();
    messages_conteneur.scrollTop = messages_conteneur.scrollHeight;

    setInterval(() => {

       get_messages(last_message_id);

    }, 1000);

    send_button.addEventListener('click', (e)=>{
        let content = input_chat.value;

        add_message(content, 'user');
        input_chat.value = "";
        send_message(content);

        messages_conteneur.scrollTop = messages_conteneur.scrollHeight;
    });

    input_chat.addEventListener('keypress', (e)=>{
        if(e.key === 'Enter'){
            let content = input_chat.value;

            add_message(content, 'user');
            input_chat.value = "";
            send_message(content);

            messages_conteneur.scrollTop = messages_conteneur.scrollHeight;
        }
    });

    function send_message(content) {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                console.log(this.responseText);
                last_message_id++;      
            }
        };
        xhttp.open("GET", "./isep-web/quick_message?action=write&content="+content, true);
        xhttp.send();
    }

    function get_messages(id) {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                //Ici on verifie que l'utilisateur a pas isntancié de nouvelle conv, sinon ça dégage
                if (this.responseText == '0') 
                    return;
                
                var messages_data = JSON.parse(this.responseText);

                for( const message_data of messages_data)
                {      
                    add_message(message_data.content, message_data.writer);

                    last_message_id++;      
                }
            }
        };
        xhttp.open("GET", "./isep-web/quick_message?action=read_new&id="+id, true);
        xhttp.send(); 
    }

    function get_conversation() {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                //Ici on verifie que l'utilisateur a pas isntancié de nouvelle conv, sinon ça dégage
                if (this.responseText == '0') 
                    return;

                let conv = JSON.parse(this.responseText);

                append_conversation(conv);
            }
        };
        xhttp.open("GET", "./isep-web/quick_message?action=read_all", true);
        xhttp.send(); 
    }

    
    function add_message(content, origine='user') {
        var conteneur = document.createElement('div');

        var message = document.createElement('div');
        message.textContent = content;
        console.log(content);

        var profilPic = document.createElement('img');
        profilPic.width = "48"; 
        profilPic.height = "48"; 

        if (origine != 'user') {
            profilPic.className = 'admin_pic'; 
            message.className = 'admin_message'; 
            conteneur.className = 'admin_message_conteneur';   

            profilPic.src = './static/image/admin.png'; 

            conteneur.appendChild(profilPic);
            conteneur.appendChild(message);
        }
        else{
            profilPic.className = 'user_pic'; 
            message.className = 'user_message'; 
            conteneur.className = 'user_message_conteneur';   

            profilPic.src = user_pic_src; 

            conteneur.appendChild(message); 
            conteneur.appendChild(profilPic);         
        }

        messages_conteneur.appendChild(conteneur);
        messages_conteneur.scrollTop = messages_conteneur.scrollHeight;
    }

    function append_conversation(conv) {

        messages_conteneur.innerHTML = '';

        for (const message of conv) {

            add_message(message.content, message.writer);
        }

        last_message_id = conv[conv.length-1].id;

    }


    //============================================

}

