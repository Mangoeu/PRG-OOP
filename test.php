<?php
// 1. PHP ČÁST - SIMULACE DATABÁZE PRODUKTŮ
// Tady si definujeme naše trpaslíky. Přidání nového je hračka.
$trpaslici = [
    [
        "nazev" => "Trpaslík KLASIK",
        "popis" => "Stará dobrá klasika. Červená čepice, modrý kabát, nulový respekt.",
        "cena" => 299,
        "img_color" => "#e74c3c", // Barva zástupného obrázku
        "tag" => "BESTSELLER"
    ],
    [
        "nazev" => "Trpaslík RAMBO",
        "popis" => "Tento trpaslík nehlídá zahradu. On ji brání. Kulomet není součástí balení.",
        "cena" => 499,
        "img_color" => "#2c3e50",
        "tag" => "NOVINKA"
    ],
    [
        "nazev" => "Trpaslík ZEN",
        "popis" => "Medituje u jezírka. Ignoruje plevel i sousedovu kočku.",
        "cena" => 350,
        "img_color" => "#27ae60",
        "tag" => ""
    ],
    [
        "nazev" => "Trpaslík ZOMBIE",
        "popis" => "Ideální pro sousedy, které nemáte rádi. V noci svítí oči.",
        "cena" => 666,
        "img_color" => "#8e44ad",
        "tag" => "LIMITOVANÁ EDICE"
    ]
];

$hlavni_nadpis = "Trpaslici.sk";
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trpasclisi.sk | Prodej zahradních trpaslíků všech druhů a barev</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- CSS PROMĚNNÉ A RESET --- */
        :root {
            --primary: #ec1d24; /* Marvel červená */
            --dark: #151515;
            --light: #f4f4f4;
            --accent: #ffd700;
        }
        
        * { box-sizing: border-box; }
        
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* --- HEADER & HERO SEKCE (MARVEL STYLE) --- */
        header {
            background-color: var(--dark);
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.5);
            position: relative;
            overflow: hidden;
        }

        .hero-title-box {
            background-color: var(--primary);
            display: inline-block;
            padding: 10px 30px;
            transform: skew(-5deg); /* Mírné zkosení pro dynamiku */
            border: 2px solid white;
            margin: 40px 0;
            box-shadow: 0 0 30px rgba(236, 29, 36, 0.6);
            animation: popIn 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .hero-title {
            font-family: 'Anton', sans-serif;
            text-transform: uppercase;
            font-size: 3.5rem;
            margin: 0;
            color: white;
            letter-spacing: 2px;
            transform: skew(5deg); /* Vrátíme text zpět do roviny */
        }

        .hero-subtitle {
            color: #ccc;
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        @keyframes popIn {
            0% { transform: scale(0) skew(-5deg); opacity: 0; }
            100% { transform: scale(1) skew(-5deg); opacity: 1; }
        }

        /* --- GRID PRODUKTŮ --- */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
        }

        .grid {
            display: grid;
            /* Magie responzivity: Automaticky vyplní řádek kartami o min. šířce 280px */
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        /* --- KARTA PRODUKTU --- */
        .card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        /* Placeholder obrázek (simulace) */
        .card-img {
            height: 250px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: 'Anton', sans-serif;
            font-size: 2rem;
            position: relative;
        }

        .tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent);
            color: var(--dark);
            padding: 5px 10px;
            font-weight: bold;
            font-size: 0.8rem;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .card-body {
            padding: 25px;
            flex-grow: 1; /* Aby tlačítka byla dole zarovnaná stejně */
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-family: 'Anton', sans-serif;
            font-size: 1.5rem;
            margin: 0 0 10px 0;
            color: var(--dark);
        }

        .card-text {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.5;
            flex-grow: 1;
            margin-bottom: 20px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary);
        }

        .btn {
            background-color: var(--dark);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 50px; /* Kulaté tlačítko */
            font-weight: bold;
            transition: background 0.3s;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .btn:hover {
            background-color: var(--primary);
        }

        /* --- FOOTER --- */
        footer {
            text-align: center;
            padding: 40px;
            background: var(--dark);
            color: #777;
            margin-top: 50px;
            border-top: 5px solid var(--primary);
        }
    </style>
</head>
<body>

    <header>
        <div class="hero-title-box">
            <h1 class="hero-title"><?php echo $hlavni_nadpis; ?></h1>
        </div>
        <p class="hero-subtitle">EPICKÉ ZAHRADNÍ DOPLŇKY PRO ODVÁŽNÉ ZAHRADNÍKY</p>
    </header>

    <div class="container">
        <h2 style="font-family: 'Anton'; margin-bottom: 30px; font-size: 2rem;">🔥 AKTUÁLNÍ NABÍDKA</h2>
        
        <div class="grid">
            <?php foreach($trpaslici as $t): ?>
                
                <div class="card">
                    <div class="card-img" style="background-color: <?php echo $t['img_color']; ?>;">
                        TRPASLÍK
                        
                        <?php if(!empty($t['tag'])): ?>
                            <span class="tag"><?php echo $t['tag']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="card-body">
                        <h3 class="card-title"><?php echo $t['nazev']; ?></h3>
                        <p class="card-text"><?php echo $t['popis']; ?></p>
                        
                        <div class="card-footer">
                            <span class="price"><?php echo $t['cena']; ?> Kč</span>
                            <a href="#" class="btn">Koupit</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Trpaslici cz s.r.o. | Všechna práva vyhrazena.</p>
        <p style="font-size: 0.8rem; margin-top: 10px;">Vyrobeno v PHP s láskou k sádře.</p>
    </footer>

</body>
</html>