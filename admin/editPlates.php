<?php
require_once './Controller/PlateController.php';
$plateController = new PlateController();
$plate = $plateController->getPlate($_GET["idPlate"]);
$i = 1;
?>
<div class="page-content">
    <div class="page-header">
        <h1>
            Aggiungi un nuovo piatto
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
                    <div class="alert alert-block alert-success" id="resultMessage" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                        </button>

                        <i class="ace-icon fa fa-check green"></i>
                        Modifica avvenuta con successo.
                    </div>
                    <form class="form-horizontal" id="validation-form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Nome:</label>

                            <div class="col-xs-12 col-sm-9">
                                <div class="clearfix">
                                    <input type="name" name="name" id="name" class="col-xs-12 col-sm-3" value="<?php echo $plate["name"]; ?>" required/>
                                </div>
                            </div>
                        </div>

                        <div class="space-2"></div>

                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="description">Descrizione:</label>
                            <label for="form-field-8"></label>
                            <div class="col-xs-12 col-sm-9">
                                <div class="clearfix">
                                    <textarea class="form-control" id="description" placeholder="Descrizione del piatto" style="width:500px;height:150px;" required><?php echo $plate["description"]; ?></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="price">Prezzo:</label>

                            <div class="col-xs-12 col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ace-icon fa fa-euro"></i>
                                    </span>

                                    <input type="number" min="0" id="price" name="price" value="<?php echo $plate["price"]; ?>" required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="plateImage">Immagine:</label>

                            <div class="col-xs-12 col-sm-9">
                                <div class="clearfix">
                                    <input type="file" id="plateImage" />
                                </div>
                                <span class="help-block">Immagini consentite: jpeg, jpg, png. Max 2MB</span>
                            </div>
                        </div>

                        <div class="space-2"></div>

                        <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="available">Disponibile:</label>

                            <div class="col-xs-12 col-sm-9">
                                <div class="clearfix">
                                    <label>
                                        <!--<input id="available" class="ace ace-switch ace-switch-3" type="checkbox">-->
                                        <input id="available" class="ace ace-switch ace-switch-3" type="checkbox" <?php echo ($plate["available"] == 1 ? "checked=\"checked\"" : ""); ?>>
                                        <span class="lbl"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <button type="button" id="editPlate" class="btn btn-sm btn-success" style="margin-left:40%;">
                            Invia
                            <i class="ace-icon fa fa-arrow-right icon-on-right bigger-230"></i>
                        </button>
                        </div>
                    </form>
                    <div>
                    </div>
                </div>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->