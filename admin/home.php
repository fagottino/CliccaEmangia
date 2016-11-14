<div class="page-content">
    <div class="ace-settings-container" id="ace-settings-container">
        <!--<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
            <i class="ace-icon fa fa-cog bigger-130"></i>
        </div>-->

        <div class="ace-settings-box clearfix" id="ace-settings-box">
            <div class="pull-left width-50">
                <div class="ace-settings-item">
                    <div class="pull-left">
                        <select id="skin-colorpicker" class="hide">
                            <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                            <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                            <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                            <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                        </select>
                    </div>
                    <span>&nbsp; Choose Skin</span>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                    <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                    <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                    <label class="lbl" for="ace-settings-add-container">
                        Inside
                        <b>.container</b>
                    </label>
                </div>
            </div><!-- /.pull-left -->

            <div class="pull-left width-50">
                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                    <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                    <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                    <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                </div>
            </div><!-- /.pull-left -->
        </div><!-- /.ace-settings-box -->
    </div><!-- /.ace-settings-container -->

    <div class="page-header">
        <h1>
            Dashboard
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                gestisci la tua attività
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>

                <i class="ace-icon fa fa-check green"></i>

                Benvenuto in
                <strong class="green">
                    Clicca e Mangia
                    <small>(v1.0)</small>
                </strong>.
                Guarda il sito dedicato ai clienti <a href="https://github.com/bopoda/ace">CliccaEmangia</a>.
            </div>

            <div class="row">
                <div class="space-6"></div>

                <div class="col-sm-6 infobox-container">
                    <a href="#" class="btn btn-app btn-purple">
                        <i class="ace-icon fa fa-cutlery bigger-230"></i>
                        Aggiungi piatto
                    </a>
                </div>

                <div class="vspace-12-sm"></div>

                <div class="col-sm-6 infobox-container">
                    <a href="#" class="btn btn-app btn-success">
                        <i class="ace-icon fa fa-beer bigger-230"></i>
                        Aggiungi bevanda
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!--            <div class="row">
                            <div class="col-sm-5">
                                <div class="widget-box transparent">
                                    <div class="widget-header widget-header-flat">
                                        <h4 class="widget-title lighter">
                                            <i class="ace-icon fa fa-star orange"></i>
                                            Popular Domains
                                        </h4>
            
                                        <div class="widget-toolbar">
                                            <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>
            
                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <table class="table table-bordered table-striped">
                                                <thead class="thin-border-bottom">
                                                    <tr>
                                                        <th>
                                                            <i class="ace-icon fa fa-caret-right blue"></i>name
                                                        </th>
            
                                                        <th>
                                                            <i class="ace-icon fa fa-caret-right blue"></i>price
                                                        </th>
            
                                                        <th class="hidden-480">
                                                            <i class="ace-icon fa fa-caret-right blue"></i>status
                                                        </th>
                                                    </tr>
                                                </thead>
            
                                                <tbody>
                                                    <tr>
                                                        <td>internet.com</td>
            
                                                        <td>
                                                            <small>
                                                                <s class="red">$29.99</s>
                                                            </small>
                                                            <b class="green">$19.99</b>
                                                        </td>
            
                                                        <td class="hidden-480">
                                                            <span class="label label-info arrowed-right arrowed-in">on sale</span>
                                                        </td>
                                                    </tr>
            
                                                    <tr>
                                                        <td>online.com</td>
            
                                                        <td>
                                                            <b class="blue">$16.45</b>
                                                        </td>
            
                                                        <td class="hidden-480">
                                                            <span class="label label-success arrowed-in arrowed-in-right">approved</span>
                                                        </td>
                                                    </tr>
            
                                                    <tr>
                                                        <td>newnet.com</td>
            
                                                        <td>
                                                            <b class="blue">$15.00</b>
                                                        </td>
            
                                                        <td class="hidden-480">
                                                            <span class="label label-danger arrowed">pending</span>
                                                        </td>
                                                    </tr>
            
                                                    <tr>
                                                        <td>web.com</td>
            
                                                        <td>
                                                            <small>
                                                                <s class="red">$24.99</s>
                                                            </small>
                                                            <b class="green">$19.95</b>
                                                        </td>
            
                                                        <td class="hidden-480">
                                                            <span class="label arrowed">
                                                                <s>out of stock</s>
                                                            </span>
                                                        </td>
                                                    </tr>
            
                                                    <tr>
                                                        <td>domain.com</td>
            
                                                        <td>
                                                            <b class="blue">$12.00</b>
                                                        </td>
            
                                                        <td class="hidden-480">
                                                            <span class="label label-warning arrowed arrowed-right">SOLD</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> /.widget-main 
                                    </div> /.widget-body 
                                </div> /.widget-box 
                            </div> /.col 
            
                            <div class="col-sm-7">
                                <div class="widget-box transparent">
                                    <div class="widget-header widget-header-flat">
                                        <h4 class="widget-title lighter">
                                            <i class="ace-icon fa fa-signal"></i>
                                            Sale Stats
                                        </h4>
            
                                        <div class="widget-toolbar">
                                            <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>
            
                                    <div class="widget-body">
                                        <div class="widget-main padding-4">
                                            <div id="sales-charts"></div>
                                        </div> /.widget-main 
                                    </div> /.widget-body 
                                </div> /.widget-box 
                            </div> /.col 
                        </div> /.row -->

            <div class="row">
                <div class="col-sm-6">
                </div><!-- /.col -->

                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->