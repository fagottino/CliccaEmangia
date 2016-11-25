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
                                                <a href="#" id="id-btn-dialog2" onclick="deletef('<?php echo $value["id_plate"]; ?>', '<?php echo $value["name"]; ?>')">
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