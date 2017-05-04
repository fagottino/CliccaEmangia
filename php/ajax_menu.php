
<section id="menu-list" class="menu-list">
            <div class="container">
                <div class="row menu">
                    <div class="col-md-9 col-md-offset-1 col-sm-10">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="menu-item">
                                        <?php
                                            foreach ($allDrink as $key => $value) {
                                                echo ' 
                                        <h3 class= "menu-title">' . $value['name'] . '</h3 >
                                            <p class="menu-about">' . $value['description'] . '</p>
                                         <div class="menu-system">
                                            <div class="half">
                                                <p class="per-head">
                                                    <span><i class="fa fa-user"></i></span>1:1</p>
                                            </div>
                                            <div class="half"> 
                                                <p class = "price">€' . $value['price'] . '</p>
                                            </div>
                                        </div>';
                                            }
                                     
                                        ?> 
                                    </div>
                                </div> 
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12"> <!-- col-md-3 col-sm-6 col-xs-12  -->
                                <div class="row">
                                    <div class="menu-catagory">
                                        <h2>Food</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="menu-item">
                                        <?php
                                         
                                            foreach ($allPlate as $key => $value) {
                                                echo '
                                        <h3 class= "menu-title">' . $value['name'] . '</h3>
                                            <p class="menu-about">' . $value['description'] . '</p>
                                         <div class="menu-system">
                                            <div class="half">
                                                <p class="per-head">
                                                    <span><i class="fa fa-user"></i></span>1:1</p>
                                            </div>
                                            <div class="half"> <p class = "price">€' . $value['price'] . '</p>
                                            </div>
                                        </div>';
                                            }
                                        
                                        ?> 
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>