const CITIES = {
    France:[{
        name: 'Paris',
        x: 235,
        y: 120,
    }, {
        name: 'Marseille',
        x: 300,
        y: 355,
    },{
        name: 'Brest',
        x: 50,
        y: 150,
    }],

    Chine:[{
        name: 'Beijing',
        x: 450,
        y: 200,
    }, {
        name: 'Nanjing',
        x: 470,
        y: 300,
    },{
        name: 'Shanghai',
        x: 500,
        y: 310,
    }],

    Egypte:[{
        name: 'Cairo',
        x: 285,
        y: 120,
    }, {
        name: 'Alexendrie',
        x: 255,
        y: 80,
    },{
        name: 'Asyut',
        x: 300,
        y: 220,
    }],

    Allemagne:[{
        name: 'Berlin',
        x: 250,
        y: 150,
    }, {
        name: 'Munich',
        x: 240,
        y: 375,
    },{
        name: 'Frankfurt',
        x: 140,
        y: 290,
    }],
};
window.onload = ()=>{
    var selectedCity = 'Paris',
        selectedCountry = 'France';

    var chart = new Chart("graph", {
        type: "line",
        data: {},
        options: {},
        labels:['2016', '2017', '2018', '2019', '2020', '2021', '2022']
    });




    load_cities_france(CITIES[selectedCountry]);
    load_countries();

    get_moyenne_nationale(selectedCountry, append_moyenne_nationale);
    get_graph_values(selectedCountry, append_graph_values);
    get_moyenne_ville(selectedCity, append_moyenne_ville);

    
    function load_countries() {
        var country_button = document.getElementsByClassName('country_btn');

        for (const btn of country_button) {
            btn.addEventListener('click', ()=>{
                selectedCountry = btn.innerHTML;
                selectedCity = CITIES[selectedCountry][0].name;

                
                load_cities_france(CITIES[selectedCountry]);

                get_moyenne_nationale(selectedCountry, append_moyenne_nationale);
                get_graph_values(selectedCountry, append_graph_values);
                get_moyenne_ville(selectedCity, append_moyenne_ville); 
                
                apply_country_changes(selectedCountry);
            })
        }
    }

    function load_cities_france(CITIES) {
        //On eleve les anciens points
        document.querySelectorAll('.city_point').forEach(e => e.remove());

        var map = document.getElementById("carte");

        var cities_elem = {};

        for (const city of CITIES) {
    
            cities_elem[city.name] = document.createElement('div');
    
            cities_elem[city.name].style.position = 'absolute';
            cities_elem[city.name].style.top = city.y + 'px';
            cities_elem[city.name].style.left = city.x + 'px';
            cities_elem[city.name].className = 'city_point';
    
    
            map.appendChild(cities_elem[city.name]);
    
            cities_elem[city.name].addEventListener('click', ()=>{
                var city_field = document.getElementsByClassName('ville');

                cities_elem[selectedCity].id = "";
                cities_elem[city.name].id = "selected_city_point";
                selectedCity = city.name;

                city_field[0].textContent = selectedCity;
                get_moyenne_ville(selectedCity, append_moyenne_ville);   
            });
        }
    
        cities_elem[selectedCity].id = 'selected_city_point';
    
    
    }

    /*DOM API callback**/

    function apply_country_changes(pays) {
        var pays_field = document.getElementsByClassName('pays');
        var city_field = document.getElementsByClassName('ville');

        pays_field[0].textContent = pays;
        city_field[0].textContent = selectedCity;

        var carte_image = document.getElementById('image_carte');
        carte_image.src = "./static/image/pays/" + pays + ".jpg"
    }

    function append_moyenne_nationale(value) {
        var moy = document.getElementById('national_stats');
        moy.textContent = value + '.' + (value*3)%10 + 'ug/m3'; //Le rnd est temporaire
    }

    function append_graph_values(values) {
        var array = JSON.parse(values);

        var array_int = [];
        var array_lbl = [];

        for (const entry of array) {
            array_int.push(parseInt(entry.value, 10));
            array_lbl.push(parseInt(entry.year, 10));
        }

        chart.data.datasets = [{   
            label: 'Evolution du taux de carbone en ug/m3',
            fill: false,
            borderColor: "#bae755",
            backgroundColor: "#e755ba",
            pointBackgroundColor: "#55bae7",
            pointBorderColor: "#55bae7",
            pointHoverBackgroundColor: "#55bae7",
            pointHoverBorderColor: "#55bae7",
            data: array_int
        }];

        chart.data.labels = array_lbl;
        chart.update();
    }

    function append_moyenne_ville(value) {
        var moy = document.getElementById('ville_stats');
        console.log(value);
        moy.textContent = value + '.' + (value*3)%10 + 'ug/m3'; //Le rnd est temporaire
    }

    //API
    //================================================
    function get_moyenne_nationale(pays, callback) {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                callback(this.responseText)
            }
        };
        xhttp.open("GET", "./isep-web/map?pays="+pays+"&action=moyenne_nationale", true);
        xhttp.send(); 
    }

    function get_moyenne_ville(ville, callback) {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                callback(this.responseText)
            }
        };
        xhttp.open("GET", "./isep-web/map?ville="+ville+"&action=moyenne_ville", true);
        xhttp.send(); 
    }

    function get_graph_values(pays, callback) {
        let xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                callback(this.responseText)
            }
        };
        xhttp.open("GET", "./isep-web/map?pays="+pays+"&action=graph_values", true);
        xhttp.send(); 
    }

}

