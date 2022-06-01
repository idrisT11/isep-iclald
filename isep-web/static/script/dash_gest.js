
window.onload = ()=>{
    var db_btns = document.getElementsByClassName('db_btn'),
        lumi_btns = document.getElementsByClassName('lumi_btn'),
        left_lumi_arrow = document.getElementById('left_lumi_arrow'),
        right_lumi_arrow = document.getElementById('right_lumi_arrow');

    var db_btn_selected = document.getElementsByClassName('selected_db_btn');

    var current_luminosity = -1,
        current_seuil = -1;

    get_luminisity();
    get_seuil();


    for (const db_btn of db_btns) {
        db_btn.addEventListener('click', (e)=>{
            current_seuil = parseInt(e.target.textContent);

            change_seuil(current_seuil);

            set_seuil();
        })
    }

    for (let i = 0; i < lumi_btns.length; i++) {
        lumi_btns[i].addEventListener('click', (e)=>{
            current_luminosity = i;

            change_luminosity(current_luminosity);  

            set_luminisity();
        });
    }
    left_lumi_arrow.addEventListener('click', (e)=>{
        current_luminosity++;

        change_luminosity(current_luminosity);

        set_luminisity();
    });

    right_lumi_arrow.addEventListener('click', (e)=>{
        current_luminosity--;

        change_luminosity(current_luminosity);

        set_luminisity();
    });

    function change_luminosity(value){
        for (let j = 0; j <= value; j++) 
            lumi_btns[j].className = 'lumi_btn colored';   
    
        for (let j = value+1; j < lumi_btns.length; j++) 
            lumi_btns[j].className = 'lumi_btn';   
    }

    function change_seuil(value) {
        targ = document.getElementById(value + '');
        db_btn_selected.className = "db_btn";
        targ.className = 'db_btn selected_db_btn';
        db_btn_selected = targ;
    }


    //API=====================================
    function get_luminisity() {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                let value = parseInt(this.responseText) - 1;
                current_luminosity = value;
                change_luminosity(value);
            }
        };
        xhttp.open("GET", "./isep-web/dash?config&lumin&salle="+salle, true);
        xhttp.send();    
    }

    function get_seuil() {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                let value = parseInt(this.responseText);
                current_seuil = value;
                change_seuil(current_seuil);
            }
        };
        xhttp.open("GET", "./isep-web/dash?config&seuil&salle="+salle, true);
        xhttp.send();    
    }

    function set_luminisity() {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                
            }
        };
        xhttp.open("GET", "./isep-web/dash?config&lumin="+(current_luminosity+1)+"&salle="+salle, true);
        xhttp.send();   
    }

    function set_seuil() {+6
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                console.log(this.responseText);
            }
        };
        xhttp.open("GET", "./isep-web/dash?config&seuil="+(current_seuil)+"&salle="+salle, true);
        xhttp.send();   
    }

}