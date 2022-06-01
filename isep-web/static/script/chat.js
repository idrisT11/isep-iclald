

window.onload = ()=>{
    var state = 'list',
        user = '',
        user_pic = '';

    var last_message_id = -1;

    var messages_conteneur = document.getElementById('message_conteneur'),
        input_chat = document.getElementById('input_chat'),
        send_button = document.getElementById('send_button'),
        list_chat = document.getElementById('list_chat');

    list_chat.style.display = 'none';
    get_conversations();

    setInterval(() => {
        if (state == 'list') {
            get_conversations();
        }
        else if (state == 'messages') {
            get_conversation();
        }
    }, 1000);


    list_chat.addEventListener('click', (e)=>{
        load_screen('list');
    });

    send_button.addEventListener('click', (e)=>{
        let content = input_chat.value;
        messages_conteneur.scrollTop = messages_conteneur.scrollHeight;

        add_message(content, 'admin');
        input_chat.value = "";
        send_message(content);

    });

    input_chat.addEventListener('keypress', (e)=>{
        if(e.key === 'Enter'){
            let content = input_chat.value;
            messages_conteneur.scrollTop = messages_conteneur.scrollHeight;

            add_message(content, 'admin');

            input_chat.value = "";

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
        xhttp.open("GET", "./isep-web/messages-admin?action=write&content="+content+"&user="+user, true);
        xhttp.send();
    }

    function get_message(id) {
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
              let conv = JSON.parse(JSON.parse(this.responseText));//???

              append_conversation(conv);
            }
        };
        xhttp.open("GET", "./isep-web/messages-admin?action=get_conv&user="+user, true);
        xhttp.send(); 
    }

    function add_message(content, origine='user') {
        var conteneur = document.createElement('div');

        var message = document.createElement('div');
        message.textContent = content;

        var profilPic = document.createElement('img');
        profilPic.width = "48"; 
        profilPic.height = "48"; 


        if (origine == 'user') {
            profilPic.className = 'admin_pic'; 
            message.className = 'admin_message'; 
            conteneur.className = 'admin_message_conteneur';   

            profilPic.src = user_pic; 

            conteneur.appendChild(profilPic);
            conteneur.appendChild(message);
        }
        else{
            profilPic.className = 'user_pic'; 
            message.className = 'user_message'; 
            conteneur.className = 'user_message_conteneur';   

            profilPic.src = './static/image/admin.png'; 

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

    function append_conv_input() {
        let input_conteneur = document.createElement('div');
        input_conteneur.id = "input_conteneur";
        input_conteneur.innerHTML = 
        '<input type="text" placeholder="Entrez votre message" id="input_chat">'+
        '<div id="send_button">'+
        '<img src="./static/image/send.png" alt="send" width="24px" height="24px">'+
        '</div>';

        var chat_conteneur = document.getElementById('chat_conteneur');
        chat_conteneur.appendChild(input_conteneur);

        input_chat = document.getElementById('input_chat');
        send_button = document.getElementById('send_button');

        send_button.addEventListener('click', (e)=>{
            let content = input_chat.value;
            messages_conteneur.scrollTop = messages_conteneur.scrollHeight;
    
            add_message(content, 'admin');
            input_chat.value = "";
            send_message(content);
    
        });
    
        input_chat.addEventListener('keypress', (e)=>{
            if(e.key === 'Enter'){
                let content = input_chat.value;
                messages_conteneur.scrollTop = messages_conteneur.scrollHeight;

                add_message(content, 'admin');
    
                input_chat.value = "";
    
                send_message(content);
            }
        });
    }

    function remove_conv_input() {
        var chat_conteneur = document.getElementById('chat_conteneur'),
            input_conteneur = document.getElementById('input_conteneur');
        chat_conteneur.removeChild(input_conteneur);
    }

    //============================================


    function get_conversations() {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                console.log(this.responseText);
                let array = JSON.parse(this.responseText);
                append_conversations(array);
            }
        };
        xhttp.open("GET", "./isep-web/messages-admin?action=get_convs", true);
        xhttp.send();        
    }


    function append_conversations(array) {
        
        if (array.length == 0) {
            messages_conteneur.innerHTML = ""+
            "<div id='no_convs'>"+
            "<img src='./static/image/inactive.png' width='30%'/>"+
            "<div> Il n'y a pas de message pour le moment ! </div>"+
            "</div>";
        }
        else{
            messages_conteneur.innerHTML = "";
            for (const conv of array) {
                var conversation_content = JSON.parse(conv.CONTENU);
                var conversation_resume = conversation_content[conversation_content.length-1].content;
                conversation_resume = conversation_resume.substring(0, 20) + '...';

                var ctn = document.createElement('div');
                ctn.className = 'discussion';

                //Pic
                var pic_ctn = document.createElement('div');

                var profilPic = document.createElement('img');
                profilPic.width = "64"; 
                profilPic.height = "64"; 
                profilPic.src = conv.PIC_PATH;
                profilPic.className = "conversation_element_pic";

                pic_ctn.appendChild(profilPic);

                //content
                var content_ctn = document.createElement('div');
                content_ctn.className = 'conversation_resume';

                var nom_prenom = document.createElement('h2');
                nom_prenom.textContent = conv.NOM + ' ' + conv.PRENOM;

                var content_resume = document.createElement('p');
                content_resume.textContent = 'Dernier message : ' + conversation_resume;

                var last_date = document.createElement('div');
                last_date.textContent = conv.LAST_MESSAGE;

                content_ctn.appendChild(nom_prenom);
                content_ctn.appendChild(content_resume);
                content_ctn.appendChild(last_date);

                //===============

                ctn.appendChild(pic_ctn);
                ctn.appendChild(content_ctn);
                ctn.id = conv.USER + '#' + conv.PIC_PATH;



                messages_conteneur.appendChild(ctn);

                messages_conteneur.innerHTML += '<hr/>';
            }

            let ctns = document.getElementsByClassName('discussion');
            for (const ctn of ctns) {
                ctn.addEventListener('click', ()=>{
                    user = ctn.id.split('#')[0];
                    user_pic = ctn.id.split('#')[1];
                    load_screen('messages');
                });
            }
        }
    }

    //============================================


    function load_screen(screen_type) {
        if (screen_type == "list") 
        {
            state = "list";
            remove_conv_input();
            get_conversations();
            list_chat.style.display = 'none';
        }
        else if (screen_type == "messages") 
        {
            state = "messages";
            append_conv_input();
            get_conversation();
            list_chat.style.display = 'inline';
        }
    }
}

