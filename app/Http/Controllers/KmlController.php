<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\GeographicDetail;
use Illuminate\Support\Facades\File;
use SimpleXMLElement;

class KmlController extends Controller
{
    public function exportarKml()
    {
        $companies = Company::with('geographicDetail')->get();

        $kml = new SimpleXMLElement('<kml xmlns="http://www.opengis.net/kml/2.2"></kml>');
        $document = $kml->addChild('Document');

        foreach ($companies as $company) {
            $placemark = $document->addChild('Placemark');
            $placemark->addChild('name', $company->identifier_key);
            $placemark->addChild('description', $company->description);

            // Agregar otros datos
            $extendedData = $placemark->addChild('ExtendedData');

            // Ejemplo: Agregar el tipo de compañía
            $typeData = $extendedData->addChild('Data');
            $typeData->addAttribute('name', 'Tipo');
            $typeValue = $typeData->addChild('value', $company->kind_company);

            // Ejemplo: Agregar la marca asociada
            $brandData = $extendedData->addChild('Data');
            $brandData->addAttribute('name', 'Marca');
            $brandValue = $brandData->addChild('value', $company->brand->name);

            // Agregar detalles geográficos
            $geographicData = $extendedData->addChild('Data');
            $geographicData->addAttribute('name', 'Latitud');
            $geographicValue = $geographicData->addChild('value', $company->geographicDetail->latitude);

            $geographicData = $extendedData->addChild('Data');
            $geographicData->addAttribute('name', 'Longitud');
            $geographicValue = $geographicData->addChild('value', $company->geographicDetail->longitude);

            // Añadir marca de gasolinera
            $iconUrl = 'https://maps.google.com/mapfiles/kml/shapes/gas_stations.png';

            $style = $placemark->addChild('Style');
            $iconStyle = $style->addChild('IconStyle');
            $iconStyle->addChild('color', 'ff0000ff');
            $iconStyle->addChild('scale', '0.709093');
            $iconElement = $iconStyle->addChild('Icon');
            $iconElement->addChild('href', $iconUrl);
            $point = $placemark->addChild('Point');
            $point->addChild('coordinates', $company->geographicDetail->longitude . ',' . $company->geographicDetail->latitude . ',0');

            $imagePath = public_path($company->image_path);
            if (file_exists($imagePath)) {
                $iconUrl = url($company->image_path);
                $iconElement = $style->addChild('IconStyle')->addChild('Icon');
                $iconElement->addChild('href', $iconUrl);
            }

            // Agregar BalloonStyle
            $balloonStyle = $style->addChild('BalloonStyle');
            $balloonStyle->addChild('text', $this->generateBalloonContent($company));
        }

        $kmlContent = $kml->asXML();

        return response($kmlContent, 200)
            ->header('Content-Type', 'application/vnd.google-earth.kml+xml')
            ->header('Content-Disposition', 'attachment; filename="GeoRiskApp.kml"');
    }

    private function generateBalloonContent($company)
    {
        $content = '<![CDATA[';
        $content .= '<h2>' . $company->identifier_key . '</h2>';
        $content .= '<p>' . $company->description . '</p>';
        $content .= '<p><b>Tipo:</b> ' . $company->kind_company . '</p>';
        $content .= '<p><b>Marca:</b> ' . $company->brand->name . '</p>';
        $content .= '<p><b>Latitud:</b> ' . $company->geographicDetail->latitude . '</p>';
        $content .= '<p><b>Longitud:</b> ' . $company->geographicDetail->longitude . '</p>';
        $content .= '<p><b>Dirección:</b> ' . $company->geographicDetail->address . '</p>';
        $content .= '<p><b>Codigo Postal:</b> ' . $company->geographicDetail->zip_code . '</p>';
        $content .= '<p><b>Colonia:</b> ' . $company->geographicDetail->colony->name . '</p>';
        $content .= '<p><b>Municipio :</b> ' . $company->geographicDetail->township->name . '</p>';
        $content .= '<p><b>Estado:</b> ' . $company->geographicDetail->state->name . '</p>';
        $content .= '<h2><b>DATOS REGULATORIOS</b></h2>';


        //$content .= ']]>';

        return $content;
    }
}
