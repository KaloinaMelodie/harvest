<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">

    <title>Harvest | Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" /><link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/harvest.ico') }}" />
</head>

<body style="background-image: url({{ asset('images/fond.png') }});background-size: cover; max-width: 100%; height: auto; display: block; /*background-blend-mode: overlay;*/">
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto" style="opacity: 0.95">
        <div class="card card0 border-0" style="margin-top: 4.5%">
            <nav class="navbar" style="background: #009970;">
                <div class="container-fluid">
                <?php if(!isset($_GET['inscription'])) { ?>
                    <span class="navbar-brand mb-0 h1" style="font-family: corbel;font-weight:500;">Bienvenu dans la page d'authentification</span>
                <?php } else { ?>
                    <span class="navbar-brand mb-0 h1">Bienvenu dans la page d'inscription</span>
                <?php } ?>
                </div>
            </nav>
            <div class="row d-flex">

                <?php if(!isset($_GET['inscription'])) { ?>
                    <?php if(isset($_GET['login'])) { ?>
                        <div class="col-lg-6 animate__animated animate__slideInRight border-line">
                    <?php } else { ?>
                        <div class="col-lg-6 animate__animated animate__fadeIn border-line">
                    <?php } ?>
                            <div class="card1 pb-5">
                                <div class="row px-3 justify-content-center mb-5" style="margin-top: 13%">
                                    <img src="{{ asset('images/logo_harvest2.png') }}" class="image">
                                </div>
                            </div>
                        </div>
                    <?php if(isset($_GET['login'])) { ?>
                        <div class="col-lg-6 animate__animated animate__slideInLeft">
                    <?php } else { ?>
                        <div class="col-lg-6 animate__animated animate__fadeIn">
                    <?php } ?>
                            <div class="card2 card border-0 px-4 py-5">

                                <div class="row px-3 mb-4">
                                    <h4 class="se_connecter" style="text-align: center;font-family: century gothic;font-weight:600">Se connecter</h4>
                                </div>
                            <form action="traitementLogin" method="get">                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Adresse email</h6>
                                    </label>
                                    <input class="mb-4" type="text" name="login" placeholder="Entrer votre adresse email" >
                                </div>

                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Mot de passe</h6>
                                    </label>
                                    <input class="mb-4" type="password" name="mdp" placeholder="Entrer votre mot de passe">
                                </div>

                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Votre profil</h6>
                                    </label>
                                    <select name="profile" class="form-select mb-4" aria-label="Default select example">
                                        <option value="Agriculteurs">Agriculteurs</option>
                                        <option value="Vulgarisateurs">Vulgarisateurs</option>
                                        <option value="Décideurs">Décideurs</option>
                                    </select>
                                </div>

                                <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center" style="background-color: #008040;">Se connecter</button> </div>
                            </form> 
                              
                               
                                   <p> @if(isset($message))
                                        {{ $message }}
                                    
                                    @endif</p>
                                                               <div class="row mb-4 px-3"> <small class="font-weight-bold">Vous n'avez pas de compte? <a class="text-danger " href="?inscription">S'inscrire</a></small> </div>

                            </div>
                        </div>
                <?php } else { ?>
                    <div class="col-lg-6 animate__animated animate__slideInRight border-line">
                        <div class="card2 card border-0 px-4 py-5">
                            
                            <div class="row px-3 mb-4">
                                <h4 class="se_connecter" style="text-align: center;">INSCRIPTION</h4>
                            </div>
                        <form action="traitementInscription" method="get">
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Votre profil</h6>
                                </label>
                                <select class="form-select mb-4" name="profile" >
                                    <option value="Agriculteurs">Agriculteur</option>
                                    <option value="Vulgarisateurs">Vulgarisateur</option>
                                </select>
                            </div>

                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Votre nom</h6>
                                </label>
                                <input class="mb-4" type="text" name="nom" placeholder="Entrer votre nom">
                            </div>

                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Votre prénom</h6>
                                </label>
                                <input class="mb-4" type="text" name="prenom" placeholder="Entrer votre prénom">
                            </div>

                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Votre adresse email</h6>
                                </label>
                                <input class="mb-4" type="email" name="login" placeholder="Entrer votre adresse email">
                            </div>

                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Votre adresse</h6>
                                </label>
                                <input class="mb-4" type="text" name="adresse" placeholder="Entrer votre adresse">
                            </div>

                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Contact</h6>
                                </label>
                                <input class="mb-4" type="text" name="contact" placeholder="Entrer votre numéro de téléphone">
                            </div>

                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Votre date de naissance</h6>
                                </label>
                                <input class="mb-4" type="date" name="ddn">
                            </div>

                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Mot de passe</h6>
                                </label>
                                <input class="mb-4" type="password" name="mdp" placeholder="Entrer votre mot de passe">
                            </div>

                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Confirmer votre mot de passe</h6>
                                </label>
                                <input class="mb-4" type="password" placeholder="Confirmer votre mot de passe">
                            </div>

                            <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center" style="background-color: #008040;">S'inscrire</button> </div>

                            <div class="row mb-4 px-3"> <small class="font-weight-bold">Vous avez déjà un compte? <a class="text-danger " href="?login">Se connecter</a></small> </div>
</form>
                        </div>
                    </div>
                    <div class="col-lg-6 animate__animated animate__slideInLeft">
                        <div class="card1 pb-5">
                            <div class="row px-3 justify-content-center mt-4 mb-5"> <img src="{{ asset('images/logo_harvest2.png') }}" class="image"> </div>
                            <div class="row px-3 justify-content-center mt-4 mb-5"> <img src="{{ asset('images/logo_harvest1.png') }}" class="image"> </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <nav class="navbar" style="background-color: #ccffe6;">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1" style="color: #ccffe6;">Navbar</span>
                </div>
            </nav>
        </div>
    </div>
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
</body>

</html>