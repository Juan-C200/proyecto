<?php

include_once '../model/Reportes/ReportesModel.php';

class PanelReportesController{

    public function getCreate(){
    $obj=new ReportesModel();

    include_once '../view/Reportes/PanelReportes.php';
    }

}

?>