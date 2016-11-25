function deletes(no) {
    $.post("./Controller/PlateController.php",
            {
                id: no,
                type: "delete"
            });
    window.location = "./index.php?action=plates";
}

function deletef(id, name) {
    $("#dialog-confirm").text('Stai cancellando il piatto ' + name + '. Continuare?');
    $("#dialog-confirm").removeClass('hide').dialog({
        resizable: false,
        width: '320',
        modal: true,
        title: "Cancellazione di un piatto",
        title_html: true,
        buttons: [
            {
                html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Cancella",
                "class": "btn btn-danger btn-minier",
                click: function () {
                    $.post("./Controller/PlateController.php",
                            {
                                id: id,
                                type: "delete"
                            });
                    window.location = "./index.php?action=plates";
                    $(this).dialog("close");
                }
            }
            ,
            {
                html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Annulla",
                "class": "btn btn-minier",
                click: function () {
                    $(this).dialog("close");
                }
            }
        ]
    });
}