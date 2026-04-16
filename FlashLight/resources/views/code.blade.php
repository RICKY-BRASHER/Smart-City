<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Smart-City</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Arrière-plan animé dégradé */
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .main-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(-45deg, #0f172a, #134e4a, #0e7490, #064e3b);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            font-family: 'Poppins', sans-serif;
        }

        /* Carte en verre (Glassmorphism) */
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            width: 100%;
            max-width: 450px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            color: white;
        }

        /* Grand Titre Smart City */
        .brand-title {
            font-size: 3rem;
            font-weight: 800;
            text-transform: uppercase;
            background: linear-gradient(to right, #2dd4bf, #38bdf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 5px;
            letter-spacing: 2px;
            filter: drop-shadow(0 0 10px rgba(45, 212, 191, 0.3));
        }

        .brand-subtitle {
            color: #94a3b8;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        /* Inputs OTP styleé */
        .otp-inputs {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin: 30px 0;
        }

        .otp-inputs input {
            width: 55px;
            height: 65px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            text-align: center;
            font-size: 1.8rem;
            font-weight: bold;
            color: #fff;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .otp-inputs input:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: #2dd4bf;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px -5px rgba(45, 212, 191, 0.4);
            outline: none;
        }

        /* Bouton Premium */
        .btn-verify {
            width: 100%;
            padding: 16px;
            border-radius: 15px;
            border: none;
            background: linear-gradient(45deg, #14b8a6, #0ea5e9);
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-verify:hover {
            transform: scale(1.02);
            box-shadow: 0 0 25px rgba(20, 184, 166, 0.5);
        }

        .footer-links a {
            color: #2dd4bf;
            text-decoration: none;
            font-weight: 600;
        }

    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="glass-card">
            <!-- Logo / Titre décoré -->
            <div class="brand-section">
                <h1 class="brand-title">Smart City</h1>
                <div class="brand-subtitle">L'avenir entre vos mains</div>
            </div>

            <div class="content-section">
                <div class="icon-box">
                    <i class="bi bi-shield-lock-fill"></i>  Code invalide dans 4 minutes
                </div>
                <h3>Vérification Sécurisée</h3>
                <p>Entrez le code à 6 chiffres reçu par mail
                </p>

                <form id="otp-form">
                    @csrf
                    <div class="otp-inputs">
                        <input type="text" maxlength="1" inputmode="numeric" autocomplete="one-time-code">
                        <input type="text" maxlength="1" inputmode="numeric">
                        <input type="text" maxlength="1" inputmode="numeric">
                        <input type="text" maxlength="1" inputmode="numeric">
                        <input type="text" maxlength="1" inputmode="numeric">
                        <input type="text" maxlength="1" inputmode="numeric">
                    </div>
                    
                    <input type="hidden" name="code" id="full-code">
                    <p style="text-align: center;color: red;" id="code_error"></p>
                    <button type="submit" class="btn-verify" id="submitBtn">
                        <span>Valider l'inscription</span>
                        <i class="bi bi-arrow-right-circle"></i>
                    </button>
                </form>

                <div class="footer-links">
                    Pas reçu ? <a id="resendCode">Renvoyer le code</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            const inputs = $('.otp-inputs input');

            inputs.on('input', function() {
                if (this.value.length === 1) {
                    $(this).next('input').focus();
                }
                updateCode();
            });

            inputs.on('keydown', function(e) {
                if (e.key === 'Backspace' && !this.value) {
                    $(this).prev('input').focus();
                }
            });

            function updateCode() {
                let code = '';
                inputs.each(function() { code += this.value; });
                $('#full-code').val(code);
            }

            $('#otp-form').on('submit', function(e) {
                e.preventDefault();
                $('#code_error').hide().text('');
                $('.otp-inputs input').removeClass('is-invalid');
                var formData = new FormData($('#otp-form')[0]);
                $.ajax({
                    url: "{{ route('valid_verif_code') }}",
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            // 1. On prépare la balise d'erreur pour le succès
                            $('#code_error')
                                .hide() // On cache pour l'animation
                                .text('') // On vide le texte
                                .css({
                                    'color': '#064e3b', // Vert sombre (Emerald 900)
                                    'background': 'rgba(16, 185, 129, 0.2)', // Fond vert très léger
                                    'padding': '10px',
                                    'border-radius': '8px',
                                    'display': 'flex',
                                    'align-items': 'center',
                                    'justify-content': 'center',
                                    'gap': '10px',
                                    'margin-bottom': '15px'
                                })
                                .html('<div class="spinner-border spinner-border-sm" role="status"></div> <span>Code correct ! Préparation a la connexion...</span>')
                                .fadeIn(); // Apparition fluide

                            // 2. On change le style des inputs pour montrer le succès
                            $('.otp-inputs input').css('border-color', '#10b981').prop('disabled', true);

                            // 3. On désactive le bouton
                            $('#submitBtn').prop('disabled', true).html('Chargement...');

                            // 4. Redirection après 2.5 secondes
                            setTimeout(function() {
                                window.location.href = response.redirect;
                            }, 3000);
                        } else {
                            $('#code_error').text(response.message).show();
                        }
                    },
                    error: function(xhr) {
                        // On affiche le bloc d'erreur
                        $('#code_error').fadeIn();

                        // CAS 1 : Erreurs de validation Laravel (ex: pas 6 chiffres)
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $('#code_error').text(errors.code[0]);
                            $('.otp-inputs input').addClass('is-invalid');
                        } 
                        // CAS 2 : Tes erreurs personnalisées (400 - Expiré ou Incorrect)
                        else if (xhr.status === 400) {
                            $('#code_error').text(xhr.responseJSON.message);
                            $('.otp-inputs input').addClass('is-invalid');
                        } 
                        else {
                            $('#code_error').text("Une erreur technique est survenue.");
                        }
                    }
                });
            });
            $('#resendCode').on('click', function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ route('resend_code') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        windox.location.reload();
                    },
                    error: function(xhr) {
                        alert("Une erreur est survenue lors de la tentative de renvoi du code.");
                    }
                })
            })
        });


    </script>
</body>
</html>