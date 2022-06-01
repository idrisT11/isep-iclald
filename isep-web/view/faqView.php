<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./static/style/faq.css">
    <link rel="stylesheet" href="./static/fonts/font.css">

    <title>FAQ</title>
</head>


<body>

<div id="window">
        <nav>
            <img src="./static/image/IM.png" width="50px" style="position: absolute">

            <div id="nav_ctn">

                <a href="./" class="nav_link">
                    <img src="./static/image/home.png" alt="home">
                </a>

                <a href="./dash" class="nav_link">
                    <img src="./static/image/graph.png" alt="dashboard">
                </a>

                <a href="./forum" class="nav_link">
                    <img src="./static/image/forum.png" alt="forum">
                </a>
                
                <a href="./map" class="nav_link">
                    <img src="./static/image/map.png" alt="map">
                </a>

                <?php
                    if ($_SESSION['role'] == 1) {
                ?>
                    <a href="./ticket" class="nav_link">
                        <img src="./static/image/ticket.svg" alt="map">
                    </a>
                <?php
                    }
                ?>
                      
            </div>
        </nav>

        <main>
            
            <div id="header">
                <div id="header_title">
                    <h1>Foire aux questions</h1> 
                    <p><?=$datum?></p> 
                </div>

                <?php include(__DIR__ . './_header.php'); ?>
            </div>
            <div class="container">
                <h2>Foire aux Questions</h2>
                <div class="accordion">
                <?php
                    foreach ($questions as $question){
                ?>
                    <div class="accordion-item">
                        <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title"><?= $question['TITRE'] ?></span><span class="icon" aria-hidden="true"></span></button>
                        <div class="accordion-content">
                            <p><?= $question['CONTENU'] ?></p>
                        </div>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>
        </main>
</div>

    <style>
        @import url("https://fonts.googleapis.com/css?family=Hind:300,400&display=swap");
    * {
    box-sizing: border-box;
    }
    *::before, *::after {
    box-sizing: border-box;
    }

    body {

    font-family: "Exo-Regular", "Hind", sans-serif;
    }

    .container {
    margin: 0 auto;
    padding: 4rem;
    width: 48rem;

    }

    .container h2{
        color: #2fd4ae;
    }

    .accordion-title{
        font-family: "Exo-Regular", "Hind", sans-serif;

    }

    .accordion .accordion-item {
        border-bottom: 1px solid #e5e5e5;
        font-family: "Lato", "Hind", sans-serif;

    }
    .accordion .accordion-item button[aria-expanded=true] {
    border-bottom: 1px solid #2fd4ae;
    }
    .accordion button {
    position: relative;
    display: block;
    text-align: left;
    width: 100%;
    padding: 1em 0;
    color: #7288a2;
    font-size: 1.15rem;
    font-weight: 400;
    border: none;
    background: none;
    outline: none;
    }
    .accordion button:hover, .accordion button:focus {
    cursor: pointer;
    color: #2fd4ae;
    }
    .accordion button:hover::after, .accordion button:focus::after {
    cursor: pointer;
    color: #2fd4ae;
    border: 1px solid #03b5d2;
    
    }
    .accordion button .accordion-title {
    padding: 1em 1.5em 1em 0;
    }
    .accordion button .icon {
    display: inline-block;
    position: absolute;
    top: 18px;
    right: 0;
    width: 22px;
    height: 22px;
    border: 1px solid;
    border-radius: 22px;
    }
    .accordion button .icon::before {
    display: block;
    position: absolute;
    content: "";
    top: 9px;
    left: 5px;
    width: 10px;
    height: 2px;
    background: currentColor;
    }
    .accordion button .icon::after {
    display: block;
    position: absolute;
    content: "";
    top: 5px;
    left: 9px;
    width: 2px;
    height: 10px;
    background: currentColor;
    }
    .accordion button[aria-expanded=true] {
    color: #2fd4ae;
    }
    .accordion button[aria-expanded=true] .icon::after {
    width: 0;
    }
    .accordion button[aria-expanded=true] + .accordion-content {
    opacity: 1;
    max-height: 9em;
    transition: all 200ms linear;
    will-change: opacity, max-height;
    }
    .accordion .accordion-content {
    opacity: 0;
    max-height: 0;
    overflow: hidden;
    transition: opacity 200ms linear, max-height 200ms linear;
    will-change: opacity, max-height;
    }
    .accordion .accordion-content p {
    font-size: 1rem;
    font-weight: 300;
    margin: 2em 0;
    }
    </style>
    <script>
        const items = document.querySelectorAll(".accordion button");

        function toggleAccordion() {
        const itemToggle = this.getAttribute('aria-expanded');
        
        for (i = 0; i < items.length; i++) {
            items[i].setAttribute('aria-expanded', 'false');
        }
        
        if (itemToggle == 'false') {
            this.setAttribute('aria-expanded', 'true');
        }
        }
        
        items.forEach(item => item.addEventListener('click', toggleAccordion));
    </script>

    <script>
        //PopDown profil
        var btn = document.getElementById('nom_btn'),
            pop_down = document.getElementById('deco_pop_down');
        var displayed = false;
        btn.onclick = ()=>{
            if (displayed) {
                pop_down.style.display = 'none';
                
            } else {
                pop_down.style.display = 'flex';
            }
            displayed = !displayed;
        }

    </script>
</body>
