<?php include_once("header.php"); ?>
<section id="container">
    <?php 
        include_once("topbar.php");
        include_once("menu.php"); 
        $useragent=$_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        {
            header('Location: reporte.php');
            echo "<script type='text/javascript'>window.location.href = 'reporte.php';</script>";
            exit();
        }
    ?>
    <section id="main-content">
        <section class="wrapper">
            <div class="container">
                <h1>Venta</h1>
                <div class="menu">
                    <!-- Start Cart -->
                    <div class="container">
                        <div class="row">
                            <!-- Menu and categories -->
                            <div class="col-md-9 search-grid">
                                <div class="product-container">
                                    <!-- Menu List of items -->
                                    <div class="menu-list">
                                        <div class="panel panel-default" id="content1">
                                            <div class="panel-heading"></div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="menu-item-container">
                                                            <div class="item-name">Veg biriyani</div>
                                                            <div>Stock : 50 u</div>
                                                            <div class="item-price-container">
                                                                <div class="item-price">
                                                                    <i class="fa fa-dollar"></i>199
                                                                </div>
                                                                <div class="spacer"></div>
                                                                <div class="add-button">
                                                                    <button class="btn btn-primary sc-add-to-cart" data-name="Veg biriyani" data-price="199" type="submit">ADD</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="menu-item-container">
                                                            <div class="item-name">Sweet Corn Soup</div>
                                                            <div>Stock : 50 u</div>
                                                            <div class="item-price-container">
                                                                <div class="item-price">
                                                                    <i class="fa fa-dollar"></i>50
                                                                </div>
                                                                <div class="spacer"></div>
                                                                <div class="add-button">
                                                                    <button class="btn btn-primary sc-add-to-cart" data-name="Sweet Corn Soup" data-price="50" type="submit">ADD</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="menu-item-container"><div class="item-name">Corn fried Rice</div><div><i class="fa fa-dot-circle-o veg-icon"></i></div>
                                                            <div class="item-price-container">
                                                                <div class="item-price">
                                                                    <i class="fa fa-dollar"></i>112
                                                                </div>
                                                                <div class="spacer"></div>
                                                                <div class="add-button">
                                                                    <button class="btn btn-primary sc-add-to-cart" data-name="Corn fried Rice" data-price="112" type="submit">ADD</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="menu-item-container"><div class="item-name">Orange Juice</div><div><i class="fa fa-dot-circle-o veg-icon"></i></div>
                                                            <div class="item-price-container">
                                                                <div class="item-price">
                                                                    <i class="fa fa-dollar"></i>50
                                                                </div>
                                                                <div class="spacer"></div>
                                                                <div class="add-button">
                                                                    <button class="btn btn-primary sc-add-to-cart" data-name="Orange Juice" data-price="50" type="submit">ADD</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="menu-item-container">
                                                            <div class="item-name">Aloo Tikis</div>
                                                            <div><i class="fa fa-dot-circle-o veg-icon"></i></div>
                                                            <div class="item-price-container">
                                                                <div class="item-price">
                                                                    <i class="fa fa-dollar"></i>89
                                                                </div>
                                                                <div class="spacer"></div>
                                                                <div class="add-button">
                                                                    <button class="btn btn-primary sc-add-to-cart" data-name="Aloo Tikis" data-price="89" type="submit">ADD</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="menu-item-container"><div class="item-name">Veg biriyani</div><div><i class="veg-icon"></i></div>
                                                            <div class="item-price-container">
                                                                <div class="item-price">
                                                                    <i class="fa fa-dollar"></i>199
                                                                </div>
                                                                <div class="spacer"></div>
                                                                <div class="add-button">
                                                                    <button class="btn btn-primary sc-add-to-cart" data-name="Veg biriyani" data-price="199" type="submit">ADD</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="menu-item-container"><div class="item-name">Veg biriyani</div><div><i class="veg-icon"></i></div>
                                                            <div class="item-price-container">
                                                                <div class="item-price">
                                                                    <i class="fa fa-dollar"></i>199
                                                                </div>
                                                                <div class="spacer"></div>
                                                                <div class="add-button">
                                                                    <button class="btn btn-primary sc-add-to-cart" data-name="Veg biriyani" data-price="199" type="submit">ADD</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- //Menu List of items -->
                                </div>
                            </div>
                            <!-- //Menu and categories -->
                            <!-- Cart Grid -->
                            <div class="col-md-3">
                                <div id="cart"></div>
                            </div>
                            <!-- //Cart Grid -->
                        </div>
                    </div>
                    <!-- End Cart -->
                </div>     
            </div>
        </section>
    </section>
</section>
</section>
<?php include_once("footer.php"); ?>
