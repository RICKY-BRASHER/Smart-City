import './bootstrap';
import 'bootstrap';
import '../css/app.css'; // Ajoute l'extension .css ici
import AOS from 'aos';
import 'aos/dist/aos.css';
AOS.init({
    duration: 1000, // Durée de l'animation en ms (1 seconde)
    once: true,     // L'animation ne se joue qu'une seule fois au scroll
});
