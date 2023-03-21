<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <link href="{{asset('css/vulgarisateur.css')}}" rel="stylesheet">
    <title>Vulgarisateur</title>

    <style>
            .hery::-webkit-scrollbar
            {
                width: 5px;
            }

            .hery::-webkit-scrollbar-track
            {
                background: #f1f1f1;
            }

            .hery::-webkit-scrollbar-thumb
            {
                background: #888;
            }

            .hery::-webkit-scrollbar-thumb:hover
            {
                background: #555;
            }

    </style>
  </head>
  <body  >

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" id="profil" href="#"><img src="vulgarisateur.jpg" id="avatar"> Profil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link disabled">Deconnect</a>
                </li>
                </ul>
                <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            </div>
    </nav>




    <nav id="menu">
        <div class="nav nav-tabs" id="nav-tab" role="tablist"  >
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
            <button class="nav-link" id="nav-message-tab" data-bs-toggle="tab" data-bs-target="#nav-message" type="button" role="tab" aria-controls="nav-message" aria-selected="false">Message</button>
            <button class="nav-link" id="nav-Activite-tab" data-bs-toggle="tab" data-bs-target="#nav-activite" type="button" role="tab" aria-controls="nav-activite" aria-selected="false">Activite</button>
            <button class="nav-link" id="nav-publication-tab" data-bs-toggle="tab" data-bs-target="#nav-publication" type="button" role="tab" aria-controls="nav-publication" aria-selected="false">Publication</button>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent" style="width:100%; " >

        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" id="carouselPerso">
                    <div class="carousel-item active">
                            <img src="pic3.jpg" class="d-block w-100" alt="...">
                    </div>

                    <div class="carousel-item">
                            <img src="pic4.jpg" class="d-block w-100" alt="...">
                    </div>

                </div>


                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                </button>


                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                </button>

            </div>

        </div>


        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row" id="myprofile">
                <div class="col-md-6">
                    <div class="card" style="width:100%; ">



                            <div id="name">
                                <h4>Rabe Bema</h4>

                            </div>

                            <ul class="list-group list-group-flush" id="info">
                                <li class="list-group-item">Adresse : Antananarivo</li>
                                <li class="list-group-item">Date de Naissance : 1988-05-02</li>
                                <li class="list-group-item">Contact : 0320212345</li>
                            </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <h3>Pour changer profil</h3>
                    <h6>Photo de profil : </h6>
                    <div>
                        <label for="formFileLg" class="form-label">Large file input example</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="file">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                      </div>
                      <div class="col-12">
                        <label for="inputAddress2" class="form-label">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                      </div>
                </div>


            </div>
        </div>



        <div class="tab-pane fade" id="nav-message" role="tabpanel" aria-labelledby="nav-message-tab">

            <div class="row">
                    <div class="col-md-6 "  style="overflow:scroll; height:250px; width:100%;margin-top:50px;" >
                        <div class="card" style="width:100%;" >
                            <img src="télécharger.png" style="width:100px;" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <a href="#" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>

                        <div class="card" style="width:100%;" >
                            <img src="télécharger.png" style="width:100px;" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <a href="#" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>

                        <div class="card" style="width:100%;" >
                            <img src="télécharger.png" style="width:100px;" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <a href="#" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6" style="width:100%; margin-top:50px; height:500px; overflow:scroll;">
                        <div class="card text-white bg-success mb-3" style="height:500px;" >
                            <div class="card-header">Header</div>
                            <div class="card-body">
                            <h5 class="card-title">Success card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>


            <div class="tab-pane fade" id="nav-activite" role="tabpanel" aria-labelledby="nav--tab">

                <div class="row">
                    <div class="card">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-success">Go somewhere</a>
                        </div>
                      </div>

                      <div class="card">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-success">Go somewhere</a>
                        </div>
                      </div>

                      <div class="card">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-success">Go somewhere</a>
                        </div>
                      </div>

                      <div class="card">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-success">Go somewhere</a>
                        </div>
                      </div>

                      <div class="card">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-success">Go somewhere</a>
                        </div>
                      </div>

                      <div class="card">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-success">Go somewhere</a>
                        </div>
                      </div>

                </div>

            </div>


            <div class="tab-pane fade" id="nav-publication" role="tabpanel" aria-labelledby="nav--tab">
                <form>
                    <h1>New Publication </h1>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <img src="feuille-leaf-04.svg" class="card-img-bottom" alt="...">
                </div>


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <img src="feuille-leaf-04.svg" class="card-img-bottom" alt="...">
                </div>


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <img src="1398247860.svg" class="card-img-bottom" alt="...">
                </div>
            </div>
        </div>

  <section class="btn-light text-dark p-5" >
            <div class="container" >
                <div class="d-md-flex justify-content-between align-items-center" >
                    <p>Metre  jours votre <span>localisation</span> </p>
                    <div class="input-group" >
                        <button class="btn btn-dark btn-lg" type="button" onclick="alert('reussi!!!')">Button</button>
                    </div>
                </div>
            </div>
    </section>

    <!-- footer -->
       <footer class="p-1 bg-dark text-white text-center position-relative " >
            <div class="container">
                <p class="lead" style="font-family: corbel;">
                    HARVEST Madagascar
                </p>
            </div>
       </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->

  </body>
</html>
