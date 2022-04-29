

window.onload = ()=>{
    get_conversation();
    
    const user_pic_src = document.getElementById('user_pic_src').value;


    var messages_conteneur = document.getElementById('message_conteneur'),
        input_chat = document.getElementById('input_chat'),
        send_button = document.getElementById('send_button');
    

    send_button.addEventListener('click', (e)=>{
        let content = input_chat.value;
        messages_conteneur.scrollTop = messages_conteneur.scrollHeight;

        add_message(content, 'user');
        input_chat.value = "";
        send_message(content);

    });

    input_chat.addEventListener('keypress', (e)=>{
        if(e.key === 'Enter'){
            let content = input_chat.value;

            add_message(content, 'user');

            input_chat.value = "";
            messages_conteneur.scrollTop = messages_conteneur.scrollHeight;

            send_message(content);
        }
    });

    function send_message(content) {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
              console.log(this.responseText);
            }
        };
        console.log(content);
        xhttp.open("GET", "./isep-web/quick_message?action=write&content="+content, true);
        xhttp.send();
    }

    function get_messages(id) {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
              console.log(this.responseText);
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
              console.log(this.responseText);
            }
        };
        xhttp.open("GET", "./isep-web/quick_message?action=read_all", true);
        xhttp.send(); 
    }

    function add_message(content, origine='user') {
        var conteneur = document.createElement('div');

        var message = document.createElement('div');
        message.textContent = content;

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
    }
}

