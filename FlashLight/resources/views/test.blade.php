<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="eco-bg">
    <div class="wave wave-1"></div>
    <div class="wave wave-2"></div>
    <div class="wave wave-3"></div>
</div>
<div class="sky-container">
    <div class="cloud cloud-1"></div>
    <div class="cloud cloud-2"></div>
    <div class="cloud cloud-3"></div>
    <div class="cloud cloud-4"></div>
</div>

<!-- Hero Section -->
<section class="hero" style="height: 100vh; display: flex; align-items: center; justify-content: center; flex-direction: column;">
    
    <div data-aos="zoom-out-up" data-aos-duration="1500">
        <h1 style="font-size: 4rem; color: #166534;">Sauvons la Planète</h1>
    </div>

    <div data-aos="fade-up" data-aos-delay="500" style="margin-top: 20px;">
        <p>Une application pour un futur plus vert.</p>
    </div>

    <!-- Un bouton qui "respire" -->
    <button class="btn-eco" data-aos="fade-up" data-aos-delay="800">
        Commencer l'impact
    </button>
</section>

<!-- Section Stats (en cascade) -->
<section class="stats" style="display: flex; gap: 20px; padding: 50px;">
    <div class="card-eco" data-aos="fade-right" data-aos-delay="200">
        <h3>500k</h3>
        <p>Arbres plantés</p>
    </div>
    <div class="card-eco" data-aos="fade-right" data-aos-delay="400">
        <h3>12t</h3>
        <p>CO2 économisé</p>
    </div>
</section>


</body>
</html>