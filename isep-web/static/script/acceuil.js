

window.onload = ()=>{
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
    }, 1000);

    
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

    function actualise_instant_elem(grandeur, value) {

        var elem_instant = document.getElementById(grandeur + '_instant');//A changer

        elem_instant.textContent = value + get_unit_from_grandeur(grandeur);

    }

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
}