<?php

namespace App\Suppport;

use GuzzleHttp\Client;

class Chilexpress {

	public function envioNacional($origen, $destino, $peso, $largo, $alto, $ancho) {
		$client = new Client(['timeout' => 30, 'verify' => false]);
		$response = $client->request('POST', 'http://www.chilexpress.cl/cotizadorweb/nacional_resultado.asp', ['form_params' => ['text_gls_origen' => $origen, 'text_gls_destino' => $destino, 'text_gls_producto' => 'ENCOMIENDA', 'accion' => 'lista_cotizador', 'cmb_lst_origen' => $origen, 'cmb_lst_destino' => $destino, 'cmb_lst_producto' => 3, 'peso' => $peso + 0.2, 'Dimension3' => $largo, 'Dimension1' => $alto, 'Dimension2' => $ancho]]);
		return $response->getBody()->getContents();
	}

	public function envioInternacional($origen, $destino, $peso, $largo, $alto, $ancho) {
		$client = new Client(['timeout' => 30, 'verify' => false]);
		$response = $client->request('POST', 'http://www.chilexpress.cl/cotizadorweb/internacional_resultado.asp', ['form_params' => ['text_gls_origen' => $origen, 'text_gls_destino' => $destino, 'text_gls_producto' => 'ENCOMIENDA', 'accion' => 'lista_cotizador', 'cmb_lst_origen' => $origen, 'cmb_lst_destino' => $destino, 'cmb_lst_producto' => 3, 'peso' => $peso + 0.4, 'Dimension3' => $largo, 'Dimension1' => $alto, 'Dimension2' => $ancho]]);
		return $response->getBody()->getContents();
	}
}
