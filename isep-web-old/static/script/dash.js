window.onload = ()=>{
    var chart = new Chart("graph", {
        type: "line",
        data: {},
        options: {},
        labels:['a', 'b']
    });

    var selected_graph_grandeur = 'tmp';
    var btn_grandeurs = document.getElementsByClassName('btn_grandeur');
    var btn_grandeur_selected = document.getElementById('selected_grandeur');

    var given_values = [];

    //Ici on actualise les "instant element" des le chargement puis on le fait periodiquement
    get_instant("tmp", "een", actualise_instant_elem);
    get_instant("crd", "een", actualise_instant_elem);
    get_instant("snr", "een", actualise_instant_elem);
    get_instant("hmd", "een", actualise_instant_elem);


    setInterval(()=>{
        get_instant("tmp", "een", actualise_instant_elem);
        get_instant("crd", "een", actualise_instant_elem);
        get_instant("snr", "een", actualise_instant_elem);
        get_instant("hmd", "een", actualise_instant_elem);   
    }, 1500);


    //On actualise la valeur selectionner lors d'un clique
    for (const btn of btn_grandeurs) {
        btn.addEventListener('click', ()=>{
            selected_graph_grandeur = btn.value;
            btn_grandeur_selected.id = "";
            btn.id = 'selected_grandeur';
            btn_grandeur_selected = btn;

            get_all(selected_graph_grandeur, "veel", actualise_graph);
        });
    }

    get_all(selected_graph_grandeur, "veel", actualise_graph);
    setInterval(()=>{
        get_all(selected_graph_grandeur, "een", actualise_graph);
    }, 1500);

    function actualise_graph(grandeur, nb_val, values) {

        if (nb_val == 'een') {
            given_values.push(values);
            given_values.shift();

            chart.data.datasets = [{   
                label: 'Evolution de la grandeur au cours de la dernière minute',
                fill: false,
                borderColor: "#bae755",
                backgroundColor: "#e755ba",
                pointBackgroundColor: "#55bae7",
                pointBorderColor: "#55bae7",
                pointHoverBackgroundColor: "#55bae7",
                pointHoverBorderColor: "#55bae7",
                data: given_values
            }];
            chart.update();
            console.log(given_values);
        }

        else
        {
            let array = JSON.parse(values);
            let label_array = [];
            for (const elem of array) {
                label_array.push(label_array.length + 1)
            }
    
            chart.data.datasets = [{   
                label: 'Evolution de la grandeur au cours de la dernière minute',
                fill: false,
                borderColor: "#bae755",
                backgroundColor: "#e755ba",
                pointBackgroundColor: "#55bae7",
                pointBorderColor: "#55bae7",
                pointHoverBackgroundColor: "#55bae7",
                pointHoverBorderColor: "#55bae7",
                data: array
            }];
            chart.data.labels = label_array;
    
            chart.options.animation = true;
            chart.update();
            given_values = array;
            chart.options.animation = false;
            
        }


    }

    function actualise_instant_elem(grandeur, value) {

        var elem_instant = document.getElementById(grandeur + '_instant');//A changer

        elem_instant.textContent = value + get_unit_from_grandeur(grandeur);

    }


    function get_unit_from_grandeur(grandeur) {
        switch (grandeur) {
            case 'tmp':
                return '°C';

            case 'snr':
                return ' dB';

            case 'hmd':
                return '%';

            case 'crd':
                return 'bpm';

        }
    }


    //API FONTION
    //==============================================================

    function get_instant(grandeur, nb_val, callback) {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                callback(grandeur, this.responseText)
            }
        };
        xhttp.open("GET", "./isep-web/dash?grandeur="+grandeur+"&nb_val="+nb_val, true);
        xhttp.send(); 
    }

    
    function get_all(grandeur, nb_val, callback) {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                callback(grandeur, nb_val, this.responseText)
            }
        };
        xhttp.open("GET", "./isep-web/dash?grandeur="+grandeur+"&nb_val="+nb_val, true);
        xhttp.send(); 
    }
}


