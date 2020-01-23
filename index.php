<?php require './pages/header.php';?>

    <div class="container-fluid bg-search">
        <div class="container pt-4">
            <div class="form-group d-flex ">
                <input type="text "
                    class="form-control p-2 form-search-main" name="" id="" aria-describedby="helpId" placeholder="O que você está procurando?">
                <button name="search" id="search" class="btn btn-search" type="button" >Pesquisar</button>
            </div>  
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-3 ">
            <div class="container-fluid m-3 d-flex">
            <div class="col-md-2 d-xl-block d-lg-block d-sm-none d-md-none d-none">
                <h4 class="mt-3">Filtrar por</h4>
                
                <div class="form-group mt-4">
                    <label for="categories" class=" text-secondary  mt-3 ml-1">Categoria</label>
                    
                    <select class="form-control form-control-sm text-secondary" name="categories" id="categories">
                    <?php
                        require 'classes/CategorieModel.php';
                        $c = new Categorie();
                        $categs = $c->getList(); 

                        foreach($categs as $categ): ?>
                        <option value="<?= $categ["id"]?>"><?= utf8_encode($categ["name"])?></option>
                        <?php endforeach ?>
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="value" class="text-secondary  ml-1">Valor</label>
                    <div class="d-flex">
                        <input type="number" class="form-control form-control-sm" name="value" id="value"  placeholder="R$: Min">
                        <input type="number" class="form-control form-control-sm" name="value" id="value"  placeholder="R$: Máx">
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="text-secondary  ml-1">Estado de conservação</label>
                    <select class="form-control form-control-sm" name="status" id="status">
                        <option value="2" class="text-secondary">Ótimo</option>
                        <option value="1" class="text-secondary">Bom</option>
                        <option value="0" class="text-secondary">Ruim</option>
                    </select>
                </div>
                <div class="text-center m-3 mt-4 ">
                    <input name="btn" id="btn" class="btn btn-info btn-block btn-sm" type="submit" value="FILTRAR">
                </div>
                
            </div>
            <div class="col-lg-10">
                <h4 class="text-center mt-3">Últimos Anúncios</h4>
                <div class="container-fluid mt-3">
                    <div class="row mt-5">
                        <div class="col-lg-3 col-md-3 mt-3 col-sm-6 card-anuncios">
                            <a href="" class="links-anuncios">
                            <div class="card">
                                <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">

                                <div class="card-body">
                                <h6 class="card-title text-secondary text-center">Vans</h6>
                                <p class="text-center text-dark">
                                    Tênis ultrarange rapidweld
                                </p>
 
                                <div class="text-center">
                                    <div class="price text-success"><h5 class="mt-4">R$125</h5></div>
                                    <a href="#" class="btn btn-danger btn-block btn-sm mt-3"><i class="fas fa-shopping-cart"></i>Comprar </a>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>

                         <div class="col-lg-3 col-md-3 mt-3 col-sm-6 card-anuncios">
                            <a href="" class="links-anuncios">
                            <div class="card">
                                <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">

                                <div class="card-body">
                                <h6 class="card-title text-secondary text-center">Vans</h6>
                                <p class="text-center text-dark">
                                    Tênis ultrarange rapidweld
                                </p>
 
                                <div class="text-center">
                                    <div class="price text-success"><h5 class="mt-4">R$125</h5></div>
                                    <a href="#" class="btn btn-danger btn-block btn-sm mt-3"><i class="fas fa-shopping-cart"></i>Comprar </a>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 mt-3 col-sm-6 card-anuncios">
                            <a href="" class="links-anuncios">
                            <div class="card">
                                <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">

                                <div class="card-body">
                                <h6 class="card-title text-secondary text-center">Vans</h6>
                                <p class="text-center text-dark">
                                    Tênis ultrarange rapidweld
                                </p>
 
                                <div class="text-center">
                                    <div class="price text-success"><h5 class="mt-4">R$125</h5></div>
                                    <a href="#" class="btn btn-danger btn-block btn-sm mt-3"><i class="fas fa-shopping-cart"></i>Comprar </a>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 mt-3 col-sm-6 card-anuncios">
                            <a href="" class="links-anuncios">
                            <div class="card">
                                <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">

                                <div class="card-body">
                                <h6 class="card-title text-secondary text-center">Vans</h6>
                                <p class="text-center text-dark">
                                    Tênis ultrarange rapidweld
                                </p>
 
                                <div class="text-center">
                                    <div class="price text-success"><h5 class="mt-4">R$125</h5></div>
                                    <a href="#" class="btn btn-danger btn-block btn-sm mt-3"><i class="fas fa-shopping-cart"></i>Comprar </a>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        
                    </div>

                    <h4 class="text-center mt-5">Calçados e Acessórios</h4>
                    <div class="container-fluid mt-3">
                    <div class="row mt-5">
                        <div class="col-lg-3 col-md-3 mt-3 col-sm-6 card-anuncios">
                            <a href="" class="links-anuncios">
                            <div class="card">
                                <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">

                                <div class="card-body">
                                <h6 class="card-title text-secondary text-center">Vans</h6>
                                <p class="text-center text-dark">
                                    Tênis ultrarange rapidweld
                                </p>
 
                                <div class="text-center">
                                    <div class="price text-success"><h5 class="mt-4">R$125</h5></div>
                                    <a href="#" class="btn btn-danger btn-block btn-sm mt-3"><i class="fas fa-shopping-cart"></i>Comprar </a>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>

                         <div class="col-lg-3 col-md-3 mt-3 col-sm-6 card-anuncios">
                            <a href="" class="links-anuncios">
                            <div class="card">
                                <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">

                                <div class="card-body">
                                <h6 class="card-title text-secondary text-center">Vans</h6>
                                <p class="text-center text-dark">
                                    Tênis ultrarange rapidweld
                                </p>
 
                                <div class="text-center">
                                    <div class="price text-success"><h5 class="mt-4">R$125</h5></div>
                                    <a href="#" class="btn btn-danger btn-block btn-sm mt-3"><i class="fas fa-shopping-cart"></i>Comprar </a>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 mt-3 col-sm-6 card-anuncios">
                            <a href="" class="links-anuncios">
                            <div class="card">
                                <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">

                                <div class="card-body">
                                <h6 class="card-title text-secondary text-center">Vans</h6>
                                <p class="text-center text-dark">
                                    Tênis ultrarange rapidweld
                                </p>
 
                                <div class="text-center">
                                    <div class="price text-success"><h5 class="mt-4">R$125</h5></div>
                                    <a href="#" class="btn btn-danger btn-block btn-sm mt-3"><i class="fas fa-shopping-cart"></i>Comprar </a>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-3 mt-3 col-sm-6 card-anuncios">
                            <a href="" class="links-anuncios">
                            <div class="card">
                                <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">

                                <div class="card-body">
                                <h6 class="card-title text-secondary text-center">Vans</h6>
                                <p class="text-center text-dark">
                                    Tênis ultrarange rapidweld
                                </p>
 
                                <div class="text-center">
                                    <div class="price text-success"><h5 class="mt-4">R$125</h5></div>
                                    <a href="#" class="btn btn-danger btn-block btn-sm mt-3"><i class="fas fa-shopping-cart"></i>Comprar </a>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>

    
<?php require './pages/footer.php';?>


