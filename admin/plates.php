<?php
require_once './Controller/PlateController.php';
$plateController = new PlateController();
$allPlate = $plateController->getAllPlate();
?>

<div class="page-content">
    <div class="page-header">
        <h1>
            Piatti
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                lista dei piatti disponibili
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">

                </div><!-- /.span -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-xs-12">

                    <div class="clearfix">
                        <div class="pull-right tableTools-container"></div>
                    </div>

                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                        <table id="dynamic-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="center">
<!--                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>-->
                                        ID
                                    </th>
                                    <th>Nome</th>
                                    <th>Descrizione</th>
                                    <th>Prezzo</th>
                                    <th class="hidden-480">Immagine</th>
                                    <th class="hidden-480">Stato</th>
                                    <th class="hidden-480">Azioni</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($allPlate != NULL) 
                                    foreach ($allPlate as $key => $value) {
                                ?>
                                <tr>
                                    <td class="center">
<!--                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>-->
                                        <?php echo $value["id_plate"]; ?>
                                    </td>

                                    <td>
                                        <a href="#"><?php echo $value["name"]; ?></a>
                                    </td>
                                    <td><?php echo $value["description"]; ?></td>
                                    <td class="hidden-480"><?php echo $value["price"]; ?> &euro;</td>
                                    <td>
                                        <ul class="ace-thumbnails clearfix">
                                                <li>
                                                    <a href="<?php echo $value["image"]; ?>" title="<?php echo $value["name"]; ?>" data-rel="colorbox">
                                                            <img width="100" alt="<?php echo $value["name"]; ?>" src="<?php echo $value["image"]; ?>" />
                                                    </a>
                                                </li>
                                        </ul>
                                    </td>

                                    <td class="hidden-480">
                                        <?php
                                            if ($value["available"] == "1") {
                                        ?>
                                        <span class="label label-sm label-success">Disponibile</span>
                                        <?php
                                            } else {
                                        ?>
                                        <span class="label label-sm label-danger">Non disponibile</span>
                                        <?php
                                            }
                                        ?>
                                    </td>

                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <a class="green" href="index.php?action=editPlates&idPlate=<?php echo $value["id_plate"]; ?>">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                            
                                            <!--<a class="red" href="#" id="<?php echo $value["id_plate"]; ?>" onclick="deletes('<?php echo $value["id_plate"]; ?>')"> </a>-->
                                                <a href="#" id="id-btn-dialog2" onclick="deletePlate('<?php echo $value["id_plate"]; ?>', '<?php echo $value["name"]; ?>')">
                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        
                            <div id="dialog-confirm" class="hide">
                                    <p class="bigger-110 bolder center grey">
                                            <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                                            Sei sicuro di voler cancellare il piatto selezionato?
                                    </p>
                            </div><!-- #dialog-confirm -->
                    </div>
                </div>
            </div>

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
<script src="assets/js/buttons.flash.min.js"></script>
<script src="assets/js/buttons.html5.min.js"></script>
<script src="assets/js/buttons.print.min.js"></script>
<script src="assets/js/buttons.colVis.min.js"></script>
<script src="assets/js/dataTables.select.min.js"></script>
<script src="assets/js/platesTable.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />


    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/colorbox.min.css" />
    <!-- page specific plugin scripts -->
    <script src="assets/js/jquery.colorbox.min.js"></script>
            
<script type="text/javascript">
            jQuery(function($) {
                    var $overflow = '';
                    var colorbox_params = {
                            rel: 'colorbox',
                            reposition:true,
                            scalePhotos:true,
                            scrolling:false,
                            previous:'<i class="ace-icon fa fa-arrow-left"></i>',
                            next:'<i class="ace-icon fa fa-arrow-right"></i>',
                            close:'&times;',
                            current:'{current} di {total}',
                            maxWidth:'100%',
                            maxHeight:'100%',
                            onOpen:function(){
                                    $overflow = document.body.style.overflow;
                                    document.body.style.overflow = 'hidden';
                            },
                            onClosed:function(){
                                    document.body.style.overflow = $overflow;
                            },
                            onComplete:function(){
                                    $.colorbox.resize();
                            }
                    };

                    $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
                    $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner blue fa-spin'></i>");//let's add a custom loading icon

                    $(document).one('ajaxloadstart.page', function(e) {
                            $('#colorbox, #cboxOverlay').remove();
               });
            })
        </script>